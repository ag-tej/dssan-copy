<!DOCTYPE html>
<html lang="en-NP">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('images/logo/deerlogo.png') }}" type="image/x-icon">
    <title>ADMIN | DSSAN</title>
    @vite('resources/css/app.css')
    <script src="{{ asset('js/admin.js') }}" defer></script>
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
    </style>
</head>

<body class="bg-ui-white">
    @include('components.admin-navbar')
    @include('components.admin-sidebar')
    @include('components.user-dropdown')
    <div class="absolute z-50 top-8 w-full flex justify-center">
        @include('components.message-box')
    </div>
    <div class="mt-18 mr-5 ml-56 mb-18 z-0">
        @yield('content')
    </div>
    @include('components.delete-confirmation-box')
</body>

</html>
