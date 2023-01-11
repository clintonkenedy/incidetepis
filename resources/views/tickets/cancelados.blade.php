@extends('adminlte::page')

@section('title', 'Dispositivos Suspendidos')

@section('content_header')
    <center>
        <h1>Dispositivos No Funcionales</h1>
    </center>
@stop

@section('content')
    <div class="table-responsive">
        <table id="cancelados" class="table table-striped mt-2">
            <thead>

            <th>ID</th>
            <th>DNI</th>
            <th>CELULAR</th>
            <th>INCIDENCIA</th>
            <th>OFICINA</th>
            <th>ESTADO</th>
            <th>ACCIONES</th>
            </thead>
            <tbody>
            @foreach ($tickets as $ticket)
                <tr class="">
                    <td>{{$ticket->id}}</td>
                    <td>{{$ticket->persona->dni}}</td>
                    <td>{{$ticket->persona->celular}}</td>
                    <td>{{$ticket->incidencia}}</td>
                    <td>{{$ticket->oficina->nombre_oficina}}</td>
                    <td><h5><span class="badge bg-danger"> Suspendido </span></h5></td>
                    <td>
                        <a href="{{route('tickets.edit', $ticket->id)}}" class="btn btn-primary">Editar</a>
                        {{--<form action="{{route('tickets.destroy', $ticket->id)}}" method="post" style="display:inline">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger">Borrar</button>
                        </form>--}}
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
            $('#cancelados').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'print'
                ],
                "order": false,
            });
        });
    </script>
@stop






