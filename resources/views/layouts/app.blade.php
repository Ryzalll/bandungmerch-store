<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bandung Merch | {{ $title }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="/vendor/fontawesome/css/all.min.css">
    </head>


<body class="bg-[#f5f5f5]">
    @include('components.navBar')


    <main class="">
        @yield('content')
    </main>

    
    @include('components.footer')
    <script src="/js/jquery-3.7.1.min.js"></script>
    @yield('script')
</body>
</html>
