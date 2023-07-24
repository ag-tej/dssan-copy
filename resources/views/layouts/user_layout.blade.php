<!DOCTYPE html>
<html lang="en-NP">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('images/logo/deerlogo.png') }}" type="image/x-icon">
    <title>DSSAN</title>
    @vite('resources/css/app.css')
    <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>

    {{-- aos animation library from https://michalsnik.github.io/aos/ --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    {{-- public css/js flies --}}
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
    <script src="{{ asset('js/user.js') }}" defer></script>

    {{-- number increment animation --}}
    <script src="{{ asset('js/number-rush.js') }}"></script>

    <style>
        /* Minimize autofill highlighting */
        input:-webkit-autofill {
            -webkit-text-fill-color: #111827 !important;
            -webkit-box-shadow: 0 0 0 0 #f3f4f6 inset !important;
            background-clip: content-box !important;
        }

        /* scrollbar styling */
        ::-webkit-scrollbar {
            display: none;
            scroll-behavior: smooth;
        }

        /* css check */
        * {
            /* border: 1px solid red; */
        }
    </style>
</head>

<body class="min-h-screen flex flex-col">
    {{-- aos animation activation --}}
    <script>
        AOS.init();
    </script>

    {{-- navbar --}}
    @include('components.nav-bar')

    {{-- main content --}}
    <main>
        @yield('content')
    </main>

    {{-- footer feedback form --}}
    @include('components.feedback-form')

    {{-- feedback success notification --}}
    @include('components.notification-box')

    {{-- social icons bottom-right --}}
    @include('components.social-icons')

    {{-- footer --}}
    @include('components.footer')
</body>

</html>
