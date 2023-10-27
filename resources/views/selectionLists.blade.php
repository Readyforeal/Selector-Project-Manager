<x-app-layout>

    @livewire('project-navigation', ['project' => $project])

    <div class="ml-[300px] p-6 text-black dark:text-gray-100">
        <p class="mb-6 font-semibold">Selection Lists</p>
        
        <div>
            <x-button onclick="window.location='/projects/{{ $project->id }}/selection-lists/create'"><i class="fa fa-fw fa-plus mr-3"></i>Create Selection List</x-button>
            @forelse ($project->selectionLists as $selectionList)
                <a class="block py-3" href="/projects/{{ $project->id }}/selection-lists/{{ $selectionList->id }}">{{ $selectionList->name }}</a>
            @empty
                <p>You have no selection lists.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>