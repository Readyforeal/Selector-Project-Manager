<div class="fixed w-[300px] top-0 bottom-0 left-0 py-3 pl-3">
    <div class="h-full bg-neutral-950 text-white dark:bg-black dark:text-gray-200 flex flex-col rounded-xl overflow-hidden">
        {{-- <div class="flex-none p-6">
            <h1 class="text-2xl font-semibold text-blue-600">Clara</h1>
        </div> --}}

        @if($project != null)

        <div class="px-6 mt-6">
            <a href="/projects" class="opacity-50 hover:opacity-100 transition ease-in-out">
                <i class="fa fa-fw fa-chevron-left"></i> Projects
            </a>
        </div>

        <div class="flex justify-between p-6">
            <div class="mr-2 mt-1">
                <a href="/projects/{{ $project->id }}/settings" class="opacity-50 hover:opacity-100 transition ease-in-out">
                    <i class="fa fa-fw fa-gear"></i>
                </a>
            </div>
            <div class="w-full">
                <p class="text-2xl font-semibold">{{ $project->name }}</p>
                <p class="text-sm opacity-50">{{ $project->address }}</p>
                <p class="text-sm opacity-50">{{ $project->description }}</p>
            </div>
        </div>

        <div class="flex-grow p-6 overflow-y-auto">

            @livewire('project-navigation-link', [
                'url' => '/projects/' . $project->id,
                'icon' => 'fa-home',
                'label' => 'Dashboard',
            ])

            @livewire('project-navigation-link', [
                'url' => '/projects/' . $project->id . '/selection-lists',
                'icon' => 'fa-check-circle',
                'label' => 'Selection Lists',
            ])

            {{-- @livewire('project-navigation-link', [
                'url' => '/projects/' . $project->id . '#',
                'icon' => 'fa-money-bill-trend-up',
                'label' => 'Estimating',
            ]) --}}

            {{-- @livewire('project-navigation-link', [
                'url' => '/projects/' . $project->id . '#',
                'icon' => 'fa-file-invoice',
                'label' => 'Proposals',
            ]) --}}

            {{-- @livewire('project-navigation-link', [
                'url' => '/projects/' . $project->id . '#',
                'icon' => 'fa-image',
                'label' => 'Photos',
            ]) --}}

            @livewire('project-navigation-link', [
                'url' => '/projects/' . $project->id . '/users',
                'icon' => 'fa-users',
                'label' => 'Users',
            ])

        </div>
        @endif

        <div class="flex-none p-6 border-t border-neutral-800">
            <div class="mb-3">
                <p>{{ Auth::user()->name }}</p>
                <p class="text-xs opacity-50">{{ Auth::user()->email }}</p>
            </div>

            @livewire('project-navigation-link', [
                'url' => route('profile.show'),
                'icon' => 'fa-user',
                'label' => 'Account Settings',
            ])

            <form method="POST" action="{{ route('logout') }}" x-data>
                @csrf

                <a href="{{ route('logout') }}" class="flex w-full text-sm opacity-50 hover:opacity-100 hover:bg-blue-600/20 cursor-pointer py-2 rounded-lg group transition ease-in-out""
                        @click.prevent="$root.submit();">
                    <span class="group-hover:translate-x-2 transition ease-in-out flex">
                        <i class="fa fa-fw fa-right-from-bracket mt-[3px] opacity-40 group-hover:opacity-100 group-hover:text-blue-600 transition ease-in-out"></i>
                        <p class="font-semibold ml-3">Log Out</p>
                    </span>
                </a>
            </form>

            <p class="text-xs mt-3">Clara V1.0.0</p>
        </div>
    </div>
</div>
