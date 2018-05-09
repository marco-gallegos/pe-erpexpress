@extends('layouts.adminlte')

@section('content')
	<div class="row">
		<div class="col-xs-12">
			<form action="{{ url('reportes/articulosexistencia') }}" method="post" accept-charset="utf-8">
				<div class="form-group">
					<label>Cantidad minima</label>
					<input type="number" name="cantidad" value="" placeholder="" class="form-control">
				</div>
				{{ csrf_field() }}
				<button type="submmit">Gerar Reporte</button>
			</form>
		</div>	
	</div>
	@if (isset($articulos[0]))
		<div class="row">
			<div class="col-xs-12">
				<h2>Kardex Articulos</h2>
				<button type="button" onclick="window.print()"> Imprimir</button>
				<table class="table table-bordered" id="dataTable">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Descripcion</th>
							<th>Precio Venta</th>
							<th>Precio Compra</th>
							<th>Existencia</th>
							<th>Total existencia</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($articulos as $articulo)
							<tr>
								<td>{{ $articulo->nombre }}</td>
								<td>{{ $articulo->descripcion }}</td>
								<td>{{ $articulo->precioVenta }}</td>
								<td>{{ $articulo->precio }}</td>
								<td>{{ $articulo->existencia }}</td>
								<td>$ {{ $articulo->existencia * $articulo->precioVenta }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	@endif
@endsection