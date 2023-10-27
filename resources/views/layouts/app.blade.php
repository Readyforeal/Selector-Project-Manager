<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/210158a457.js" crossorigin="anonymous"></script>

        <style>
            ::-webkit-scrollbar {
                width: 10px;
                padding: 2px;
            }

            ::-webkit-scrollbar-track {
                background: #f1f1f1;
                border-radius: 5px;
            }

            ::-webkit-scrollbar-thumb { 
                background: #888; 
                border-radius: 5px;
            }

            ::-webkit-scrollbar-thumb:hover { 
                background: #555; 
            }
        </style>

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100 dark:bg-black dark:text-gray-200 rounded-">
            <!-- Page Content -->
            <main class="opacity-0 -ml-3 transition-all ease-out duration-300" id="main">
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts

        <script>
            document.addEventListener("DOMContentLoaded", function(event) {
                var main = document.getElementById('main');
                main.classList.add('opacity-100');
                main.classList.add('ml-0')
            });
        </script>
        
    </body>
</html>
