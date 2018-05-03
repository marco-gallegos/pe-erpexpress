@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>ERPEXPRESS</title>
</head>
<body>
<div class="col-sm-offset-3 col-sm-6">
    <div class ="panel-title">
        <h1>Empleado</h1>
    </div>
    <div class="panel-body">
        <form action="{{ url('empleados') }}/{{ $empleados->RFC }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}

            <div class="from-group">
                <label for=>"RFC"</label>
                <input type="text" class="form-control" name="rfc" value="{{ $empleados->RFC }}">
            </div>
            <div class="from-group">
                <label for=>"Nombre"</label>
                <input type="text" class="form-control" name="nombre" value="{{ $empleados->nombre }}">
            </div>
            <div class="from-group">
                <label for=>"Apellidos"</label>
                <input type="text" class="form-control" name="apellidos" value="{{ $empleados->apellido }}">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Editar empleado
                </button>  
            </div>
        </form>   
    </div>
</div>
</body>
</html>
@endsection