<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FIK - CARE</title>
    <link rel="stylesheet" href="/assets/css/landing.css">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/fikcarelogo.png') }}">

</head>
<body>

    @include('components.navbar')

    <main>
        @yield('content')
    </main>

    @include('components.footer')

    <script src="/assets/js/landing.js"></script>

</body>
</html>
