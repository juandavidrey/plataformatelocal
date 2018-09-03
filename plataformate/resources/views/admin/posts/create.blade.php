@extends('admin.layout')
@section('header')
	<h1>
        Grupos
        <small>Crear grupo</small>
	</h1>
		<ol class="breadcrumb">
		<li><a href=" {{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
		<li><a href=" {{ route('admin.posts.index') }}"><i class="fa fa-list"></i> Grupos</a></li>
		<li class="active">crear</li>
	</ol>
@endsection
@section('content')
<div class="row">
	<form  method="POST" action="{{ route('admin.posts.store') }}">
			{{ csrf_field() }}
		<div class="col-md-8">
			<div class="box box-primary">                        
	            <div class="box-body">
	              <div class="form-group {{ $errors->has('ngrupo') ? 'has-error': '' }}">
	              	<label>Nombre del grupo</label>
	              	<input name="ngrupo" 
	              	type="text" 
	              	class="form-control" 	              	
	              	placeholder="Ingresa el nombre del grupo">
	              	{!! $errors->first('ngrupo', '<span class="help-block">:message</span>') !!}
	              </div>              
	              <div class="form-group {{ $errors->has('body') ? 'has-error': '' }}">
	              	<label>Contenido</label>
	              	<textarea name="body" id="editor" rows="10" class="form-control" placeholder="Ingresa el contenido del grupo">
	              		{{  old('body') }}
	              	</textarea>	
	              	{!! $errors->first('body', '<span class="help-block">:message</span>') !!}
	              </div>
	            </div>                       
	        </div>
		</div>
		<div class="col-md-4">
			<div class="box box-primary">                        
	            <div class="box-body">
	            	<div class="form-group {{ $errors->has('representante') ? 'has-error': '' }}">
		              	<label>Representante</label>
		              	<textarea name="representante"
		              	class="form-control" 
		              	placeholder="Ingresa el nombre del representante del grupo">
		              		{{ old('representante') }}
		              	</textarea>	
		              	{!! $errors->first('representante', '<span class="help-block">:message</span>') !!}
					</div> 

					<div class="form-group {{ $errors->has('representante') ? 'has-error': '' }}">
		              	<label>Representante</label>
		              	<textarea name="representante2"
		              	class="form-control" 
		              	placeholder="Ingresa el nombre del representante del grupo">
		              		{{ old('representante2') }}
		              	</textarea>	
		              	{!! $errors->first('representante2', '<span class="help-block">:message</span>') !!}
		            </div>


	            	<div class="form-group {{ $errors->has('representante') ? 'has-error': '' }}">
		              	<label>Resumen</label>
		              	<textarea name="resumen"
		              	class="form-control" 
		              	placeholder="Ingresa el resumen del grupo">
		              		{{ old('resumen') }}
		              	</textarea>	
		              	{!! $errors->first('resumen', '<span class="help-block">:message</span>') !!}
		            </div>  
		            <div class="form-group {{ $errors->has('municipio') ? 'has-error': '' }}">
		              	<label>Municipios</label>
		              	<select name="municipio" class="form-control">
		              		<option value="">Seleccione un municipio</option>
		              		@foreach($municipios as $municipio)
		              			<option value="{{ $municipio->id }}" 
		              				{{ old('municipio') == $municipio->id ? 'selected' : '' }}
		              				>{{ $municipio->name }}</option>
		              		@endforeach
		              	</select>	
		              	{!! $errors->first('municipio', '<span class="help-block">:message</span>') !!}	
		            </div>  
		            <div class="form-group">
						<div class="dropzone"></div>
					</div>
		            <div class="form-group">		              	
		              	<button type="submit" class="btn btn-primary btn-block">Guardar</button>
		            </div>  
	            </div>                     
	        </div>        
		</div>
	</form> 
</div>	         
@endsection

@push('styles')

@endpush
@push('scripts')
	<!-- CK Editor -->
	<script src="/adminlte/plugins/ckeditor/ckeditor.js"></script>
	<!--<script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>-->
	<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor');

    /*var myDropzone = new Dropzone('.dropzone', {
    	url:'/admin/posta//photos',
    	paramName: 'photo',
    	acceptedFiles: 'image/*',		    	
    	maxFilesize:2,
    	headers :{
    		'X-CSRF-TOKEN': ''
    	},
    	dictDefaultMessage: 'Arastra las fotos aquí para subirlas'
    });
    //debugger
    myDropzone.on('error', function(file, res){
    	var msg = res.photo[0];
    	$('.dz-error-message:last > span').text(msg);
    });
    Dropzone.autoDiscover = false;*/
  });
</script>
@endpush