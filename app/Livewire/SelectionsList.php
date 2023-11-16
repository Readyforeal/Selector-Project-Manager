<?php

namespace App\Livewire;

use App\Models\Project;
use App\Models\SelectionList;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class SelectionsList extends Component
{
    use WithPagination;

    public $project;
    public $selectionList;

    public $search = "";
    public $sortField = "title";
    public $sortDirection = "asc";

    public $view = "categories";
    
    public function render()
    {
        $selections = $this->selectionList->selections();

        return view('livewire.selections-list', [
            'project' => $this->project,
            'categories' => Auth::user()->currentTeam->categories()->orderBy('name')->get(),
            'locations' => $this->project->locations()->orderBy('name')->get(),
            'selectionList' => $this->selectionList,
            'selections' => $this->getSelections($selections),
        ]);
    }

    public function getSelections($selections) {
        return $selections->search('title', $this->search)
            
            // Join necessary tables
            ->join('selection_items', 'selections.id', '=', 'selection_items.selection_id')
            ->leftJoin('category_selection_item', 'selection_items.id', '=', 'category_selection_item.selection_item_id')
            ->leftJoin('categories', 'category_selection_item.category_id', '=', 'categories.id')
            ->leftJoin('location_selection', 'selections.id', '=', 'location_selection.selection_id')
            ->leftJoin('locations', 'location_selection.location_id', '=', 'locations.id')
            ->distinct()
            
            // Order results
            ->orderBy($this->sortField, $this->sortDirection)
            ->select('selections.*')
            ->get();
    }

    public function sortBy($field) {
        if($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
    }

    public function setView($viewToSet)
    {
        $this->view = $viewToSet;
        $this->search = '';
    }
}
