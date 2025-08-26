<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Login Panel Admin') | Tali Rejeki</title>
    <!-- Bootstrap -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>

    <!-- Font & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('img/icon-logo/tali-rejeki.jpg') }}" type="image/jpg">
    @stack('styles')
      <link href="{{ asset('css/style-auth.css') }}" rel="stylesheet">

</head>
<body class="bg-light">
    <main>
        @yield('content')
    </main>

    @include('auth.components.footer')
    @stack('scripts')
</body>
</html>
