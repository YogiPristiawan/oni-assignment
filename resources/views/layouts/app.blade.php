<!DOCTYPE html>
<html lang="en">

<head>
  <title>
    {{ env('APP_NAME') . ' | ' }}
    @yield('title')
  </title>

  <!-- Meta -->
  @include('layouts.fragments.meta')

  <!-- Script -->
  @include('layouts.fragments.head-script')

  <!-- Link -->
  @include('layouts.fragments.link')
</head>

<body class="app">
  <header class="app-header fixed-top">
    <!-- Navbar -->
    @include('layouts.navbar')

    <!-- Sidebar -->
    @include('layouts.sidebar')
  </header>
  <div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
      <div class="container-xl">
        <!-- Content -->
        @yield('content')

      </div>
    </div>

    <!-- Footer -->
    @include('layouts.footer')
  </div>

  <!-- Script -->
  @if (env('APP_ENV') == 'production')
    <script>
      document.addEventListener("contextmenu", function(e) {
        e.preventDefault();
      });
      document.onkeydown = function(e) {
        if (event.keyCode == 123) {
          return false;
        }
        if (e.ctrlKey && e.shiftKey && e.keyCode == "I".charCodeAt(0)) {
          return false;
        }
        if (e.ctrlKey && e.shiftKey && e.keyCode == "C".charCodeAt(0)) {
          return false;
        }
        if (e.ctrlKey && e.shiftKey && e.keyCode == "J".charCodeAt(0)) {
          return false;
        }
        if (e.ctrlKey && e.keyCode == "U".charCodeAt(0)) {
          return false;
        }
      };
    </script>
  @endif
  @include('layouts.fragments.body-script')
  @stack('script')

</body>

</html>
