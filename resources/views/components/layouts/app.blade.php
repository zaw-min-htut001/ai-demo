<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Fonts -->
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
        {{-- dasiy ui --}}
        <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.14/dist/full.min.css" rel="stylesheet" type="text/css" />
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        @livewireStyles
        @livewireScripts

        <title>{{ $title ?? 'Ai bot' }}</title>
    </head>
    <body x-data="{ currentRoute: window.location.pathname }">
        <div class="drawer lg:drawer-open">
            <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
            <div class="drawer-content flex justify-center items-center relative">
                {{ $slot }}
            </div>
            <div class="drawer-side">
                <label for="my-drawer-2" aria-label="close sidebar" class="drawer-overlay"></label>
                <ul class="menu bg-base-300 text-base-content min-h-full w-80 p-4 gap-2">
                    <!-- Sidebar content here -->
                    <li><a :class="currentRoute === '/' ? 'bg-accent' : ''"   href="/" wire:navigate>Chat Bot</a></li>
                    <li><a :class="currentRoute === '/image/generate' ? 'bg-accent' : ''"  href="/image/generate" wire:navigate>Image Generator</a></li>
                    <li><a :class="currentRoute === '/audio' ? 'bg-accent' : ''"  href="/audio" wire:navigate>Audio Generator</a></li>
                </ul>
            </div>
        </div>
    </body>
</html>
