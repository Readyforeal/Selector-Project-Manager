<?php

namespace App\View\Components;

use App\Models\Project;
use App\Models\Selection;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SelectionForm extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Project $project,
        public Selection $selection,
    ){}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.selection-form');
    }
}
