@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <center>
        <h1>ROLES</h1>
    </center>
@stop

@section('content')
    <div class="table-responsive">
        <table id="pendientes" class="table table-striped mt-2">
            <thead>
            <th>NOMBRE</th>
            <th>PERMISOS</th>
            <th>ACCIONES</th>
            </thead>
            <tbody>
            @foreach ($roles as $rol)
                <tr class="">
                    <td>{{$rol->name}}</td>
                    {{--<td>{{$usuario->email}}</td>--}}
                    <td><h5><span class="badge bg-warning"> {{$rol}} </span></h5></td>
                    <td>
                        <a href="{{route('roles.edit', $rol->id)}}" class="btn btn-primary">Editar</a>
                        <form action="{{route('roles.destroy', $rol->id)}}" method="post" style="display:inline">
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
