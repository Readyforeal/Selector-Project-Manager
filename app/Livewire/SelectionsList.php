<?php

namespace App\Livewire;

use App\Models\Project;
use App\Models\SelectionList;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class SelectionsList extends Component
{
    use WithPagination;

    public $projectId;
    public $selectionListId;

    public $search = "";
    public $sortBy = "title";
    public $sortOrder = "desc";
    public $view = "all";
    
    public function render()
    {
        $project = Project::findOrFail($this->projectId);
        $selectionList = SelectionList::findOrFail($this->selectionListId);
        $categories = Auth::user()->currentTeam->categories();
        $locations = $project->locations();
        $selections = $selectionList->selections();

        return view('livewire.selections-list', [
            'project' => $project,
            'selectionList' => $selectionList,
            'categories' => $categories->search('name', $this->search)->orderBy('name', 'asc')->paginate(),
            'locations' => $locations->search('name', $this->search)->orderBy('name', 'asc')->paginate(),
            'selections' => $selections->search('title', $this->search)->orderBy('title', 'desc')->paginate(),
        ]);
    }

    public function setView($viewToSet)
    {
        $this->view = $viewToSet;
        $this->search = '';
    }
}
