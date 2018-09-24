@extends('admin.layout')

@section('header')
<h1>Editar municipio {{ $municipio->name }}</h1>
<small>Información del municipio</small>
<ol class="breadcrumb">
  <li><a href=" {{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
  <li><a href=" {{ route('admin.muninfo.index') }}"><i class="fa fa-list"></i>Información del municipio</a></li>
  <li class="active">crear</li>
</ol>
@endsection

@section('content')
	<!-- Uso de laravel collective -->
	{{ Form::model($municipio, array('route' => array('admin.muninfo.update', $municipio->id), 'method' => 'PUT', 'files' => true)) }}
	<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-8">
		<div class="box box-primary">
			<div class="box-body">
					<div class="box-body">
						<div class="form-group">
								{{ Form::label('representante1', 'Nombre del representante 1') }}
								{{ Form::text('representante1', null, array('class' => 'form-control')) }}
						</div>
						<div class="form-group ">
							{{ Form::label('representante2', 'Nombre del representante 2') }}
							{{ Form::text('representante2', null, array('class' => 'form-control')) }}
						</div>
						<div class="form-group {{ $errors->has('rol_rep_1') ? 'has-error': '' }}">
							{{ Form::label('rol_rep_1', 'Rol del representante 1') }}
							{{ Form::text('rol_rep_1', null, array('class' => 'form-control')) }}
						</div>
						<div class="form-group ">
							{{ Form::label('rol_rep_2', 'Rol del representante 2') }}
							{{ Form::text('rol_rep_2', null, array('class' => 'form-control')) }}
						</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-sm-4 col-md-4">
		<div class="box box-primary">
			<div class="box-body">
				<div class="form-group ">
					{{ Form::label('correo_rep_1', 'Correo del representante 1') }}
					{{ Form::text('correo_rep_1', null, array('class' => 'form-control')) }}
				</div>
				<div class="form-group ">
					{{ Form::label('correo_rep_2', 'Correo del representante 2') }}
					{{ Form::text('correo_rep_2', null, array('class' => 'form-control')) }}
				</div>
				<div class="form-group ">
					{{ Form::label('telefono_rep_1', 'Teléfono del representante 1') }}
					{{ Form::text('telefono_rep_1', null, array('class' => 'form-control')) }}
				</div>
				<div class="form-group ">
					{{ Form::label('telefono_rep_2', 'Teléfono del representante 2') }}
					{{ Form::text('telefono_rep_2', null, array('class' => 'form-control')) }}
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
								{{ Form::label('actapdf', 'Acta') }}
								<span class="help-block">Carga el documento en PDF de la plataforma municipal</span>
								<input type="file" name="actapdf" accept="application/pdf"/ class="BotonesUpload">
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<div class="box box-primary">
							<div class="box-body">
								<div class="form-group ">
									{{ Form::label('resolucionpdf', 'Resolución') }}
									<span class="help-block">Carga el documento en PDF de la plataforma municipal</span>
									<input type="file" name="resolucionpdf" accept="application/pdf" class="BotonesUpload">
								</div>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<div class="box box-primary">
						<div class="box-body">
							<div class="form-group">
								{{ Form::label('decretopdf', 'Decreto') }}
								<span class="help-block">Carga el documento en PDF de la plataforma municipal</span>
								<input type="file" name="decretopdf" accept="application/pdf" class="BotonesUpload">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		<div class="col-md-12">
			{{ Form::label('actualizar', 'Actualizar municipio') }}
			<span class="help-block">Dale clic a actualizar para guardar la información del municipio</span>
			{{ Form::submit('Actualizar', array('class' => 'btn btn-primary btn-block')) }}
		</div>
	<!-- </form> -->
	</div>
	{{ Form::close() }}
@endsection
@push('styles')
	<link rel="stylesheet" href="/adminlte/plugins/dropzone/css/dropzone.min.css">
	<link rel="stylesheet" href="/adminlte/css/ImputType.css">
@endpush
