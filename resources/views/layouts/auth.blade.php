<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Login/Register')</title>
    @vite(['resources/css/app.css', 'resources/js/navbar.js'])
</head>
<body class="bg-[#f5f5f5]" >
    @include('components.navBar')
    <div class="flex items-center justify-center min-h-screen">
            @yield('content')
    </div>
    @include('components.footer')
    @yield('script')
</body>
</html>
