@extends('adminlte::page')

@section('title', 'Dispositivos')

@section('content_header')
<center>
    <h1>DISPOSITIVOS</h1>
</center>
@stop

@section('content')
    <a href=" {{ route('dispositivos.create') }} " class="btn btn-success mb-3">NUEVO DISPOSITIVO</a>
    <div class="table-responsive">
        <table id="dispositivos" class="table table-striped mt-2">
            <thead>
            <th>Cod PATRIMONIAL</th>
            <th>DESCRIPCIÓN</th>
            <th>MODELO</th>
            <th>MARCA</th>
            <th>SERIE</th>
            <th>COLOR</th>
            <th>ESTADO</th>
            <th>CONDICIÓN</th>
            <th>POSICIÓN</th>
            <th>OBSERVACIÓN</th>
            <th>AMBIENTE</th>
            <th>ACCIONES</th>
            </thead>
            <tbody>
            @foreach ($dispositivos as $dispositivo)
                <tr class="">
                    <td> {{$dispositivo->codpatrominal}} </td>
                    <td> {{$dispositivo->descripcion}} </td>
                    <td> {{$dispositivo->modelo}} </td>
                    <td> {{$dispositivo->marca}} </td>
                    <td> {{$dispositivo->serie}} </td>
                    <td> {{$dispositivo->color}} </td>
                    @if ($dispositivo->estado==="Incidencia")
                        <td><span class="badge bg-warning" > Incidencia </span></td>
                    @elseif ($dispositivo->estado==="Funcional")
                        <td><span class="badge bg-success" > Funcional</span></td>
                    @elseif ($dispositivo->estado==="Suspendido")
                        <td><span class="badge bg-danger" > Suspendido </span></td>
                    @else 
                        <td><span class="badge bg-dark" > Inactivo </span></td>
                    @endif
                    @if ($dispositivo->condicion==="Nuevo")
                        <td><span class="badge bg-success" > Nuevo </span></td>
                    @elseif ($dispositivo->condicion==="Regular")
                        <td><span class="badge bg-warning" > Regular </span></td>
                    @elseif ($dispositivo->condicion==="Malo")
                        <td><span class="badge bg-danger" > Malo </span></td>
                    @else
                        <td><span class="badge bg-danger" > Chatarra</span></td>
                    @endif
                    <td> {{$dispositivo->posicion}} </td>
                    <td> {{$dispositivo->observacion}} </td>

                        <td><span class="badge bg-success" > LABORATORIO {{$dispositivo->oficina_id}} </span></td>

                    <td>
                        <a href=" {{ route('dispositivos.edit', $dispositivo) }} " class="btn btn-primary">Editar</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@stop

@section('css')
    <link href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap4.min.css" rel="stylesheet"></link>
@stop

@section('js')
    <script>
        $(document).ready(function () {
            $('#dispositivos').DataTable();
        });
        $('#dispositivos').DataTable({
            responsive: true,
            autoWidth: false,
        });
    </script>
@stop
