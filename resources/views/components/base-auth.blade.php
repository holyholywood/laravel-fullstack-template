<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="antialiased scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title }}</title>

    {{-- Load Static --}}
    @include('components.static')
</head>

<body>
    <main class="flex items-center justify-center bg-gray-200 min-h-screen">
        <div class="max-w-4xl w-full space-y-6 card !px-10 !py-8">
            <h1 class="text-xl md:text-2xl font-semibold">{{ $title }}</h1>
            @yield('content')
        </div>
    </main>
</body>

</html>