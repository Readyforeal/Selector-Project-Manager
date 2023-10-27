<x-app-layout>

    @livewire('project-navigation', ['project' => $project])

    <div class="p-6 ml-[350px]">

        <h2 class="font-semibold text-xl mb-6"><i class="fa fa-gear mr-2"></i>Project Settings</h2>
        
        <div class="bg-gray-100 rounded-xl p-6">

            <p class="mb-3 font-semibold">Project Details</p>

            <form action="/projects/{{ $project->id }}/settings" method="POST">
            @csrf
            @method('patch')

                <div>
                    <x-label for="name" value="Name" />
                    <x-label class="text-xs" for="name" value="Usually the last name of the resident" />
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $project->name }}" required autocomplete="off" />
                </div>

                <div class="mt-4">
                    <x-label for="address" value="Address" />
                    <x-label class="text-xs" for="address" value="Street Number, City, State and Zip" />
                    <x-input id="address" class="block mt-1 w-full" type="text" name="address" value="{{ $project->address }}" required autocomplete="off" />
                </div>

                <div class="mt-4">
                    <x-label for="description" value="Description" />
                    <x-label class="text-xs" for="description" value="Ex. Kitchen Renovation" />
                    <x-input id="description" class="block mt-1 w-full" type="text" name="description" value="{{ $project->description }}" autocomplete="off" />
                </div>

                <x-button class="mt-4"><i class="fa fa-check mr-2"></i>Save</x-button>
            </form>
        </div>

        <div class="bg-gray-100 mt-6 rounded-xl p-6">
            <p class="mb-3 font-semibold">Danger Zone</p>

            <p>Deleting a project is a permanent action and cannot be undone.</p>

            <form action="/projects/{{ $project->id }}/delete" method="POST">
            @csrf
            @method('delete')
                <x-button class="mt-4"><i class="fa fa-trash mr-2"></i>Delete Project</x-button>
            </form>
        </div>
    </div>
</x-app-layout>