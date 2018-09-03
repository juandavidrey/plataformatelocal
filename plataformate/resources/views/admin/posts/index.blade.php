@extends('admin.layout')

@section('header')
	<h1>
        Grupos
        <small>Listado</small>
	</h1>
		<ol class="breadcrumb">
		<li><a href=" {{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
		<li class="active">Grupos</li>
	</ol>
@endsection
@section('content')
	<div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Listado de Grupos</h3>
              <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i>  Crear Grupo</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="posta-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>NOMBRE GRUPO</th>
                  <th>RESUMEN</th>
                  <th>ACCIONES</th>
                </tr>
                </thead>
                <tbody>
         			@foreach ($posts as $post)
					<tr>
         				<td>{{ $post->id }}</td>
         				<td>{{ $post->ngrupo }}</td>
         				<td>{{ $post->resumen }}</td>
         				<td>
                  <a href="{!! url('grupos', $post->url) !!}" 
                    class="btn btn-xs btn-default"
                    target="_blank" 
                    ><i class="fa fa-eye"></i>
                  </a>
         					<a href="{{ route('admin.posts.edit', $post) }}" 
                      class="btn btn-xs btn-info">
                    <i class="fa fa-pencil"></i>
                   </a>
                   <form method="POST" 
                        action="{{ route('admin.posts.destroy', $post) }}" 
                        style="display:inline;">
                      {{ csrf_field() }} {{ method_field('DELETE') }}
                      <button  class="btn btn-xs btn-danger"
                        onclick="return confirm('¿Estás seguro de querer eliminar este grupo?')"
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