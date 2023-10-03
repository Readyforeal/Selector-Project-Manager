<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;

class ProjectNavigation extends Component
{
    public Project $project;

    public function render()
    {
        return view('livewire.project-navigation', ['project' => $this->project]);
    }
}
