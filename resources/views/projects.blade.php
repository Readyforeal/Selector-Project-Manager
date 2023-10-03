<x-app-layout>

    @livewire('navigation-menu')

    <div class="p-6 max-w-7xl mx-auto">

        <h2 class="font-semibold text-xl mb-6">Projects</h2>
        
        <div class="bg-gray-100 rounded-xl p-6">
            @forelse ($projects as $project)        
            <a href="/projects/{{ $project->id }}" class="flex group">
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