<?php

namespace App\Livewire;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class CategorySelect extends Component
{
    use WithPagination;

    // Props
    public $project;
    public $currentCategories;

    // Data
    public $selectedCategories = [];
    public $showDropdown = false;
    public $search = '';

    public function mount()
    {
        if($this->currentCategories != null)
        {
            foreach($this->currentCategories as $currentCategory)
            {
                $this->selectedCategories[] = $currentCategory->id;
            }
        }
    }

    public function render()
    {
        $categories = Auth::user()->currentTeam->categories();

        return view('livewire.category-select', [
            'project' => Project::findOrFail($this->project),
            'categories' => $categories->search('name', $this->search)->paginate(),
            'currentCategories' => $this->currentCategories,
        ]);
    }

    public function selectCategory($categoryId)
    {
        if (in_array($categoryId, $this->selectedCategories)) {
            // If category is already selected, remove it
            $this->selectedCategories = array_diff($this->selectedCategories, [$categoryId]);
            $this->search = '';
        } else {
            // Otherwise, add it to the selected categories
            $this->selectedCategories[] = $categoryId;
            $this->search = '';
        }
    }

    public function createCategory()
    {
        $this->validate([
            'search' => 'string|min:1|max:255'
        ]);

        $authenticatedUserTeam = Auth::user()->currentTeam;
        $categories = $authenticatedUserTeam->categories()->get();
        $newCategory = null;

        if(empty($categories))
        {
            $newCategory = $authenticatedUserTeam->categories()->create([
                'name' => $this->search,
                'order' => 1
            ]);
        }
        else
        {
            $highest = $categories->max('order');
            $newCategory = $authenticatedUserTeam->categories()->create([
                'name' => $this->search,
                'order' => $highest + 1
            ]);
        }

        $this->selectCategory($newCategory->id);
        $this->search = '';
    }
}
