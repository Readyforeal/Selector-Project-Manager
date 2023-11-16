<x-app-layout>

    @livewire('project-navigation', ['project' => $project])

    <div class="p-6 ml-[350px] pt-[78px]">

        <div class="max-w-3xl mx-auto">
            <h2 class="font-semibold text-xl mb-6">Edit Selection</h2>
            
            <div class="bg-white rounded-xl shadow-xl p-6">
                <form action="/projects/{{ $project->id }}/selection-lists/{{ $selectionList->id }}/selections/{{ $selection->id }}/edit" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <x-selection-form :project="$project" :selection="$selection" />
                </form>
            </div>
        </div>

    </div>
</x-app-layout>