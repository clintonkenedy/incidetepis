@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <center>
        <h1>USUARIOS</h1>
    </center>
@stop

@section('content')
    <div class="table-responsive">
        <table id="pendientes" class="table table-striped mt-2">
            <thead>
            <th>NOMBRE</th>
            <th>EMAIL</th>
            <th>ROLES</th>
            <th>ACCIONES</th>
            </thead>
            <tbody>
            @foreach ($usuarios as $usuario)
                <tr class="">
                    <td>{{$usuario->name}}</td>
                    <td>{{$usuario->email}}</td>
                    <td>
                        @if(!empty($usuario->getRoleNames()))
                            @foreach($usuario->getRoleNames() as $rolName)
                                <h5><span class="badge bg-warning"> {{$rolName}} </span></h5></td>
                            @endforeach
                        @endif

                    <td>
                        <a href="{{route('usuarios.edit', $usuario->id)}}" class="btn btn-primary">Editar</a>
                        <form action="{{route('usuarios.destroy', $usuario->id)}}" method="post" style="display:inline">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger">Borrar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop

@section('css')
@stop

@section('js')
    <script>
        $(document).ready(function () {
            $('#pendientes').DataTable();
        });
    </script>
@stop
