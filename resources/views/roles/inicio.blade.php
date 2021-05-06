@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Listado Roles</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-2" >
                                <a href="{{ route('roles.create') }}" class="btn btn-primary btn-xs">
                                    <i class="fas fa-plus"></i> Nuevo Rol
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-sm table-bordered">
                                    <thead>
                                        <tr class="bg-secondary">
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Slug</th>
                                            <th>Estado</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($roles as $role)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $role->nombre }}</td>
                                            <td>{{ $role->slug }}</td>
                                            <td>
                                                @if($role->estado == 1)
                                                    <span class="badge badge-success">Activo</span>
                                                @else
                                                    <span class="badge badge-danger">Inactivo</span>
                                                @endif
                                            </td>
                                            <td>
                                                <form method="POST" action="{{route('roles.destroy',$role->id)}}">
                                                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning btn-sm"
                                                        title="Editar Rol">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    @if($role->estado==1)
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            title="Inhabilitar Rol">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    @else
                                                        <button type="submit" class="btn bg-info btn-sm"
                                                            title="Habilitar Rol">
                                                            <i class="fas fa-trash-restore-alt"></i>
                                                        </button>
                                                    @endif
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-danger text-center">
                                                -- Datos No Registrados --
                                            </td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
