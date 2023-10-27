<div class="flex">
    <div class="w-[350px] mr-6">

        <div class="p-3 sticky bg-white dark:bg-neutral-900 top-0 rounded-xl shadow-xl">    
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
            <div wire:ignore class="mt-2 p-3 border border-gray-300 dark:border-neutral-800 rounded-xl">
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
            <div wire:ignore class="mt-2 p-3 border border-gray-300 dark:border-neutral-800 rounded-xl">
                @foreach ($locations as $location)
                    <p class="hover:text-blue-600 transition ease-in-out cursor-pointer" wire:click="$set('search', '{{$location->name}}')">{{ $location->name }}</p>
                @endforeach
            </div>
            @endif
        </div>

    </div>

    <div class="w-full">

        <div class="flex justify-between bg-white dark:bg-neutral-900 border-b border-gray-300 dark:border-neutral-800 rounded-t-xl shadow-xl p-3">
            <div class="w-1/4">
                <x-input class="w-full text-xs overflow-hidden" wire:model.live='search' placeholder="&#xF002;  Search" style="font-family: figtree, 'FontAwesome'" />
            </div>

            <div>
                {{-- <x-secondary-button onclick="#">
                    <i class="fa fa-fw fa-file-export mr-2"></i>
                    Export
                </x-secondary-button>

                <x-secondary-button onclick="#">
                    <i class="fa fa-fw fa-file-import mr-2"></i>
                    Import
                </x-secondary-button> --}}

                <x-button onclick="window.location='/projects/{{ $project->id }}/selection-lists/{{ $selectionList->id }}/selections/create'">
                <i class="fa fa-plus mr-2"></i>
                    Create Selection
                </x-button>

            </div>
        </div>

        @if($view == 'all')

        <table class="table-fixed rounded-b-xl bg-white dark:bg-neutral-900 shadow-xl overflow-hidden w-full">
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
                @foreach ($selections as $selection)
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
                                <th class="text-xs text-left border-b border-gray-300 dark:border-neutral-800 p-3">Comments</th>
                                <th class="text-xs text-left border-b border-gray-300 dark:border-neutral-800 p-3">Approval Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category->selections->where('selection_list_id', $selectionList->id) as $selection)
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
        @endif

        @if($view == 'locations')
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
        @endif
    </div>
</div>
