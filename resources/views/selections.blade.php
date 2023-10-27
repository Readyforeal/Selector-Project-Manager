<x-app-layout>

    @livewire('project-navigation', ['project' => $project])

    <div class="ml-[300px] p-6 text-black dark:text-gray-100">
        <p class="text-2xl mb-6">Selections</p>
        
        <div>
            @livewire('selections-list', ['projectId' => $project->id, 'selectionListId' => $selectionList->id], key($project->id))
        </div>
    </div>
</x-app-layout>