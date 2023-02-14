<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/bootstrap.min.css') }}">
    @stack('styles')
</head>
<body>
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js" integrity="sha512-cM+W5VlJYZlcCQX1Lz4E4+4LwZJypFMA0x76dmKH1Dd+vy0AWh1TtXJy29dPzR0YH07/FjxvGv+53q3apQJ1nA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>
