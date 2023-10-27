<?php

namespace App\Livewire;

use App\Models\Project;
use App\Models\Selection;
use Livewire\Component;

class SelectionForm extends Component
{
    public Project $project;
    public Selection $selection;

    public function render()
    {
        return view('livewire.selection-form', [
            'project' => $this->project,
            'selection' => isset($this->selection) ? $this->selection : '',
        ]);
    }
}
