<x-app-layout>

    @livewire('navigation-menu')

    <div class="p-6 max-w-2xl pt-[90px] mx-auto">

        <h2 class="font-semibold text-xl">Projects</h2>

        <x-button class="my-6" onclick="window.location='/projects/create'"><i class="fa fa-plus mr-2"></i>Create Project</x-button>
        
        <div class="border border-gray-300 dark:border-neutral-800 rounded-xl p-3">

            <p class="mb-3 font-semibold">{{ Auth::user()->currentTeam->name }}</p>

            @forelse ($projects as $project)
            <a href="/projects/{{ $project->id }}" class="flex @if(!$loop->last) mb-2 @endif p-3 group hover:bg-gray-200 border rounded-xl transition ease-in-out">
                <div class="w-11 h-11 rounded-lg flex justify-center items-center bg-black text-white font-semibold group-hover:bg-blue-600 transition ease-in-out">
                    {{ Str::substr($project->name, 0, 2) }}
                </div>

                <div class="ml-3">
                    <p class="font-semibold">{{ $project->name }}</p>
                    <p class="text-xs opacity-50">{{ $project->address }}</p>
                </div>
            </a>
            @empty
            <p>You have no projects</p>
            @endforelse
        </div>
    </div>

</x-app-layout>