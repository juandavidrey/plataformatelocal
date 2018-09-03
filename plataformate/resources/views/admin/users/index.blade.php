@extends('admin.layout')

@section('header')
	<h1>
        Usuarios
        <small>Listado</small>
	</h1>
		<ol class="breadcrumb">
		<li><a href=" {{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
		<li class="active">Usuarios</li>
	</ol>
@endsection
@section('content')
	<div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Listado de Usuarios</h3>
              <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i>  Crear Usuario</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="users-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>NOMBRE</th>
                  <th>EMAIL</th>
                  <th>ROLES</th>
                  <th>ACCIONES</th>
                </tr>
                </thead>
                <tbody>
         			@foreach ($users as $user)
					<tr>
         				<td>{{ $user->id }}</td>
         				<td>{{ $user->name }}</td>
         				<td>{{ $user->email }}</td>
                         <td>{{ $user->getRoleNames()->implode(', ') }}</td>
         				<td>
                  <a href="{{ route('admin.users.show', $user) }}" 
                    class="btn btn-xs btn-default" 
                    ><i class="fa fa-eye"></i>
                  </a>
         					<a href="{{ route('admin.users.edit', $user) }}" 
                      class="btn btn-xs btn-info">
                    <i class="fa fa-pencil"></i>
                   </a>
                   <form method="user" 
                        action="{{ route('admin.users.destroy', $user) }}" 
                        style="display:inline;">
                      {{ csrf_field() }} {{ method_field('DELETE') }}
                      <button  class="btn btn-xs btn-danger"
                        onclick="return confirm('¿Estás seguro de querer eliminar este usuario?')"
                      ><i class="fa fa-times"></i></button>
                   </form>
         					
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
    $('#usera-table').DataTable({
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
  <form method="user" action="{{ route('admin.users.store') }}">
    {{ csrf_field() }}
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
        <h4 class="modal-title" id="myModalLabel">Agrega el nombre del usuario</h4>
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
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button  class="btn btn-primary">Crear grupo</button>
      </div>
    </div>    
  </div>
  </form>
</div>

@endpush