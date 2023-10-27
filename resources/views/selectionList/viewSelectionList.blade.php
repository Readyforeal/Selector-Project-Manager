<x-app-layout>

    @livewire('project-navigation', ['project' => $project])

    <div class="ml-[300px] p-6 text-black dark:text-gray-100">
        <p class="mb-6"><a class="opacity-75 hover:opacity-100 transition ease-in-out" href="/projects/{{ $project->id }}/selection-lists">Selection Lists</a> / <span class="font-semibold">{{ $selectionList->name }}</span></p>
        
        <div>
            @livewire('selections-list', ['projectId' => $project->id, 'selectionListId' => $selectionList->id], key($project->id))
        </div>
    </div>
</x-app-layout>