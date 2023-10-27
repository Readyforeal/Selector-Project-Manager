<x-app-layout>

    @livewire('navigation-menu')

    <div class="p-6 max-w-3xl mx-auto pt-[90px]">

        <h2 class="font-semibold text-xl mb-6">Settings</h2>
        
        <div class="border border-gray-300 dark:border-neutral-800 rounded-xl p-6 overflow-hidden">
            <p class="mb-3 font-semibold">Categories</p>

            <p class="mb-3">Categories are shared across all projects and can be included or excluded as needed. Changing or removing a category will take effect across all projects.</p>

            <div class="my-3 p-6 bg-yellow-50 rounded-xl">
                <p class="font-semibold"><i class="fa fa-lightbulb text-yellow-400 mr-2"></i>Here's a tip</p>
                <p>Categories can be arranged in a custom sorting order. Enter a value to define it's sorting order. This is useful if you prefer to sort by order of construction.</p>
            </div>

            <form action="/settings/categories/create" method="POST" class="mb-3">
                @csrf
                <div class="mt-4">
                    <x-label for="name" value="Create Category" />
                    <div class="flex">
                        <x-input id="name" class="block w-full" type="text" name="name" required autocomplete="off" />
                        <x-button class="inline-flex ml-2"><i class="fa fa-plus"></i></x-button>
                    </div>

                </div>

            </form>

            @forelse (Auth::user()->currentTeam->categories()->get()->sortBy('order') as $category)
                <form action="/settings/categories/{{ $category->id }}/edit" method="POST">
                @csrf
                @method('patch')
                    <div class="flex @if(!$loop->last) pb-2 @endif group">
                        <x-input id="order" class="block mr-2" type="number" name="order" value="{{ $category->order }}" required autocomplete="off" />
                        <x-input id="name" class="block w-full" type="text" name="name" value="{{ $category->name }}" autocomplete="off" />
                        <x-button class="inline-flex ml-2 opacity-0 invisible group-focus-within:opacity-100 group-focus-within:visible"><i class="fa fa-check"></i></x-button>
                    </div>
                </form>
            @empty
                <p>You currently have no categories defined.</p>
            @endforelse
        </div>
    </div>

</x-app-layout>