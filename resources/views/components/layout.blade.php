<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dark">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <meta name="description" content="Tali Rejeki — Distributor Insulasi Industri: Nitrile Rubber, Glasswool, Rockwool, aksesoris HVAC & proyek." />
  <meta name="theme-color" content="#7c1415" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Tali Rejeki — Distributor Insulasi Industri</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

  <!-- Favicon -->
  <link rel="icon" href="{{ asset('img/icon-logo/tali-rejeki.jpg') }}" type="image/jpg">

  <!-- Bootstrap CSS (local) -->
  <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  @stack('styles')
</head>
<body>

  @include('components.navbar')

  <main id="app">
    @yield('content')
  </main>

  @include('components.footer', ['produks' => $produks ?? []])

  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Bootstrap JS Bundle (local) - sudah termasuk Popper -->
  <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  @stack('scripts')
</body>
</html>
