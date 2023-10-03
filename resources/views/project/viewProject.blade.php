<x-app-layout>

    @livewire('project-navigation', ['project' => $project])

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $project->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <i class="fa fa-house"></i>
            </div>
        </div>
    </div>
</x-app-layout>