<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('meta-title', config('app.name')) </title>
    <meta name="description" content="@yield('meta-description', 'Unidos por los jovenes')">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
      @stack('styles')
  </head>
  <body>    
      @yield('content')
  <!-- jQuery -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>
    @stack('scripts')
  </body>
</html>
