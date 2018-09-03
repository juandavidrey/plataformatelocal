
@extends('layout')
@section('content')
    <div class="fullsize-video-bg">
      <!-- menu-->
      <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-md-10 col-lg-10" id="logo">
          <img src="assets/img/plataformate.png" alt="plataformate">
        </div>
      </div>
      <!-- menu-->
      <div class="row" id="menutadesktop">
        <div class="hidden-xs hidden-sm col-md-11 col-md-offset-1 col-lg-11 col-lg-offset-1">
          <div class="col-xs-4 col-sm-4 col-md-4 col-lg-3" id="enterate">
            <a href="http://enterate.dev" target="_blank">
              <img src="assets/img/enterate.png" class="img-responsive" alt="enterate" >
            </a>
          </div>
          <div class="col-xs-4 col-sm-4 col-md-4 col-lg-5" id="organizaciones">
            <a href="{{ URL::to('mapa') }}" target="_blank">
              <img src="assets/img/organizaciones.png" class="img-responsive" alt="organizaciones juveniles" >
            </a>
          </div>
          <div class="col-xs-4 col-sm-4 col-md-4 col-lg-3" id="formate">
            <a href="http://formarte.dev" target="_blank">
              <img src="assets/img/formatevir.png" class="img-responsive" alt="formate virtual" >
            </a>
          </div>
        </div>
        <div class="visible-xs">
          <div class="col-xs-8 col-xs-offset-2">
            <a href="">
              <img src="assets/img/organizaciones.png" alt="">
            </a>
          </div>
          <div class="col-xs-6">
            <a href="">
              <img src="assets/img/enterate.png" alt="">
            </a>
          </div>
          <div class="col-xs-6">
            <a href="">
              <img src="assets/img/formatevir.png" alt="">
            </a>
          </div>
        </div>
        <div class="visible-sm">
          <div class="col-xs-4">
            <a href="">
              <img src="assets/img/enterate.png" alt="">
            </a>
          </div>
          <div class="col-xs-4">
            <a href="">
              <img src="assets/img/organizaciones2.png" alt="">
            </a>
          </div>
          <div class="col-xs-4">
            <a href="">
              <img src="assets/img/formatevir.png" alt="">
            </a>
          </div>
        </div>
      </div>
      <div class="row" id="footer">
        <!-- REDES-->
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
          <ul id="redes">
            <li>
              <p id="redessociales">Siguenos en redes sociales </p>
            </li>
            <li>
              <a href="http://www.facebook.com/juventudesmeta" target="_blank">
                <img src="assets/img/facebook.png" class="img-responsive" alt="redes sociales, facebook">
              </a>
              <a href="http://www.instagram.com/juventudesmeta" target="_blank">
                <img src="assets/img/instagram.png" class="img-responsive" alt="redes sociales, instagram">
              </a>
            </li>
          </ul>
        </div>
        <!-- FIN REDES-->
        
        <!-- LOGOS -->
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" id="gobernacion" >
          <a href="http://www.meta.gov.co" target="_blank">
            <img src="assets/img/gobernacion.png"  class="img-responsive" alt="Gobernación del Meta">
          </a>
        </div>
      </div>
      <div id="video-viewport">
        <video  autoplay muted loop>
          <source src="assets/video/index.mp4" type="video/mp4" />
          <source src="assets/video/index.webm" type="video/webm" />
        </video>
      </div>
    </div>
@endsection
@push('styles')

 <!-- Estilos CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

@endpush

@push('scripts')
  <script>
    var min_w = 300;
    var vid_w_orig;
    var vid_h_orig;

$(function() {

    vid_w_orig = parseInt($('video').attr('width'));
    vid_h_orig = parseInt($('video').attr('height'));

    $(window).resize(function () { fitVideo(); });
    $(window).trigger('resize');

});

function fitVideo() {

    $('#video-viewport').width($('.fullsize-video-bg').width());
    $('#video-viewport').height($('.fullsize-video-bg').height());

    var scale_h = $('.fullsize-video-bg').width() / vid_w_orig;
    var scale_v = $('.fullsize-video-bg').height() / vid_h_orig;
    var scale = scale_h > scale_v ? scale_h : scale_v;

    if (scale * vid_w_orig < min_w) {scale = min_w / vid_w_orig;};

    $('video').width(scale * vid_w_orig);
    $('video').height(scale * vid_h_orig);

    $('#video-viewport').scrollLeft(($('video').width() - $('.fullsize-video-bg').width()) / 2);
    $('#video-viewport').scrollTop(($('video').height() - $('.fullsize-video-bg').height()) / 2);

};
  </script>
@endpush
