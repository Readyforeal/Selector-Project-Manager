<x-app-layout>

    @livewire('project-navigation', ['project' => $project])

    <div class="p-6">

        <h2 class="font-semibold text-xl mb-6">Selections</h2>
        
        <div class="bg-gray-100 rounded-xl p-6">
            <i class="fa fa-house"></i>
        </div>
    </div>
</x-app-layout>