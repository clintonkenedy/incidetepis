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
                    <h4 class="card-header border-dark bg bg-primary">EDITAR ROL</h4>
                    <div class="card-body">
                        {{--                        {!! Form::open(array('route'=>['teatro.update', $evento],'method'=>'POST','class'=>'mt-2')) !!}--}}
                        {{--                        @method('PUT')--}}
                        <form action="{{route('usuarios.update', $usuario)}}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="dni" class="form-label">
                                        Nombre:
                                        <span style="color: red;">*</span>
                                    </label>
                                    <input type="text" class="form-control" value="{{$usuario->name}}" name="nombre">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="celular" class="form-label">
                                        Email:
                                        <span style="color: red;">*</span></label>
                                    <input type="text" class="form-control" value="{{$usuario->email}}" name="email">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="estado" class="form-label">
                                        Rol:
                                        <span style="color: red;">*</span>
                                    </label>
                                    <select id="" class="form-control" name="rol">
                                    @foreach($roles as $rol)
                                        <option value="{{$rol->name}}">{{$rol->name}}</option>

                                    @endforeach
                                    </select>
                                </div>
                                {{--<div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" value="hola1"  name="permisos[]">
                                        </div>
                                    </div>
                                    <input type="text"  class="form-control" aria-label="Text input with checkbox" value="hola" disabled>

                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="checkbox" value="hola2"  name="permisos[]">
                                        </div>
                                    </div>
                                    <input type="text"  class="form-control" aria-label="Text input with checkbox" value="hola" disabled>

                                </div>--}}
                                {{--<div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Permisos para este Rol:</label>
                                        <br/>
                                        @foreach($permisos as $permiso)
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <input type="checkbox" value="{{$permiso->id}}" {{in_array($permiso->id, $rolePermissions)?'checked':''}}  name="permisos[]">
                                                    </div>
                                                </div>
                                                <input type="text"  class="form-control" aria-label="Text input with checkbox" value="{{$permiso->name}}" disabled>

                                            </div>--}}{{--
                                            <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                                {{ $value->name }}</label>
                                            <br/>--}}{{--
                                        @endforeach
                                    </div>
                                </div>--}}

                                {{-- <div class="col-md-6 mb-3">
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
                                 </div>--}}

                            </div>
                            <center>
                                <a href="../" class="btn btn-danger">Cancelar</a>
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






