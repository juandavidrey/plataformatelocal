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
      <footer>
        <div style="position: absolute; ">
            <div style="display: flex; justify-content: space-around;">
                <div >
                    <img src={{ asset ('assets/img/logos1.png') }} alt="logos Gobernaci贸n" width="250px" margin-right="15px">
                </div>
            <div id="redes-sociales" style="margin-top: 3%;">
                
                <a href="https://www.twitter.com/" data-tip="top" data-original-title="Twitter" target="_blank">
                    <img  src={{ asset ('assets/img/Twitter.png') }} alt="logo twitter" >
                </a>
                <a href="https://www.facebook.com/Gerencia-Para-las-Juventudes-del-Meta-713863738709297/" data-tip="top" data-original-title="Facebook" target="_blank"> 
                    <img  src={{ asset ('assets/img/Facebook.png') }} alt="logo facebook">
                </a>
                <a href="https://www.youtube.com/channel/UCqyt1BtAvfhHR7In-Ndnadw/featured" data-tip="top" data-original-title="YouTube" target="_blank">
                    <img  src={{ asset ('assets/img/YouTube.png') }} alt="logo youutube" >
                </a>
                <a href="https://www.instagram.com/" data-tip="top" data-original-title="Instagram" target="_blank">
                    <img  src={{ asset ('assets/img/Instagram.png') }} alt="logo instagram" >
                </a>
                
            </div>   
            <div >    
                <img  src={{ asset ('assets/img/logos2.png') }} alt="logos Gobernaci贸n" width="250px" margin-left="15px">
            </div>
            </div>
        <!-- barra de colores -->
        <img src={{ asset ('assets/img/BarraDeColores.png') }} style= "vertical-align: middle; height: 30px; width: 100%;">
        </div>
      </footer>
@push('styles')
    <!-- Estilos CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
@endpush
  <!-- jQuery -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>
    @stack('scripts')
  </body>
</html>
