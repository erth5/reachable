<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Reachable</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('normalize.css') }}">
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="{{ asset('style.css') }}">

    @livewireStyles
</head>

<body class="antialiased">
    <x-sessionStatus />
    @yield('c')

    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.min.js"></script>
    <script>
        $(document).foundation();
    </script>
    @livewireScripts
</body>

</html>
