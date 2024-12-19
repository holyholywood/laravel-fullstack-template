<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="antialiased scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title }} - {{ env("APP_NAME") }}</title>

    {{-- Load Static --}}
    @include('components.static')
</head>

<body class="text-slate-600">
    <main class="flex">
        @include('components.organisms.navbar')
        <div class="w-full">
            @include('components.organisms.topbar')
            <div class="px-8 py-10 space-y-8">
                <h1 class="text-xl md:text-2xl font-semibold">{{ $title }}</h1>
                @yield('content')
            </div>
        </div>
    </main>
    @isset($custom_scripts)
    @include($custom_scripts)
    @endisset
</body>

</html>