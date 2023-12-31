<x-app-layout>

    @livewire('project-navigation', ['project' => $project])

    <div class="p-6 ml-[300px]">
        <p class="mb-6"><a href="/projects/{{ $project->id }}/selection-lists">Selection Lists</a> <i class="fa fa-chevron-right mx-2"></i> <a href="/projects/{{ $project->id }}/selection-lists/{{ $selectionList->id }}">{{ $selectionList->name }}</a> <i class="fa fa-chevron-right mx-2"></i> <span class="font-semibold">Selection</span></p>

        <div class="grid grid-cols-3 gap-4">
            <div>
                <div class="bg-white dark:bg-neutral-900 rounded-xl shadow-xl overflow-hidden sticky top-6">

                    <div class="p-6 border-b border-gray-300">
                        <div class="flex justify-between">
                            <x-button onclick="window.location='/projects/{{ $project->id }}/selection-lists/{{ $selectionList->id }}/selections/{{ $selection->id }}/edit'"><i class="fa fa-fw fa-pen-to-square mr-3"></i>Edit</x-button>
                            
                            @isset($selection->selectionItem)

                                {{-- Show approval button if selection open for approval --}}

                            @endisset

                        </div>
                    </div>

                    <div class="p-6">
                        
                        <div>
                            <p class="text-xl font-semibold">{{ $selection->title }}</p>
                            <p class="{{ isset($selection->selectionItem->name) ? 'font-semibold' : 'text-gray-400' }}">
                                {{ isset($selection->selectionItem->name) ? $selection->selectionItem->name : 'No selection' }}
                            </p>
                        </div>

                        <div class="grid grid-cols-2 gap-4 mt-4">
                            <div class="w-[200px] h-[200px] p-6 border border-gray-300 dark:border-neutral-800 rounded-xl">
                                @if($selection->selectionItem->image != '')
                                <img src="/storage/{{ $selection->selectionItem->image }}" alt="">
                                @endif
                            </div>

                            <div>
                                <div>
                                    <p class="text-xs font-semibold">Supplier</p>
                                    <p>{{ isset($selection->selectionItem->supplier) ? $selection->selectionItem->supplier : 'None' }}</p>
                                </div>
            
                                <div class="mt-4">
                                    <p class="text-xs font-semibold">Item Number</p>
                                    <p>{{ isset($selection->selectionItem->item_number) ? $selection->selectionItem->item_number : 'None' }}</p>
                                </div>
                
                                <div class="mt-4">
                                    <p class="text-xs font-semibold">Link</p>
                                    @isset($selection->selectionItem->link)
                                    <a href="{{ $selection->selectionItem->link }}">Go to link <i class="fa fa-link"></i></a>
                                    @else
                                    <p>No link</p>
                                    @endisset
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <p class="text-xs font-semibold">Notes</p>
                            <p>{{ isset($selection->selectionItem->notes) ? $selection->selectionItem->notes : 'None' }}</p>
                        </div>
        
                        <div class="grid grid-cols-4 gap-4 mt-4">
                            <div>
                                <p class="text-xs font-semibold">Quantity</p>
                                <p>{{ $selection->selectionItem->quantity }}</p>
                            </div>

                            <div>
                                <p class="text-xs font-semibold">Dimensions</p>
                                <p>{{ isset($selection->selectionItem->dimensions) ? $selection->selectionItem->dimensions : 'None' }}</p>
                            </div>
        
                            <div>
                                <p class="text-xs font-semibold">Finish</p>
                                <p>{{ isset($selection->selectionItem->finish) ? $selection->selectionItem->finish : 'None' }}</p>
                            </div>
        
                            <div>
                                <p class="text-xs font-semibold">Color</p>
                                <p>{{ isset($selection->selectionItem->color) ? $selection->selectionItem->color : 'None' }}</p>
                            </div>
                        </div>
    
                        <div class="grid grid-cols-2 gap-4 mt-8">
                            <div class="p-3 border border-gray-300 rounded-xl">
                                <p class="text-xs font-semibold mb-2"><i class="fa fa-tag mr-2"></i>Categories</p>
                                @foreach ($selection->selectionItem->categories as $category)
                                    <p class="text-xs">{{ $category->name }}</p>
                                @endforeach
                            </div>
        
                            <div class="p-3 border border-gray-300 rounded-xl">
                                <p class="text-xs font-semibold mb-2"><i class="fa fa-location mr-2"></i>Locations</p>
                                @foreach ($selection->locations as $location)
                                    <p class="text-xs">{{ $location->name }}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div class="bg-white dark:bg-neutral-900 rounded-xl shadow-xl overflow-hidden">
                    <div class="p-6">
                        <p class="font-semibold mb-2">Discussion</p>
                        <form class="text-right" action="/projects/{{ $project->id }}/selection-lists/{{ $selectionList->id }}/selections/{{ $selection->id }}/comments/create" method="POST">
                            @csrf
                            <input type="hidden" name="model_type" value="selection">
                            <input type="hidden" name="model_id" value="{{ $selection->id }}">
                            <x-textarea rows=4 id="comment" class="w-full resize-none" name="comment" autocomplete="off"></x-textarea>
                            <x-button class="mt-2">Post</x-button>
                        </form>

                        @forelse ($selection->comments->sortByDesc('created_at') as $comment)
                            <div class="mt-4 p-3 border border-gray-300 dark:border-gray-800 rounded-xl">
                                <p class="text-sm font-semibold">{{ App\Models\User::where('id', $comment->user_id)->first()->name }}</p>
                                <p class="text-xs">{{ $comment->created_at }}</p>
                                <p>{{ $comment->comment }}</p>
                            </div>
                        @empty
                            <p class="text-center p-6">No comments</p>
                        @endforelse
                    </div>
                </div>

                
            </div>
        </div>

    </div>
</x-app-layout>