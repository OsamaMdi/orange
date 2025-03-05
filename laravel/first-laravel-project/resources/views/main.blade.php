<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Laravel Page</title>
    <link rel="stylesheet" href="{{ asset('css/content.css') }}">
</head>
<body>
    <header>
        @include('header')
    </header>    

    <main class="container">
        @yield('content')
    </main>

    <footer>
        @include('footer')
    </footer>
</body>
</html>
