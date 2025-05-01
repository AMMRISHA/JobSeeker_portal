<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>JobSeeker</title>

  <!-- Bootstrap 4 CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{asset('css/sinup.css')}}">
  <link rel="stylesheet" href="{{asset('css/login.css')}}">
  <!-- Optional plugins -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.css') }}">
  @yield('styles')
</head>
<body>

  @include('partials.navbar')

  <div class="container" style="    padding-left: 0px !important;
    padding-right: 0px !important;width: 100% !important;
    max-width: 100% !important;">
    @yield('content')
  </div>

  @include('partials.footer')

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!-- Optional Plugins -->
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  <script src="https://momentjs.com/downloads/moment-with-locales.min.js"></script>
  <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
   <script src="{{ asset('js/bootstrap.min.js') }}"></script>
 

   @yield('scripts') <!-- Placeholder for scripts from child views -->

@stack('scripts') <!-- Additional scripts pushed by child views -->
</body>
</html>
