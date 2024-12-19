{{-- FavIcon --}}
<link rel="icon" href="{{ asset('favicon.ico') }}">

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=PT+Serif+Caption:ital@0;1&display=swap"
    rel="stylesheet">
{{-- Styles --}}
@vite(['resources/css/app.css', 'resources/js/app.js'])
{{-- Icons --}}
<link rel="stylesheet" href="{{ asset('icons/remix-icon/remixicon.css') }}" />
<link rel="stylesheet" href="">
{{-- Plugin --}}
<script src="{{ asset('static/plugin/jquery/jquery.js') }}"></script>
<script src="{{ asset('static/plugin/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>

<script src="{{ asset('js/helper.js') }}"></script>
<script src="{{ asset('js/plugin.js') }}"></script>