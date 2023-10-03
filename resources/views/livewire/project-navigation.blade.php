<div class="fixed w-[350px] top-0 h-screen left-0 p-6">
    <div class="h-full rounded-xl bg-gray-100 text-black flex flex-col overflow-hidden">
        <div class="flex-none p-6">
            <a href="/projects" class="group text-sm font-semibold">
                <i class="fa fa-chevron-left mr-2 translate-x-1 group-hover:translate-x-0 group-hover:text-blue-600 transition ease-in-out"></i>
                <span class="">Projects</span>
            </a>
        </div>

        @if($project != null)
        <div class="p-6 flex">
            <div class="w-10 h-10 rounded-xl flex justify-center items-center bg-blue-600">
                <p class="font-semibold text-white">{{ Str::substr($project->name, 0, 2) }}</p>
            </div>
            <div class="ml-3">
                <p class="font-semibold">{{ $project->name }}</p>
                <p class="text-xs opacity-50">{{ $project->address }}</p>
            </div>
        </div>

        <div class="flex-grow p-6 overflow-y-auto">
            <p class="font-semibold mb-3">General</p>

            @livewire('project-navigation-link', [
                'url' => '/projects/' . $project->id,
                'icon' => 'fa-home',
                'label' => 'Home',
            ])

            @livewire('project-navigation-link', [
                'url' => '/projects/' . $project->id . '/selections',
                'icon' => 'fa-check',
                'label' => 'Selections',
            ])

            <p class="font-semibold my-3">Administration</p>

            @livewire('project-navigation-link', [
                'url' => '/projects/' . $project->id . '/users',
                'icon' => 'fa-users',
                'label' => 'User Management',
            ])

            @livewire('project-navigation-link', [
                'url' => '/projects/' . $project->id . '/settings',
                'icon' => 'fa-gear',
                'label' => 'Project Settings',
            ])
        </div>
        @endif

        <div class="flex-none bg-blue-600/5 p-6">
            <p class="font-semibold text-blue-600">Account</p>

            <div class="my-3">
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
        </div>
    </div>
</div>
