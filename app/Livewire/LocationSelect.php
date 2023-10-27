<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class LocationSelect extends Component
{
    use WithPagination;

    // Props
    public $project;
    public $currentLocations;

    // Data
    public $selectedLocations = [];
    public $showDropdown = false;
    public $search = '';

    public function mount()
    {
        if($this->currentLocations != null)
        {
            foreach($this->currentLocations as $currentLocation)
            {
                $this->selectedLocations[] = $currentLocation->id;
            }
        }
    }

    public function render()
    {
        $locations = Project::findOrFail($this->project)->locations();

        return view('livewire.location-select', [
            'project' => Project::findOrFail($this->project),
            'locations' => $locations->search('name', $this->search)->paginate(),
            'currentLocations' => $this->currentLocations,
        ]);
    }

    public function selectLocation($locationId)
    {
        if (in_array($locationId, $this->selectedLocations)) {
            // If category is already selected, remove it
            $this->selectedLocations = array_diff($this->selectedLocations, [$locationId]);
            $this->search = '';
        } else {
            // Otherwise, add it to the selected locations
            $this->selectedLocations[] = $locationId;
            $this->search = '';
        }
    }

    public function createLocation()
    {
        $this->validate([
            'search' => 'string|min:1|max:255'
        ]);

        $project = Project::findOrFail($this->project);

        $newLocation = $project->locations()->create([
            'name' => $this->search,
        ]);

        $this->selectLocation($newLocation->id);
        $this->search = '';
    }
}
