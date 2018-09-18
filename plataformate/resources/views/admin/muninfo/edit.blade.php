	@extends('admin.layout')

@section('header')
	<h1>
       Grupos
        <small>Información de los municipios</small>
	</h1>
		<ol class="breadcrumb">
			<li><a href=" {{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
			<li><a href=" {{ route('admin.muninfo.index') }}"><i class="fa fa-list"></i>Información de municipios</a></li>
		<li class="active">crear</li>
	</ol>
@endsection
@section('content')

	{{"aca iria el formulario para los 2 representantes y los 3 pdf"}}
	<form method="POST" action="{{ route('admin.muninfo.update', $municipios) }}" enctype="multipart/form-data">
	{{ method_field('put') }}
	{{ csrf_field() }}
	<p>
		<label for="actapdf">
			<input type="file" name="actapdf" accept="application/pdf"/>
			<input type="text" name="texto"/>
		<label>
	</p>
	<div class="form-group">
		<button type="submit" class="btn btn-primary btn-block">Subir pdf</button>
	</div>
</form>
@endsection
@push('styles')
	<link rel="stylesheet" href="/adminlte/plugins/dropzone/css/dropzone.min.css">
@endpush
