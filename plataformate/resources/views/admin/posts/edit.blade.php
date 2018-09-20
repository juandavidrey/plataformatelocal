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
@if ($post->photos->count() )
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box box-body">
				<div class="row">
					@foreach($post->photos as $photo)
					<form method="POST" action="{{ route('admin.photos.destroy', $photo) }}">
						{{ method_field('DELETE') }} {{ csrf_field() }}
						<div class="col-xs-4 col-md-3">
							<button class="btn btn-danger btn-xs" style="position:absolute;">
								<i class="fa fa-remove"> </i>
							</button>

							<img  class="img-responsive" src= "{{ Storage::url( $photo->url ) }}">
						</div>
					</form>
					@endforeach
				</div>
			</div>
		</div>
	</div>
@endif
	<form method="POST" action="{{ route('admin.posts.update', $post) }}">
		{{ csrf_field() }} {{ method_field('put') }}
	<div class="col-xs-12 col-sm-8 col-md-8">
		<div class="box box-primary">
			<div class="box-body">
				<div class="box-body">
					<div class="form-group {{ $errors->has('ngrupo') ? 'has-error': '' }}">
						<label>Nombre de la organización</label>
						<input name="ngrupo"
							type="text"
							class="form-control"
							value="{{ old('ngrupo', $post->ngrupo) }}"
							placeholder="Ingresa el nombre del grupo">
						{!! $errors->first('ngrupo', '<span class="help-block">:message</span>') !!}

					</div>
					<div class="form-group">
						<label>Carga las imagenes</label>
					<div class="dropzone"></div>
				</div>

			<div class="form-group {{ $errors->has('resumen') ? 'has-error': '' }}">
					<label>Actividades de la organización</label>
					<textarea name="resumen" rows="10"
						class="form-control"
						placeholder="Ingresa las Actividades">{{ old('resumen', $post->resumen) }}</textarea>
					{!! $errors->first('resumen', '<span class="help-block">:message</span>') !!}
				</div>

				<div class="form-group {{ $errors->has('objetivos') ? 'has-error': '' }}">
					<label>Objetivos de la organización</label>
					<textarea name="objetivos" rows="10"
						class="form-control"
						placeholder="Ingresa los objetivos de la organización">{{ old('objetivos', $post->objetivos) }}</textarea>
					{!! $errors->first('rol', '<span class="help-block">:message</span>') !!}
				</div>
					<div class="form-group {{ $errors->has('body') ? 'has-error': '' }}">
						<label>Logros de la Organización</label>
						<textarea name="body" rows="10" id="editor" class="form-control" placeholder="Ingresa el contenido completo de la publicación">{{ old('body', $post->body) }}</textarea>
						{!! $errors->first('body', '<span class="help-block">:message</span>') !!}
					</div>



				</div>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-sm-4 col-md-4">
		<div class="box box-primary">
			<div class="box-body">


				<div class="form-group {{ $errors->has('municipio_id') ? 'has-error': '' }}">
					<label>Municipio</label>
					<select name="municipio_id" class="form-control">
						<option value="">Seleccione un municipio</option>
						@foreach($municipios as $municipio)
							<option value="{{ $municipio->id }}"
									{{ $post->municipio_id == $municipio->id ? 'selected' : '' }}
								>{{ $municipio->name }}</option>
						@endforeach
					</select>
								{!! $errors->first('municipio', '<span class="help-block">:message</span>') !!}
						</div>








<div class="form-group {{ $errors->has('nombre_contacto') ? 'has-error': '' }}">
					<label>Nombre de contacto</label>
					<input name="nombre_contacto"
						type="text"
						class="form-control"
						value="{{ old('nombre_contacto', $post->nombre_contacto) }}"
						placeholder="Ingresa el nombre del representante">
					{!! $errors->first('nombre_contacto', '<span class="help-block">:message</span>') !!}
				</div>
				<div class="form-group {{ $errors->has('correo_contacto') ? 'has-error': '' }}">
					<label>Correo de contacto</label>
					<input name="correo_contacto"
						type="text"
						class="form-control"
						value="{{ old('correo_contacto', $post->correo_contacto) }}"
						placeholder="Ingresa el correo de contacto">
					{!! $errors->first('correo_contacto', '<span class="help-block">:message</span>') !!}
				</div>
				<div class="form-group {{ $errors->has('telefono_contacto') ? 'has-error': '' }}">
					<label>Telefono de contacto</label>
					<input name="telefono_contacto"
						type="text"
						class="form-control"
						value="{{ old('telefono_contacto', $post->telefono_contacto) }}"
						placeholder="Ingresa el telefono de contacto">
					{!! $errors->first('telefono_contacto', '<span class="help-block">:message</span>') !!}
				</div>


				<div class="form-group {{ $errors->has('rol_contacto') ? 'has-error': '' }}">
					<label>Rol en la organización</label>
					<textarea name="rol_contacto"
						class="form-control"
						placeholder="Rol del contacto en la organización">{{ old('rol_contacto', $post->rol_contacto) }}</textarea>
					{!! $errors->first('rol_contacto', '<span class="help-block">:message</span>') !!}
				</div>


				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-block">Guardar Grupo</button>
				</div>
			</div>
		</div>
	</div>
	</form>
</div>

@endsection
@push('styles')
	<link rel="stylesheet" href="/adminlte/plugins/dropzone/css/dropzone.min.css">
@endpush
@push('scripts')
	<!-- CK Editor -->
	<script src="/adminlte/plugins/ckeditor/ckeditor.js"></script>
	<!--<script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>-->
	<!-- Dropzone -->
	<script src="/adminlte/plugins/dropzone/js/dropzone.min.js"></script>
	<script>
		    // Replace the <textarea id="editor"> with a CKEditor
		    // instance, using default configuration.
			CKEDITOR.replace('editor');

			CKEDITOR.config.height = 315;

		    var myDropzone = new Dropzone('.dropzone', {
		    	url:'/admin/posts/{{ $post->url }}/photos',
		    	paramName: 'photo',
		    	acceptedFiles: 'image/*',
		    	maxFilesize:2,
		    	headers :{
		    		'X-CSRF-TOKEN': '{{ csrf_token() }}'
		    	},
		    	//dictDefaultMessage: 'Arrastra las fotos aquí para subirlas',
		    });

		    myDropzone.on('error', function(file, res){
		    	var msg = res.errors.photo[0];
				//var msg = res.photo[0];
		    	//console.log(res.errors.photo[0]);
		    	$('.dz-error-message:last> span').text(msg);
		    });

		    Dropzone.autoDiscover = false;



	</script>

@endpush
