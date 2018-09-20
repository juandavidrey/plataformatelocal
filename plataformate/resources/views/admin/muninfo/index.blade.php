@extends('admin.layout')

@section('header')
<h1>
	Información de municipios
	<small>Listado</small>
</h1>
<ol class="breadcrumb">
  <li><a href=" {{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
  <li class="active">Información de municipios</li>
</ol>
@endsection
@section('content')
<div class="box box-primary">
  <div class="box-header">
    <h3 class="box-title">Listado de municipios</h3>
    <!-- <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i>  Crear Grupo</button> -->
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="posta-table" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>MUNIICPIOS</th>
          <th>EDITAR</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($municipios as $municipio)
        <tr>
          <td>{{ $municipio->id }}</td>
          <td>{{ $municipio->name }}</td>
          <td>
            <a href="{{ route('admin.muninfo.edit', $municipio->id) }}" class="btn btn-xs btn-info">
              <i class="fa fa-pencil"></i>
            </a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
@endsection
@push('styles')
  <!-- DataTables -->
  <link rel="stylesheet" href="/adminlte/plugins/datatables/dataTables.bootstrap.css">

@endpush
@push('scripts')
	<!-- DataTables -->
	<script src="/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="/adminlte/plugins/datatables/dataTables.bootstrap.min.js"></script>

<!-- page script -->
<script>
  $(function () {
    $('#posta-table').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" arial-labelledby="myModalLabel">
  <form method="POST" action="{{ route('admin.posts.store') }}">
    {{ csrf_field() }}
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
        <h4 class="modal-title" id="myModalLabel">Agrega el nombre de tu grupo</h4>
      </div>
      <div class="modal-body">
        <div class="form-group {{ $errors->has('ngrupo') ? 'has-error': '' }}">
            {{-- <label>Nombre del grupo</label> --}}
            <input name="ngrupo"
              type="text"
              class="form-control"
              value="{{ old('ngrupo') }}"
              placeholder="Ingresa el nombre del grupo">
            {!! $errors->first('ngrupo', '<span class="help-block">:message</span>') !!}

          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button  class="btn btn-primary">Crear grupo</button>
      </div>
    </div>
  </div>
  </form>
</div>

@endpush
