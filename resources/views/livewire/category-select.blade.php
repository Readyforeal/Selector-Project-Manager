<div class="relative">
    <div class="mt-2 py-2 px-3 flex justify-between w-full hover:bg-gray-100 dark:hover:bg-neutral-900 border border-gray-300 dark:border-neutral-800 rounded-xl cursor-pointer @if($showDropdown) text-gray-400 dark:text-neutral-500 @endif transition ease-in-out" wire:click="$toggle('showDropdown')">
        <p class="">Select categories</p>
        @if($showDropdown)
        <i class="p-1 mt-[2px] fa fa-fw text-xs fa-chevron-up"></i>
        @else
        <i class="p-1 mt-[2px] fa fa-fw text-xs fa-chevron-down"></i>
        @endif
    </div>

    <div class="mt-2">
    @foreach ($currentCategories as $category)
        <p class="text-xs text-blue-600 font-semibold cursor-default"><i class="fa fa-tag fa-fw mr-1"></i>{{ $category->name }}</p>
    @endforeach
    </div>

    @if($showDropdown)
    <div class="absolute top-12 w-full border border-gray-300 dark:border-neutral-700 rounded-xl bg-white dark:bg-neutral-900 z-10 overflow-hidden shadow-xl">

        <div class="p-3 flex border-b border-gray-300 dark:border-neutral-700">
            <p class="border border-r-0 border-gray-300 dark:border-neutral-800 fa fa-search p-3 rounded-l-xl"></p>
            <x-input class="w-full rounded-l-none rounded-r-xl overflow-hidden" wire:model.live='search' placeholder="Search.." autofocus />
        </div>
    
        <div class="w-full max-h-[200px] overflow-y-auto">
            @forelse ($categories as $category)

            @php
                $selected = false;
                
                foreach($currentCategories as $currentCategory)
                {
                    if($currentCategory->id == $category->id)
                    {
                        $selected = true;
                    }
                }

                if(in_array($category->id, $selectedCategories))
                {
                    $selected = true;
                }
                else
                {
                    $selected = false;
                }
            @endphp

            <div class="p-2 @if(!$loop->last) border-b border-gray-100 dark:border-neutral-800 @endif hover:bg-gray-100 hover:dark:bg-neutral-800 transition ease-in-out flex cursor-pointer" wire:click="selectCategory({{ $category->id }})">
                <i class="fa fa-fw fa-check-square p-1 mr-2 {{ $selected ? 'text-blue-600' : 'text-gray-300 dark:text-neutral-700' }}"></i>
                <p class="{{ $selected ? 'text-blue-600' : 'text-gray-400 dark:text-neutral-500' }}">{{ $category->name }}</p>
            </div>
            @empty
            <div class="p-3 text-center">
                <p class="font-semibold">{{ $search }} not found.</p>
                <x-secondary-button class="text-xs mt-2" wire:click="createCategory"><i class="fa fa-add mr-2"></i>Create Category</x-secondary-button>
            </div>
            @endforelse
        </div>
    </div>
    @endif

    <x-input type="hidden" id="categories" name="categories" value="{{ json_encode($selectedCategories) }}" />
</div>
