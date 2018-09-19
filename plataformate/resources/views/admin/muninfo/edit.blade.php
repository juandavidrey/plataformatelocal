	@extends('admin.layout')

@section('header')
	<h1>Editar municipio {{ $municipio->name }}</h1>
	<small>Información de los municipios</small>
	<ol class="breadcrumb">
		<li><a href=" {{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
		<li><a href=" {{ route('admin.muninfo.index') }}"><i class="fa fa-list"></i>Información de municipios</a></li>
		<li class="active">crear</li>
	</ol>
@endsection

@section('content')
<!-- Uso de laravel collective -->
{{ Form::model($municipio, array('route' => array('admin.muninfo.update', $municipio->), 'method' => 'PUT')) }}
<!-- <form action="{{ route('admin.muninfo.update', $municipio) }}" enctype="multipart/form-data" method="POST"> -->
<!-- {{ method_field('PATCH') }} -->
<!-- {{ csrf_field() }}
<p>
	<label for="actapdf">
		<input type="file" name="actapdf" accept="application/pdf"/>
		<input type="text" name="texto"/>
	<label>
</p>-->
<div class="form-group">
		{{ Form::label('representante1', 'Nombre del representante 1') }}
		{{ Form::text('representante1', null, array('class' => 'form-control')) }}
</div>
<!--<div class="form-group">
	<button type="submit" class="btn btn-primary btn-block">Subir pdf</button>
</div>
</form> -->
{{ Form::submit('Enviar', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
<!-- Fin de las pruebas con laravel collective -->
<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-8">
		<div class="box box-primary">
			<div class="box box-body">
				<form method="POST" action="{{ route('admin.muninfo.update', $municipios) }}" enctype="multipart/form-data">
			{{ method_field('put') }}
				{{ csrf_field() }}

					<div class="form-group ">
					<label>Municipio</label>
					<select name="MunicipioName" class="form-control">
						<option value="">Seleccione un Municipio</option>

							<option value=""
								</option>

					</select>

		        </div>
</div>
</div>
</div>

<div class="col-xs-12 col-sm-8 col-md-8">
		<div class="box box-primary">
			<div class="box-body">
				<div class="box-body">
				<div class="form-group">
						<label>Nombre del Representante 1</label>
						<input name="RepresentanteName1"
							type="text"
							class="form-control"
							placeholder="Ingresa el nombre del representante 1">
					</div>
					<div class="form-group">
				</div>

			<div class="form-group ">
						<label>Nombre del Representante 2</label>
						<input name="RepresentanteName2"
							type="text"
							class="form-control"
							placeholder="Ingresa el nombre del representante 2">
					</div>
				<div class="form-group {{ $errors->has('rol_rep_1') ? 'has-error': '' }}">
						<label>Rol del Representante 1</label>
						<input name="RolRep1"
							type="text"
							class="form-control"
							value=""
							placeholder="Ingresa el rol del representante 1">
					</div>
					<div class="form-group ">
						<label>Rol del Representante 2</label>
						<input name="RolRep2"
							type="text"
							class="form-control"
							placeholder="Ingresa el rol del representante 2">
					</div>
			</div>
							</div>
		</div>
	</div>
					<div class="col-xs-12 col-sm-4 col-md-4">
						<div class="box box-primary">
							<div class="box-body">
							<div class="form-group ">
						<label>Correo del Representante 1</label>
						<input name="CorreoRep1"
							type="text"
							class="form-control"
							placeholder="Ingresa el correo del representante 1">

					</div>
					<div class="form-group ">
						<label>Correo del Representante 2</label>
						<input name="CorreoRep2"
							type="text"
							class="form-control"
							placeholder="Ingresa el correo del representante 2">
					</div>

								<div class="form-group ">
					<label>Teléfono del Representante 1</label>
						<input name="TelefonoRep1"
							type="text"
							class="form-control"
							placeholder="Ingresa el  Teléfono del Representante 1">

					</div>

					<div class="form-group ">
						<label>Teléfono del Representante 2</label>
						<input name="TelefonoRep2"
							type="text"
							class="form-control"

							placeholder="Ingresa el  Teléfono del Representante 2">

					</div>
			</div>
		</div>
	</div>

				<div class="col-md-12">
		<div class="box box-primary">
			<div class="box box-body">

						<div class="col-xs-12 col-sm-4 col-md-4">
						<div class="box box-primary">
							<div class="box-body">
							<div class="form-group ">
						<label>Acta</label>
						<span class="help-block">Carga el documento en PDF de la plataforma Municipal</span>
						<label for="actapdf">
					<input type="file" name="ActaPdf" accept="application/pdf"/>

					<label>

						</div>

						<div class="form-group">
					<button type="submit" class="btn btn-primary btn-block">Subir pdf</button>
					</div>
					</div>
					</div>
					</div>

					<div class="col-xs-12 col-sm-4 col-md-4">
						<div class="box box-primary">
							<div class="box-body">
						<div class="form-group ">
						<label>Resolución</label>
						<span class="help-block">Carga el documento en PDF de la plataforma Municipal</span>
						<label for="ResPdf">
					<input type="file" name="actapdf" accept="application/pdf"/>

					<label>

						</div>
						<div class="form-group">
					<button type="submit" class="btn btn-primary btn-block">Subir pdf</button>
					</div>
								</div>
		</div>
	</div>
					<div class="col-xs-12 col-sm-4 col-md-4">
						<div class="box box-primary">
							<div class="box-body">

						<div class="form-group">
						<label>Decreto</label>
						<span class="help-block">Carga el documento en PDF de la plataforma Municipal</span>
						<label for="DecrePdf">
					<input type="file" name="actapdf" accept="application/pdf"/>

					<label>

						</div>
						<div class="form-group">
					<button type="submit" class="btn btn-primary btn-block">Subir pdf</button>
					</div>
					</div>
		</div>
	</div>

	</div>
</div>

</div>
	<div class="col-md-12">

						<label>Actualizar Municipio</label>
						<span class="help-block">Dale clic a Actualizar para guardar la información del Municipio</span>

						<div class="form-group">
					<button type="submit" class="btn btn-primary btn-block">Actualizar</button>
					</div>

		</div>
</form>


</div>
@endsection
@push('styles')
	<link rel="stylesheet" href="/adminlte/plugins/dropzone/css/dropzone.min.css">
@endpush
