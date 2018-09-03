@extends('layout')

@section('content')
<!--Contenido-->
	@foreach($posts as $post )
	<div class="row">
	    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" id="imagegroup">
	        @if($post->photos->count() > 0 )
				<figure><img src="{{ url('storage',$post->photos->first()->url) }}" class="img-responsive" alt=""></figure>			
			@endif			
	    </div>
	    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8" id="asoc">
	        <h4 class="asotitle">{{ $post->ngrupo }}</h4>
	        <p class="text-justify" id="asotext">{{ $post->resumen}}</p>	        
	        <p style="color:#fff;" id="asorepre"><strong>REPRESENTANTE</strong></p>
	        <ul id="rtl_func">
	        	<!--listado de integrantes-->
	            <li id="asorepre">{{ $post->representante }}</li>					            
	        </ul>
	        <!--link destalles-->
	        <a href="/grupos/{{ $post->url }}" class="btn btn-warning" id="btnVer" target="_blank">Ver más</a>
	    </div>
	</div>
	<hr>
	@endforeach
@endsection

@push('styles')

 <!-- Estilos CSS -->  
<link rel="stylesheet" href="assets/css/map.css">

@endpush

@push('scripts')    
  
@endpush
