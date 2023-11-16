<div class="flex">
    <div class="w-[350px] mr-6">
        <div class="p-3 sticky bg-white dark:bg-neutral-900 top-3 rounded-xl shadow-xl">    
            <p class="mb-3 font-semibold">List Views</p>

            <div class="py-2 px-3 border border-gray-300 dark:border-neutral-800 rounded-xl cursor-pointer hover:bg-blue-100 hover:dark:bg-blue-600 @if($view == 'all') bg-blue-100 dark:bg-blue-600 @endif transition ease-in-out group" wire:click="setView('all')" wire:click="$set('search', '')">
                <p class="group-hover:translate-x-2 group-hover:text-blue-600 group-hover:dark:text-white @if($view == 'all') translate-x-2 text-blue-600 dark:text-white @endif font-semibold transition ease-in-out">
                    <i class="fa fa-check-circle mr-2"></i>All Selctions
                </p>
            </div>
    
            <div class="mt-2 py-2 px-3 border border-gray-300 dark:border-neutral-800 rounded-xl cursor-pointer hover:bg-blue-100 hover:dark:bg-blue-600 @if($view == 'categories') bg-blue-100 dark:bg-blue-600 @endif transition ease-in-out group" wire:click="setView('categories')">
                <p class="group-hover:translate-x-2 group-hover:text-blue-600 group-hover:dark:text-white @if($view == 'categories') translate-x-2 text-blue-600 dark:text-white @endif font-semibold transition ease-in-out">
                    <i class="fa fa-tag mr-2"></i>Categories
                </p>
            </div>
    
            @if($view == "categories")
            <div wire:ignore class="mt-2 p-3 border border-gray-300 dark:border-neutral-800 rounded-xl max-h-80 overflow-y-auto">
                @foreach ($categories as $category)
                    <p class="hover:text-blue-600 transition ease-in-out cursor-pointer" wire:click="$set('search', '{{$category->name}}')">{{ $category->name }}</p>
                @endforeach
            </div>
            @endif
    
            <div class="mt-2 py-2 px-3 border border-gray-300 dark:border-neutral-800 rounded-xl cursor-pointer hover:bg-blue-100 hover:dark:bg-blue-600 @if($view == 'locations') bg-blue-100 dark:bg-blue-600 @endif transition ease-in-out group" wire:click="setView('locations')">
                <p class="group-hover:translate-x-2 group-hover:text-blue-600 group-hover:dark:text-white @if($view == 'locations') translate-x-2 text-blue-600 dark:text-white @endif font-semibold transition ease-in-out">
                    <i class="fa fa-location mr-2"></i>Locations
                </p>
            </div>
    
            @if($view == "locations")
            <div wire:ignore class="mt-2 p-3 border border-gray-300 dark:border-neutral-800 rounded-xl max-h-80 overflow-y-auto">
                @foreach ($locations as $location)
                    <p class="hover:text-blue-600 transition ease-in-out cursor-pointer" wire:click="$set('search', '{{$location->name}}')">{{ $location->name }}</p>
                @endforeach
            </div>
            @endif
        </div>
    </div>

    <div class="w-full">
        <div class="bg-white dark:bg-neutral-900 sticky top-0 z-50 p-3">
            <div class="w-full mb-2">
                <p class="font-semibold">{{ $selectionList->name }}</p>
            </div>
            
            <div class="flex justify-between">
                <div class="w-1/4 inline-block">
                    <x-input class="w-full text-xs overflow-hidden" wire:model.live='search' placeholder="&#xF002;  Search" style="font-family: figtree, 'FontAwesome'" />
                </div>
    
                <div>
                    <x-secondary-button class="mr-2" onclick="#">
                        <i class="fa fa-fw fa-file-export mr-2"></i>
                        Export
                    </x-secondary-button>
    
                    <x-button onclick="window.location='/projects/{{ $project->id }}/selection-lists/{{ $selectionList->id }}/selections/create'">
                        <i class="fa fa-plus mr-2"></i>
                        Create Selection
                    </x-button>
    
                </div>
            </div>
        </div>

        @if($view == 'all')

        <x-table>
            <x-slot name="head">
                <x-table.heading sortable wire:click="sortBy('title')" :direction="$sortField === 'title' ? $sortDirection : null">Title</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('selection_items.name')" :direction="$sortField === 'selection_items.name' ? $sortDirection : null">Name</x-table.heading>
                <x-table.heading>Categories</x-table.heading>
                <x-table.heading>Locations</x-table.heading>
                <x-table.heading>Approvals</x-table.heading>
            </x-slot>

            <x-slot name="body">
                @foreach ($selections as $selection)
                <x-table.row>
                    <x-table.cell>
                        <a href="/projects/{{ $project->id }}/selection-lists/{{ $selectionList->id }}/selections/{{ $selection->id }}">{{ $selection->title }}</a>
                    </x-table.cell>

                    <x-table.cell>
                        {{ $selection->selectionItem->name }}
                    </x-table.cell>

                    <x-table.cell>
                        @foreach ($selection->selectionItem->categories as $category)
                            <x-badge color="blue" class="inline"><i class="fa fa-tag mr-1"></i>{{ $category->name }}</x-badge>
                        @endforeach
                    </x-table.cell>

                    <x-table.cell>
                        @foreach ($selection->locations as $location)
                            <x-badge color="blue"><i class="fa fa-location mr-1"></i>{{ $location->name }}</x-badge>
                        @endforeach
                    </x-table.cell>

                    <x-table.cell>
                        {{-- Approvals --}}
                    </x-table.cell>
                </x-table.row>
                @endforeach
            </x-slot>
        </x-table>

        @endif

        @if($view == 'categories')
            <div class="bg-white rounded-b-xl shadow-xl">
                @foreach ($categories as $category)
                    <div class="p-3 bg-gray-200">
                        <p class="font-semibold @if(!$loop->first) @endif"><i class="fa fa-fw fa-tag mr-2"></i>{{ $category->name }}</p>
                    </div>

                    <table class="table-fixed rounded-b-xl bg-white dark:bg-neutral-900 w-full">
                        <thead>
                            <tr>
                                <th class="text-xs text-left border-b border-gray-300 dark:border-neutral-800 p-3">Title</th>
                                <th class="text-xs text-left border-b border-gray-300 dark:border-neutral-800 p-3">Name</th>
                                <th class="text-xs text-left border-b border-gray-300 dark:border-neutral-800 p-3">Categories</th>
                                <th class="text-xs text-left border-b border-gray-300 dark:border-neutral-800 p-3">Locations</th>
                                <th class="text-xs text-left border-b border-gray-300 dark:border-neutral-800 p-3">Approvals</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($selections as $selection)
                                {{ $selection }}
                                {{-- <tr class="hover:bg-gray-100 dark:hover:bg-neutral-800 cursor-pointer transition ease-in-out" onclick="window.location='/projects/{{ $project->id }}/selection-lists/{{ $selectionList->id }}/selections/{{ $selection->id }}'">
                                    <td class="p-3 text-sm">
                                        {{ $selection->title }}
                                    </td>
                                    <td class="p-3 text-sm truncate">
                                        {{ $selection->selectionItem->name }}
                                    </td>
                                    <td class="p-3 text-sm">
                                        @foreach ($selection->selectionItem->categories as $category)
                                            {{ $category->name }}
                                        @endforeach
                                    </td>
                                    <td class="p-3 text-sm">
                                        @foreach ($selection->locations as $location)
                                            {{ $location->name }}
                                        @endforeach
                                    </td>

                                    <td class="p-3 text-sm">
                                        {{-- Approvals --}}
                                    </td>
                                </tr> --}}
                            @endforeach
                        </tbody>
                    </table>
                @endforeach
            </div>
        @endif

        {{-- @if($view == 'locations')
            <div class="bg-white rounded-b-xl shadow-xl">
                @foreach ($locations as $location)
                <div class="p-3 bg-gray-200">
                    <p class="font-semibold @if(!$loop->first) @endif"><i class="fa fa-fw fa-location mr-2"></i>{{ $location->name }}</p>
                </div>

                <table class="table-fixed rounded-b-xl bg-white dark:bg-neutral-900 w-full">
                    <thead>
                        <tr>
                            <th class="text-xs text-left border-b border-gray-300 dark:border-neutral-800 p-3">Title</th>
                            <th class="text-xs text-left border-b border-gray-300 dark:border-neutral-800 p-3">Name</th>
                            <th class="text-xs text-left border-b border-gray-300 dark:border-neutral-800 p-3">Categories</th>
                            <th class="text-xs text-left border-b border-gray-300 dark:border-neutral-800 p-3">Locations</th>
                            <th class="text-xs text-left border-b border-gray-300 dark:border-neutral-800 p-3">Comments</th>
                            <th class="text-xs text-left border-b border-gray-300 dark:border-neutral-800 p-3">Approval Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($location->selections->where('selection_list_id', $selectionList->id) as $selection)
                            <tr class="hover:bg-gray-100 dark:hover:bg-neutral-800 cursor-pointer transition ease-in-out" onclick="window.location='/projects/{{ $project->id }}/selection-lists/{{ $selectionList->id }}/selections/{{ $selection->id }}'">
                                <td class="p-3 text-sm">
                                    @if($selection->comments->count() > 0)
                                        {{ $selection->title }}
                                    @else
                                        {{ $selection->title }}
                                    @endif
                                </td>
                                <td class="p-3 text-sm truncate">
                                    {{ $selection->name }}
                                </td>
                                <td class="p-3 text-sm">
                                    @foreach ($selection->categories as $category)
                                        {{ $category->name }}
                                    @endforeach
                                </td>
                                <td class="p-3 text-sm">
                                    @foreach ($selection->locations as $location)
                                        {{ $location->name }}
                                    @endforeach
                                </td>
                                <td class="p-3 text-sm">
                                    @if($selection->comments->count() > 0)
                                        <x-badge color="blue">{{ $selection->comments->count() }} <i class="fa fa-message ml-2"></i></x-badge>
                                    @endif
                                </td>
                                <td class="p-3 text-sm">
                                    @if($selection->approval == null)
                                    <x-badge color="gray">Pending</x-badge>
                                    @else
                                    <x-badge color="green">Approved</x-badge>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @endforeach
            </div>
        @endif --}}
    </div>
</div>
