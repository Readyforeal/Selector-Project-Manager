<x-app-layout>

    @livewire('project-navigation', ['project' => $project])

    <div class="p-6 ml-[350px] pt-[90px]">

        <div class="max-w-3xl mx-auto">
            <h2 class="font-semibold text-xl mb-6">Create Selection</h2>
            
            <div class="border border-gray-300 dark:border-neutral-800 rounded-xl p-6">
                <form action="/projects/{{ $project->id }}/selection-lists/{{ $selectionList->id }}/selections/create" method="POST" enctype="multipart/form-data">
                    @csrf
                    <x-selection-form :project="$project" />
                </form>
            </div>
        </div>

    </div>
</x-app-layout>