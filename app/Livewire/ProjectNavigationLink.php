<?php

namespace App\Livewire;

use Livewire\Component;

class ProjectNavigationLink extends Component
{
    public $url;
    public $icon;
    public $label;

    public function render()
    {
        return view('livewire.project-navigation-link', 
        [
            'url' => $this->url,
            'icon' => $this->icon,
            'label' => $this->label,
        ]);
    }
}
