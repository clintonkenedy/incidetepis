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
                                <label for="dni" class="form-label">
                                    Número de DNI:
                                    <span style="color: red;">*</span>
                                </label>
                                <input type="text" class="form-control" value="{{$ticket->persona->dni}}" name="dni">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="celular" class="form-label">
                                    Celular:
                                    <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" value="{{$ticket->persona->celular}}" name="celular">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="incidencia" class="form-label">
                                    Incidencia:
                                    <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" value="{{$ticket->incidencia}}" name="incidencia">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="oficina" class="form-label">
                                    Oficina:
                                    <span style="color: red;">*</span>
                                </label>
                                <input type="text" class="form-control" value="{{$ticket->oficina->nombre_oficina}}" name="oficina">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="estado" class="form-label">
                                    Estado:
                                    <span style="color: red;">*</span>
                                </label>
                                <select id="" class="form-control" name="estado">
                                    <option value="Pendiente">Pendiente</option>
                                    <option value="Cancelado">Cancelado</option>
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






