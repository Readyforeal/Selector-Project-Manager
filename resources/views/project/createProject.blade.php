<x-app-layout>

    @livewire('navigation-menu')

    <div class="p-6 max-w-[500px] mx-auto">

        <h2 class="font-semibold text-xl">Create Project</h2>

        <x-secondary-button class="my-6" onclick="javascript:history.back()">
            <i class="fa fa-chevron-left mr-2"></i>
            Back
        </x-secondary-button>
        
        <div class="bg-gray-100 rounded-xl p-6">
            <form action="/projects/create" method="POST">
            @csrf

                <p class="text-xs">Fields marked with * are required</p>

                <div class="mt-4">
                    <x-label for="name" value="Name *" />
                    <x-label class="text-xs" for="name" value="Usually the last name of the resident" />
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" required autocomplete="off" />
                </div>

                <div class="mt-4">
                    <x-label for="address" value="Address *" />
                    <x-label class="text-xs" for="address" value="Street Number, City, State and Zip" />
                    <x-input id="address" class="block mt-1 w-full" type="text" name="address" required autocomplete="off" />
                </div>

                <div class="mt-4">
                    <x-label for="description" value="Description" />
                    <x-label class="text-xs" for="description" value="Ex. Kitchen Renovation" />
                    <x-input id="description" class="block mt-1 w-full" type="text" name="description" autocomplete="off" />
                </div>

                <x-button class="mt-4 w-full"><i class="fa fa-plus mr-2"></i>Create</x-button>
            </form>
        </div>
    </div>

</x-app-layout>