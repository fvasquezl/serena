@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <a class="btn btn-primary btn-sm float-right" href="{{ route('admin.roles.create') }}">
        <i class="fa fa-plus"></i>&nbsp; Nuevo Rol
    </a>
    <h1>Listado de Roles</h1>
@stop

@section('content')
    @include('admin.partials.success')

    <div class='card'>

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th colspan=2></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($roles as $role )
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td width="100px">
                                <a href="{{ route('admin.roles.edit', $role) }}" class="btn btn-secondary btn-sm"><i
                                        class="fas fa-edit"></i></a>

                                <form action="{{ route('admin.roles.destroy', $role) }}" method="POST"
                                    style="display:inline">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger btn-sm" type='submit'><i
                                            class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No hay ningun role registrado</td>
                        </tr>
                    @endforelse

                </tbody>

            </table>
        </div>
    </div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop
