@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>CANOVENTAS</title>
</head>
<body>
<div class="col-sm-offset-3 col-sm-6">
    <div class ="panel-title">
        <h1 style="color: #56838A">Articulo</h1>
    </div>
    <div class="panel-body">
        <form action="{{ url('articulos/create') }}" method="POST" role="form">
            <fieldset>
            {{ csrf_field() }}
            <div class="from-group">
                <label for=>Nombre</label>
                <input type="text" class="form-control" name="nombre">
            </div>
            <div class="from-group">
                <label for=>Precio</label>
                <input type="text" class="form-control" name="precio">
            </div>
            <div class="from-group">
                <label for=>Descripción</label>
                <input type="text" class="form-control" name="descripcion">
            </div>
            <div class="from-group">
                <label for=>Existencia</label>
                <input type="text" class="form-control" name="existencia">
            </div>
            <div class="from-group">
                <label for=>Precio de Venta</label>
                <input type="text" class="form-control" name="precioventa">
            </div>
             <div class="from-group">
                <label for=>Imagen</label>
                <input type="file" class="form-control" name="imagen">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus">Registrar articulo</i>
                </button>  
            </div>
        </fieldset>
        </form>  
    </div>
</div>
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Listado de Articulos</h3>
        </div>
    </div>
    <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Descripcion</th>
                    <th>Existencia</th>
                    <th>Precio Venta</th>
                    <th>Imagen</th>
                    <th>Accion</th>
                </thead>
               @foreach ($articulos as $art)
                <tr>
                    <td>{{ $art->id}}</td>
                    <td>{{ $art->nombre}}</td>
                    <td>{{ $art->precio}}</td>
                    <td>{{ $art->descripcion}}</td>
                    <td>{{ $art->existencia}}</td>
                    <td>{{ $art->precioVenta}}</td>
                    <td>
                        <img src="{{asset('imagenes/articulos/'.$art->imagen)}}" height="100px" width="100px">
                    </td>
                    <td>
                        <button type="submit" class="btn btn-info" onclick="location.href=''">Editar</button>
                        <form action="{{ url('articulos') }}/{{ $art->id }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>

                @endforeach
            </table>
        </div>
    </div>
    </div>
</body>
</html>
@endsection