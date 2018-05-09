@extends('layouts.adminlte')

@section('content')
	<div class="row">
		<div class="col-xs-12">
			<h2>Datos Factura Compra</h2>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Numero</th>
						<th>Proveedor Factura</th>
						<th>Total</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>{{ $facturacompra->Folio }}</td>
						<td>{{ $facturacompra->rfcProveedor }}</td>
						<td>{{ $facturacompra->total }}</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12">
			<h2>Articulos En Factura</h2>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Descripcion</th>
						<th>Precio</th>
						<th>Cantidad</th>
						<th>Precio</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($detalles as $detalle)
						<tr>
							<td>{{ $detalle->articulo->nombre }}</td>
							<td>{{ $detalle->articulo->descripcion }}</td>
							<td>{{ $detalle->precio }}</td>
							<td>{{ $detalle->cantidad }}</td>
							<td>{{ $detalle->cantidad * $detalle->precio }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12">
			<form action='{{ url("facturaCompraDetallestore/{$facturacompra->Folio}") }}' method="post" accept-charset="utf-8" name="">
				<table id="dataTable">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Descripcion</th>
							<th>Precio</th>
							<th>Seleccionar</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($productos as $producto)
								<tr>
									<td>{{ $producto->nombre }}</td>
									<td>{{ $producto->descripcion }}</td>
									<td>{{ $producto->precio }}</td>
									<td><input type="radio" name="articulo" value="{{ $producto->id }}" placeholder=""></td>
								</tr>
						@endforeach
					</tbody>
				</table>
				<div class="form-group">
					<div class="col-xs-12">
						<label>Cantidad a facturar</label>
						<input type="number" name="cantidad" value="1" placeholder="" min="1" max="30" class="form-control" required="true">
					</div>
				</div>
				{{ csrf_field() }}
				<button type="submit" class="btn btn-success form-control">Añadir</button>
			</form>
		</div>
	</div>
@endsection