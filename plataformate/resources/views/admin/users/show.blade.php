@extends('admin.layout')

@section('content')
<div class="row">
<div class="col-md-4">
    <div class="box box-primary">
        <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="/adminlte/img/user4-128x128.jpg" alt="{{ $user->name }}">

            <h3 class="profile-username text-center">{{ $user->name }}</h3>

            <p class="text-muted text-center">{{ $user->getRoleNames()->implode(', ') }}</p>

            <ul class="list-group list-group-unbordered">
            <li class="list-group-item">
                <b>Email</b> <a class="pull-right">{{ $user->email }}</a>
            </li>           
            
            </ul>

            <a href="#" class="btn btn-primary btn-block"><b>Editar</b></a>
        </div>
        <!-- /.box-body -->
    </div>
</div>
<div class="col-md-4">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Roles</h3>
        </div>
        <div class="box-body">
            @foreach ($user->roles as $role )
                <strong>{{ $role->name }}</strong>
                @if ( $role->permissions->count() )
                    <br>
                    <small class="text-muted">
                        Permisos: {{ $role->permissions->pluck('name')->implode(', ') }}
                    </small>
                @endif
                @unless ($loop->last)
                    <hr>
                @endunless
            @endforeach
        </div>
    </div>
</div>
<div class="col-md-3">Permisos adicionales</div>
</div>

@endsection