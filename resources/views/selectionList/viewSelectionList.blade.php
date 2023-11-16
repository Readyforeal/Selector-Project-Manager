<x-app-layout>

    @livewire('project-navigation', ['project' => $project])

    <div class="ml-[300px] p-3 text-black dark:text-gray-100">
        <div class="py-3">
            <p><a class="opacity-75 hover:opacity-100 transition ease-in-out" href="/projects/{{ $project->id }}/selection-lists"><i class="fa fa-fw fa-check-circle mr-2"></i>Selection Lists</a> / <span class="font-semibold">{{ $selectionList->name }}</span></p>
        </div>
        
        <div>
            @livewire('selections-list', ['project' => $project, 'selectionList' => $selectionList, 'selections' => $selections])
        </div>
    </div>
</x-app-layout>