<x-app-layout>

    @livewire('project-navigation', ['project' => $project])

    <div class="ml-[300px] p-6 text-black dark:text-gray-100">
        <div class="max-w-3xl mx-auto">
            <p class="text-2xl mb-6">Create Selection List</p>
            
            <div>
                <form action="/projects/{{ $project->id }}/selection-lists/create" method="POST">
                    @csrf
                    <div>
                        <x-label for="name" value="Name *" />
                        <x-label class="text-xs" for="name" value="Ex. 'Primary', 'Alternitive', etc." />
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" required autocomplete="off" />
                    </div>

                    <x-button class="mt-4"><i class="fa fa-fw fa-plus mr-3"></i>Create Selection List</x-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>