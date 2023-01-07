@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<center>
    <h1>EDITAR DISPOSITIVO</h1>
</center>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 mt-4">
                <div class="card border-dark">
                    <h4 class="card-header border-dark">DISPOSITIVO</h4>
                    <div class="card-body">
                        {{-- {!! Form::open(array('route'=>['oficina.update', $oficina],'method'=>'POST','class'=>'mt-2')) !!} --}}
                        <form action="{{route('dispositivos.update', $dispositivos)}}" method="post">
                        @method('PUT')
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="dispositivo" class="form-label">
                                    Codigo Patrimonial
                                <span style="color: red;">*</span>
                                </label>
                                {{-- {!! Form::text('oficina',$oficina->nombre_oficina,array('class'=>'form-control '.($errors->has('oficina') ? 'is-invalid':''))) !!} --}}
                                <input type="text" value="{{$dispositivos->codpatrominal}}" class="form-control" name="Codpatrimonial">
                                @error('dispositivo')
                                <span class="invalid-feedback">
                                    <strong> {{$message}} </strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="dispositivo" class="form-label">
                                    Descripción
                                <span style="color: red;">*</span>
                                </label>
                                {{-- {!! Form::text('oficina',$oficina->nombre_oficina,array('class'=>'form-control '.($errors->has('oficina') ? 'is-invalid':''))) !!} --}}
                                <input type="text" value="{{$dispositivos->descripcion}}" class="form-control" name="Descripción">
                                @error('dispositivo')
                                <span class="invalid-feedback">
                                    <strong> {{$message}} </strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="dispositivo" class="form-label">
                                    Modelo
                                <span style="color: red;">*</span>
                                </label>
                                {{-- {!! Form::text('oficina',$oficina->nombre_oficina,array('class'=>'form-control '.($errors->has('oficina') ? 'is-invalid':''))) !!} --}}
                                <input type="text" value="{{$dispositivos->modelo}}" class="form-control" name="Modelo">
                                @error('dispositivo')
                                <span class="invalid-feedback">
                                    <strong> {{$message}} </strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="dispositivo" class="form-label">
                                    Marca
                                <span style="color: red;">*</span>
                                </label>
                                {{-- {!! Form::text('oficina',$oficina->nombre_oficina,array('class'=>'form-control '.($errors->has('oficina') ? 'is-invalid':''))) !!} --}}
                                <input type="text" value="{{$dispositivos->marca}}" class="form-control" name="Marca">
                                @error('dispositivo')
                                <span class="invalid-feedback">
                                    <strong> {{$message}} </strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="dispositivo" class="form-label">
                                    Serie
                                <span style="color: red;">*</span>
                                </label>
                                {{-- {!! Form::text('oficina',$oficina->nombre_oficina,array('class'=>'form-control '.($errors->has('oficina') ? 'is-invalid':''))) !!} --}}
                                <input type="text" value="{{$dispositivos->serie}}" class="form-control" name="Serie">
                                @error('dispositivo')
                                <span class="invalid-feedback">
                                    <strong> {{$message}} </strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="dispositivo" class="form-label">
                                    Color
                                <span style="color: red;">*</span>
                                </label>
                                {{-- {!! Form::text('oficina',$oficina->nombre_oficina,array('class'=>'form-control '.($errors->has('oficina') ? 'is-invalid':''))) !!} --}}
                                <input type="text" value="{{$dispositivos->color}}" class="form-control" name="Color">
                                @error('dispositivo')
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
                                {{-- {{Form::select('estado', ['0' => 'Activo', '1' => 'Inactivo'], $oficina->estado, ['class'=>'form-select']);}} --}}
                                <select name="Estado" id="" class="form-control">
                                    @if ($dispositivos->estado == "Incidencia")
                                        <option value="Incidencia" selected>Incidencia</option>
                                        <option value="Funcional" >Funcional</option>
                                        <option value="Suspendido" >Suspendido</option>
                                    @elseif($dispositivos->estado == "Funcional")
                                        <option value="Funcional" selected>Funcional</option>
                                        <option value="Incidencia" >Incidencia</option>
                                        <option value="Suspendido" >Suspendido</option>
                                    @else
                                        <option value="Suspendido" selected>Suspendido</option>
                                        <option value="Incidencia" >Incidencia</option>
                                        <option value="Funcional" >Funcional</option>
                                    @endif

                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="estado" class="form-label">
                                    Condicion:
                                <span style="color: red;">*</span>
                                </label>
                                {{-- {{Form::select('estado', ['0' => 'Activo', '1' => 'Inactivo'], $oficina->estado, ['class'=>'form-select']);}} --}}
                                <select name="Condicion" id="" class="form-control">
                                    @if ($dispositivos->condicion == "Nuevo")
                                        <option value="Nuevo" selected>Nuevo</option>
                                        <option value="Regular" >Regular</option>
                                        <option value="Malo" >Malo</option>
                                        <option value="Chatarra" >Chatarra</option>
                                    @elseif($dispositivos->condicion == "Regular")
                                        <option value="Regular" selected>Regular</option>
                                        <option value="Nuevo" >Nuevo</option>
                                        <option value="Malo" >Malo</option>
                                        <option value="Chatarra" >Chatarra</option>
                                    @elseif($dispositivos->condicion == "Malo")
                                        <option value="Malo" selected>Malo</option>
                                        <option value="Regular" >Regular</option>
                                        <option value="Nuevo" >Nuevo</option>
                                        <option value="Chatarra" >Chatarra</option>
                                    @else
                                        <option value="Chatarra"selected >Chatarra</option>
                                        <option value="Malo" >Malo</option>
                                        <option value="Regular" >Regular</option>
                                        <option value="Nuevo" >Nuevo</option>
                                    @endif

                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="dispositivo" class="form-label">
                                    Posición
                                <span style="color: red;">*</span>
                                </label>
                                {{-- {!! Form::text('oficina',$oficina->nombre_oficina,array('class'=>'form-control '.($errors->has('oficina') ? 'is-invalid':''))) !!} --}}
                                <input type="text" value="{{$dispositivos->posicion}}" class="form-control" name="Posicion">
                                @error('dispositivo')
                                <span class="invalid-feedback">
                                    <strong> {{$message}} </strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="dispositivo" class="form-label">
                                    Observación
                                <span style="color: red;">*</span>
                                </label>
                                {{-- {!! Form::text('oficina',$oficina->nombre_oficina,array('class'=>'form-control '.($errors->has('oficina') ? 'is-invalid':''))) !!} --}}
                                <input type="text" value="{{$dispositivos->observacion}}" class="form-control" name="Observacion">
                                @error('dispositivo')
                                <span class="invalid-feedback">
                                    <strong> {{$message}} </strong>
                                </span>
                                @enderror
                            </div>
                        
                            <div class="col-md-6 mb-3">
                                <label for="estado" class="form-label">
                                    Ambiente:
                                <span style="color: red;">*</span>
                                </label>
                                {{-- {{Form::select('estado', ['0' => 'Activo', '1' => 'Inactivo'], $oficina->estado, ['class'=>'form-select']);}} --}}
                                <select name="Ambiente" id="" class="form-control">
                                    @if ($dispositivos->oficina_id == "1")
                                        <option value="1" selected>LABORATORIO1</option>
                                        <option value="2" >LABORATORIO2</option>
                                        <option value="3" >LABORATORIO3</option>
                                        <option value="4" >LABORATORIO4</option>
                                        <option value="5" >LABORATORIO5</option>
                                        <option value="6" >LABORATORIO6</option>
                                        <option value="7" >LABORATORIO7</option>
                                    @elseif($dispositivos->oficina_id == "2")
                                        <option value="1" >LABORATORIO1</option>
                                        <option value="2" selected>LABORATORIO2</option>
                                        <option value="3" >LABORATORIO3</option>
                                        <option value="4" >LABORATORIO4</option>
                                        <option value="5" >LABORATORIO5</option>
                                        <option value="6" >LABORATORIO6</option>
                                        <option value="7" >LABORATORIO7</option>
                                    @elseif($dispositivos->oficina_id == "3")
                                        <option value="1" >LABORATORIO1</option>
                                        <option value="2" >LABORATORIO2</option>
                                        <option value="3" selected>LABORATORIO3</option>
                                        <option value="4" >LABORATORIO4</option>
                                        <option value="5" >LABORATORIO5</option>
                                        <option value="6" >LABORATORIO6</option>
                                        <option value="7" >LABORATORIO7</option>
                                    @elseif($dispositivos->oficina_id == "4")
                                        <option value="1" >LABORATORIO1</option>
                                        <option value="2" >LABORATORIO2</option>
                                        <option value="3" >LABORATORIO3</option>
                                        <option value="4" selected>LABORATORIO4</option>
                                        <option value="5" >LABORATORIO5</option>
                                        <option value="6" >LABORATORIO6</option>
                                        <option value="7" >LABORATORIO7</option>
                                    @elseif($dispositivos->oficina_id == "5")
                                        <option value="1" >LABORATORIO1</option>
                                        <option value="2" >LABORATORIO2</option>
                                        <option value="3" >LABORATORIO3</option>
                                        <option value="4" >LABORATORIO4</option>
                                        <option value="5" selected>LABORATORIO5</option>
                                        <option value="6" >LABORATORIO6</option>
                                        <option value="7" >LABORATORIO7</option>
                                    @elseif($dispositivos->oficina_id == "6")
                                        <option value="1" >LABORATORIO1</option>
                                        <option value="2" >LABORATORIO2</option>
                                        <option value="3" >LABORATORIO3</option>
                                        <option value="4" >LABORATORIO4</option>
                                        <option value="5" >LABORATORIO5</option>
                                        <option value="6" selected>LABORATORIO6</option>
                                        <option value="7" >LABORATORIO7</option>
                                    @else
                                        <option value="1" >LABORATORIO1</option>
                                        <option value="2" >LABORATORIO2</option>
                                        <option value="3" >LABORATORIO3</option>
                                        <option value="4" >LABORATORIO4</option>
                                        <option value="5" >LABORATORIO5</option>
                                        <option value="6" >LABORATORIO6</option>
                                        <option value="7" selected>LABORATORIO7</option>
                                    @endif

                                </select>
                            </div>

                        </div>
                        <center>
                            <button href="" class="btn btn-primary">Confirmar</button>
                            <a href="../" class="btn btn-danger">Cancelar</a>
                        </center>
                        {{-- {!! Form::close() !!} --}}
                        </form>
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

@section('js')
    {{-- <script> console.log('Hi!'); </script> --}}
@stop






