@extends('layout')

@section('content')
<!--Contenido-->
<div class="row">
  <!--Documentos-->
  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
    <center>
      <button type="button" style="border-radius:20px" class="btn btn-default">Resoluci&oacuten</button>
    </center>
  </div>
  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
    <center>
      <button type="button" style="border-radius:20px" class="btn btn-default">Acta</button>
    </center>

  </div>
  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
    <center>
      <button type="button" style="border-radius:20px" class="btn btn-default">Decreto</button>
    </center>
  </div>
</div>
<!--Fin documentos-->
<hr class="separador">
@foreach($posts as $post )
<div class="row">

  <div class="row">


    <div class=" col-sm-8 col-md-11 col-lg-12">
      <h4 align="center">Representantes ante la PDJ</h4>
    </div>
  </div>
  <div class="row">
    <div class=" col-sm-2 col-md-2 col-lg-2">
    </div>
    <div class="col-xs-8 col-sm-4 col-md-4 col-lg-4">
      <ul>
        <!--listado de integrantes-->
        <h5>{{ $post->municipio->representante1}}</h5>
        <li>{{ $post->municipio->rol_rep_1 }}</li>
        <li>{{ $post->municipio->telefono_rep_1 }}</li>
        <li>{{ $post->municipio->correo_rep_1 }}</li>
      </ul>
    </div>
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
      <ul>
        <h5>{{ $post->municipio->representante2}}</h5>
        <li>{{ $post->municipio->rol_rep_2 }}</li>
        <li>{{ $post->municipio->telefono_rep_2 }}</li>
        <li>{{ $post->municipio->correo_rep_2 }}</li>
      </ul>
    </div>
    <div class=" col-sm-2 col-md-2 col-lg-2">
    </div>


  </div>

  <hr class="separador">
  <!--Datos organizacion-->
  <div class="row">

    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4" id="imagegroup">

      @if($post->photos->count() > 0 )
      <figure>
        <img src="storage/{{ $post->photos->first()->url }}" class="img-responsive" id="ImgOrganizaciones" alt="">
      </figure>
      @endif
    </div>


    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-7" id="asoc">
      <h4 class="asotitle">{{ $post->ngrupo }}</h4>
      <p class="text-justify" id="asotext">{{ $post->resumen}}</p>

      <!--link destalles-->

    </div>
  </div>

  <div class="row">
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
      <ul>
        <h5 align="center">Contacto</h5>
        <li align="center">{{ $post->nombre_contacto }}</li>
        <li align="center">{{ $post->telefono_contacto }}</li>
        <li align="center">{{ $post->correo_contacto }}</li>
      </ul>
    </div>
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
      <ul>
        <h5 align="center">Objetivos</h5>
        <li align="justify">{{ $post->objetivos }}</li>
      </ul>

    </div>
    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
      <ul>
        <h5 align="center">Rol</h5>
        <li align="center">{{ $post->rol_contacto }}</li>
      </ul>
    </div>
  </div>

</div>
@endforeach
@endsection

@push('styles')

 <!-- Estilos CSS -->
<link rel="stylesheet" href="assets/css/map.css">

@endpush

@push('scripts')

@endpush
