@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<center>
    <h1>EDITAR OFICINA</h1>
</center>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 mt-4">
                <div class="card border-dark">
                    <h4 class="card-header border-dark">EDITAR RESERVA</h4>
                    <div class="card-body">
                        {{-- {!! Form::open(array('route'=>['oficina.update', $oficina],'method'=>'POST','class'=>'mt-2')) !!} --}}
                        <form action="{{route('oficinas.update', $oficina)}}" method="post">
                        @method('PUT')
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="oficina" class="form-label">
                                    Nombre de la Oficina
                                <span style="color: red;">*</span>
                                </label>
                                {{-- {!! Form::text('oficina',$oficina->nombre_oficina,array('class'=>'form-control '.($errors->has('oficina') ? 'is-invalid':''))) !!} --}}
                                <input type="text" value="{{$oficina->nombre_oficina}}" class="form-control" name="oficina">
                                @error('oficina')
                            <span class="invalid-feedback">
                                <strong> {{$message}} </strong>
                            </span>
                            @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="apellido_materno" class="form-label">
                                    Contraseña:
                                    <span style="color: red;">*</span></label>
                                {{-- {!! Form::text('pass',$oficina->password,array('class'=>'form-control '.($errors->has('fecha') ? 'is-invalid':''))) !!} --}}
                                <input type="text" value="{{$oficina->password}}" class="form-control" name="pass">
                                @error('fecha')
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
                                <select name="estado" id="" class="form-control">
                                    @if ($oficina->estado == "0")
                                    <option value="0" selected>Activo</option>
                                    <option value="1" >Inactivo</option>
                                    @else
                                    <option value="0" >Activo</option>
                                    <option value="1" selected>Inactivo</option>
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


