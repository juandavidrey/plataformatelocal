@include('layout')
<footer>

  <div class="container">
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">

      <a href="http://enterate.plataformate.com">
        <img class="img-responsive" src={{ asset ( 'assets/img/logos1.png') }} alt="logos Gobernaci贸n">
      </a>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="display: inline-flex;
    margin-top: 5%; justify-content: space-around;">

      <a href="http://formate.plataformate.com">
        <img class="img-responsive" src={{ asset ( 'assets/img/Twitter.png') }} alt="logo twitter">
      </a>

      <a href="{{ URL::to('mapa') }}">
        <img class="img-responsive" src={{ asset ( 'assets/img/Facebook.png') }} alt="logo facebook">
      </a>

      <a href="{{ URL::to('mapa') }}">
        <img class="img-responsive" src={{ asset ( 'assets/img/YouTube.png') }} alt="logo youutube">
      </a>

      <a href="{{ URL::to('mapa') }}">
        <img class="img-responsive" src={{ asset ( 'assets/img/Instagram.png') }} alt="logo instagram">
      </a>

    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">

      <a href="{{ URL::to('mapa') }}">
        <img class="img-responsive" src={{ asset ( 'assets/img/logos2.png') }} alt="logo facebook">
      </a>

    </div>
  </div>

  <!-- barra de colores -->
  <img src={{ asset ( 'assets/img/BarraDeColores.png') }} style="vertical-align: middle; height: 30px; width: 100%;">

</footer>
