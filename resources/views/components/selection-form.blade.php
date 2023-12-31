<div>
    <x-button class="sticky top-3 float-right z-40"><i class="fa fa-save mr-2"></i>Save</x-button>
    <p class="text-xs">Fields marked with * are required</p>

    <div class="mt-4">
        <x-label for="title" value="Title *" />
        <x-label class="text-xs mb-1 opacity-50" for="title" value="Ex. Kitchen Faucett" />
        <x-input id="title" class="block w-full" type="text" name="title" value="{{ isset($selection) ? $selection->title : '' }}" required autocomplete="off" />
    </div>

    
    <div class="grid grid-cols-2 gap-2 mt-6">
        <div>
            <p class="font-semibold">Categorize</p>
            @livewire('category-select', ['project' => $project->id, 'currentCategories' => $selection->selectionItem->categories, key('category-select')])
        </div>

        <div>
            <p class="font-semibold">Locate</p>
            @livewire('location-select', ['project' => $project->id, 'currentLocations' => $selection->locations, key('location-select')])
        </div>
    </div>

    <p class="font-semibold mt-4">Selection Details</p>

    <div class="mt-4">
        <x-label for="name" value="Name" />
        <x-label class="text-xs mb-1 opacity-50" for="name" value="Ex. Kohler Pull Down Faucett" />
        <x-input id="name" class="block w-full" type="text" name="name" value="{{ isset($selection->selectionItem) ? $selection->selectionItem->name : '' }}" autocomplete="off" />
    </div>

    <div class="mt-4">
        <x-label class="mb-1" for="notes" value="Notes" />
        <x-textarea rows=6 id="notes" class="w-full resize-none" name="notes" autocomplete="off">
        @if (isset($selection->selectionItem->notes))
            {{ $selection->selectionItem->notes }}
        @endif
        </x-textarea>
    </div>

    <div class="grid grid-cols-2 gap-2 mt-4">
        <div>
            <x-label class="mb-1" for="item_number" value="Item / Model / Part #" />
            <x-input id="item_number" class="w-full" type="text" name="item_number" value="{{ isset($selection->selectionItem) ? $selection->selectionItem->item_number : '' }}" autocomplete="off" />
        </div>

        <div>
            <x-label class="mb-1" for="supplier" value="Supplier" />
            <x-input id="supplier" class="w-full" type="text" name="supplier" value="{{ isset($selection->selectionItem) ? $selection->selectionItem->supplier : '' }}" autocomplete="off" />
        </div>
    </div>

    <div class="mt-4">
        <x-label class="mb-1" for="link" value="Link" />
        <x-input id="link" class="block w-full" type="text" name="link" value="{{ isset($selection->selectionItem) ? $selection->selectionItem->link : '' }}" autocomplete="off" />
    </div>

    <div class="mt-4 w-[200px] h-[200px] border border-gray-300 dark:border-neutral-800 rounded-xl">
        @if(isset($selection->selectionItem->image))
        <img src="/storage/{{ $selection->image }}" alt="">
        
        @endif
    </div>

    <div class="mt-4">
        <x-label class="pb-1" for="image" value="Image" />
        <x-input id="image" class="block text-sm border border-gray-300 dark:border-neutral-800 p-2 file:bg-blue-600 file:text-white file:rounded-xl file:px-4 file:py-2 file:border-0 file:uppercase file:tracking-widest file:hover:bg-blue-700 file:mr-4 file:text-xs file:font-semibold file:transition file:ease-in-out file:duration-150 hover:cursor-pointer file:hover:cursor-pointer" type="file" name="image" autocomplete="off" />
        @if($errors->has('image'))
        <span class="text-red-600">{{ $errors->first('image') }}</span>
        @endif
    </div>

    <p class="font-semibold mt-4">Additional Details</p>

    {{-- Quantity --}}
    <div class="mt-4">
        <x-label class="mb-1" for="quantity" value="Quantity" />
        <x-input id="quantity" class="block" type="number" name="quantity" value="{{ isset($selection->selectionItem->id) ? $selection->selectionItem->quantity : 1 }}" autocomplete="off" />
    </div>

    {{-- Dimensions --}}
    <div class="grid grid-cols-3 gap-2 mt-4">
        <div>
            <x-label class="mb-1" for="dimensions" value="Dimensions" />
            <x-input id="dimensions" class="w-full" type="text" name="dimensions" value="{{ isset($selection->selectionItem) ? $selection->selectionItem->dimensions : '' }}" autocomplete="off" />
        </div>

        <div>
            <x-label class="mb-1" for="finish" value="Finish" />
            <x-input id="finish" class="w-full" type="text" name="finish" value="{{ isset($selection->selectionItem) ? $selection->selectionItem->finish : '' }}" autocomplete="off" />
        </div>

        <div>
            <x-label class="mb-1" for="color" value="Color" />
            <x-input id="color" class="w-full" type="text" name="color" value="{{ isset($selection->selectionItem) ? $selection->selectionItem->color : '' }}" autocomplete="off" />
        </div>
    </div>
</div>
