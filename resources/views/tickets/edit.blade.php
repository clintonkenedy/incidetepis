@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <center>
        <h1>TICKETS</h1>
    </center>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 mt-4">
                <div class="card border-dark">
                    <h4 class="card-header border-dark bg bg-primary">EDITAR TICKET</h4>
                    <div class="card-body">
{{--                        {!! Form::open(array('route'=>['teatro.update', $evento],'method'=>'POST','class'=>'mt-2')) !!}--}}
{{--                        @method('PUT')--}}
                        <form action="{{route('tickets.update', $ticket)}}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="evento" class="form-label">
                                    Némero de DNI:
                                    <span style="color: red;">*</span>
                                </label>
                                <input type="text" class="form-control" value="{{$ticket->persona->dni}}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="apellido_materno" class="form-label">
                                    Celular:
                                    <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" value="{{$ticket->persona->celular}}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="nombre" class="form-label">
                                    Incidencia:
                                    <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" value="{{$ticket->incidencia}}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="dni" class="form-label">
                                    Oficina:
                                    <span style="color: red;">*</span>
                                </label>
                                <input type="text" class="form-control" value="{{$ticket->oficina->nombre_oficina}}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="estado" class="form-label">
                                    Estado:
                                    <span style="color: red;">*</span>
                                </label>
                                <select name="" id="" class="form-control">
                                    <option value="Pendiente">Pendiente</option>
                                    <option value="Anulado">Anulado</option>
                                    <option value="Solucionado">Solucionado</option>
                                </select>
                            </div>

                        </div>
                        <center>
                            <a href="../pendientes" class="btn btn-danger">Cancelar</a>
                            <button class="btn btn-primary">Confirmar</button>
                        </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@stop

@section('css')
@stop

@section('js')
    {{-- <script> console.log('Hi!'); </script> --}}
@stop






