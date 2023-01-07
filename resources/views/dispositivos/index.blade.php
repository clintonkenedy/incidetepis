@extends('adminlte::page')

@section('title', 'Dispositivos')

@section('content_header')
<center>
    <h1>DISPOSITIVOS</h1>
</center>
@stop

@section('content')
<<<<<<< HEAD
    {{-- <a href=" {{ route('dispositvos.create') }} " class="btn btn-success mb-3">NUEVA OFICINA</a> --}}
    <table id="dispositivos" class="table table-striped mt-2">
        <thead>
            <th>Cod PATRIMONIAL</th>    
=======
    {{-- <a href=" {{ route('oficinas.create') }} " class="btn btn-success mb-3">NUEVA OFICINA</a> --}}
    <div class="table-responsive">
        <table id="dispositivos" class="table table-striped mt-2">
            <thead>
            <th>Cod PATRIMONIAL</th>
>>>>>>> e8c96dccfabe104a9ed7d4167fd931443fc4c30e
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
                        <td><span class="badge bg-success" > Incidencia </span></td>
                    @elseif ($dispositivo->estado==="Funcional")
                        <td><span class="badge bg-warning" > Funcional</span></td>
                    @else
                        <td><span class="badge bg-warning" > Suspendido </span></td>
                    @endif
                    @if ($dispositivo->condicion==="Nuevo")
                        <td><span class="badge bg-success" > Nuevo </span></td>
                    @elseif ($dispositivo->condicion==="Regular")
                        <td><span class="badge bg-warning" > Regular </span></td>
                    @elseif ($dispositivo->condicion==="Malo")
                        <td><span class="badge bg-warning" > Malo </span></td>
                    @else
                        <td><span class="badge bg-warning" > Chatarra</span></td>
                    @endif
                    <td> {{$dispositivo->posicion}} </td>
                    <td> {{$dispositivo->observacion}} </td>

                    @if ($dispositivo->oficina_id==="1")
                        <td><span class="badge bg-success" > LABORATORIO1 </span></td>
                    @elseif ($dispositivo->condicion==="2")
                        <td><span class="badge bg-warning" > LABORATORIO2 </span></td>
                    @elseif ($dispositivo->condicion==="3")
                        <td><span class="badge bg-warning" > LABORATORIO3 </span></td>
                    @elseif ($dispositivo->condicion==="4")
                        <td><span class="badge bg-warning" > LABORATORIO4 </span></td>
                    @elseif ($dispositivo->condicion==="5")
                        <td><span class="badge bg-warning" > LABORATORIO5 </span></td>
                    @elseif ($dispositivo->condicion==="6")
                        <td><span class="badge bg-warning" > LABORATORIO6 </span></td>
                    @else
                        <td><span class="badge bg-warning" > LABORATORIO7</span></td>
                    @endif

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
