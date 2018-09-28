@extends('layout')
@section('content')
<!-- menu-->

<!-- menu-->

<body>
  </br>
  </br>
  </br>
  </br>
  <div class="container">
    <div class="col-lg-4 col-md-4 col-xs-4">
      <div class="rotacion">
        <img class="img-responsive" src={{ asset ( 'assets/img/Circulo1.png') }}>
      </div>
      <a href="http://enterate.plataformate.com">
        <img src={{ asset ( 'assets/img/play.png') }} hspace="150" vspace="150" class="sobre">
      </a>
      <div class="indexText"> Entérate </div>
    </div>
    <div class="col-lg-4 col-md-4 col-xs-4">
      <div class="rotacion">
          <img class="img-responsive" src={{ asset ( 'assets/img/Circulo2.png') }}>
      </div>
      <a href="http://formate.plataformate.com">
        <img src={{ asset ( 'assets/img/play.png') }} hspace="150" vspace="150" class="sobre">
      </a>
      <div class="indexText"> Fórmate </div>
    </div>
    <div class="col-lg-4 col-md-4 col-xs-4">
      <div class="rotacion">
        <img class="img-responsive" src={{ asset ( 'assets/img/Circulo3.png') }}>
      </div>
      <a href="{{ URL::to('mapa') }}">
        <img src={{ asset ( 'assets/img/play.png') }} hspace="150" vspace="150" class="sobre">
      </a>
      <div class="indexText"> Caracterízate </div>
    </div>
  </div>

  <!--<div class="row">-->
  </br>
@include('footer')
@endsection

@push('styles')
<!-- Estilos CSS -->
<link rel="stylesheet" href="assets/css/map.css">
<link rel="stylesheet" href="assets/css/style.css">
@endpush

</body>
