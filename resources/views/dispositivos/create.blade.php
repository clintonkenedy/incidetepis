@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<center>
    <h1>CREAR DISPOSITIVO</h1>
</center>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 mt-4">
                <div class="card border-dark">
                    <h4 class="card-header border-dark">NUEVO DISPOSITIVO</h4>
                    <div class="card-body">
                        <form action="{{route('dispositivos.store')}}" method="post">
                            {{--@method('POST')--}}
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="codpatri" class="form-label">
                                    Codigo Patrimonial
                                <span style="color: red;">*</span>
                                </label>
                                <input type="text" class="form-control" name="codpatri">
                                @error('codpatri')
                                <span class="invalid-feedback">
                                    <strong> {{$message}} </strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="descripcion" class="form-label">
                                    Descripción:
                                <span style="color: red;">*</span></label>
                                </label>
                                <input type="text" class="form-control" name="descripcion">
                                @error('descripcion')
                                <span class="invalid-feedback">
                                    <strong> {{$message}} </strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="modelo" class="form-label">
                                    Modelo:
                                <span style="color: red;">*</span></label>
                                </label>
                                <input type="text" class="form-control" name="modelo">
                                @error('modelo')
                                <span class="invalid-feedback">
                                    <strong> {{$message}} </strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="marca" class="form-label">
                                    Marca:
                                <span style="color: red;">*</span></label>
                                </label>
                                <input type="text" class="form-control" name="marca">
                                @error('marca')
                                <span class="invalid-feedback">
                                    <strong> {{$message}} </strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="serie" class="form-label">
                                    Serie:
                                <span style="color: red;">*</span></label>
                                </label>
                                <input type="text" class="form-control" name="serie">
                                @error('serie')
                                <span class="invalid-feedback">
                                    <strong> {{$message}} </strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="color" class="form-label">
                                    Color:
                                <span style="color: red;">*</span></label>
                                </label>
                                <input type="text" class="form-control" name="color">
                                @error('color')
                                <span class="invalid-feedback">
                                    <strong> {{$message}} </strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="estado" class="form-label">
                                    Estado:
                                    <span style="color: red;">*</span>
                                </label>
                                <select name="estado" id="" class="form-control">
                                    <option value="Incidencia" selected>Incidencia</option>
                                    <option value="Funcional">Funcional</option>
                                    <option value="Suspendido">Suspendido</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="condicion" class="form-label">
                                    Condición:
                                    <span style="color: red;">*</span>
                                </label>
                                <select name="condicion" id="" class="form-control">
                                    <option value="Nuevo" selected>Nuevo</option>
                                    <option value="Regular">Regular</option>
                                    <option value="Malo">Malo</option>
                                    <option value="Chatarra">Chatarra</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="posicion" class="form-label">
                                    Posición:
                                <span style="color: red;">*</span></label>
                                </label>
                                <input type="text" class="form-control" name="posicion">
                                @error('posicion')
                                <span class="invalid-feedback">
                                    <strong> {{$message}} </strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="observacion" class="form-label">
                                    Observación:
                                <span style="color: red;">*</span></label>
                                </label>
                                <input type="text" class="form-control" name="observacion">
                                @error('observacion')
                                <span class="invalid-feedback">
                                    <strong> {{$message}} </strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="id_ofici" class="form-label">
                                    Ambiente:
                                    <span style="color: red;">*</span>
                                </label>
                                <select name="id_ofici" id="" class="form-control">
                                    <option value="1" selected>LABORATORIO1</option>
                                    <option value="2" >LABORATORIO2</option>
                                    <option value="3" >LABORATORIO3</option>
                                    <option value="4" >LABORATORIO4</option>
                                    <option value="5" >LABORATORIO5</option>
                                    <option value="6" >LABORATORIO6</option>
                                    <option value="7" >LABORATORIO7</option>
                                </select>
                            </div>  
                        </div>
                        <center>
                            <button type="submit" class="btn btn-primary">Crear</button>
                            <a href="../dispositivos" class="btn btn-danger">Cancelar</a>
                        </center>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop







