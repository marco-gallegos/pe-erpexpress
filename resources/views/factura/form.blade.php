<?php
error_reporting(E_ALL ^ E_NOTICE);

for($i=1;$i<=$_POST['cantidad_lineas'];$i++)
{
	if($_POST['visible'.$i] == 1)
		$subtotal+=$_POST['valor'.$i];
}

if(!empty($_POST['agregar']))
{
	$_POST['cantidad_lineas'] = $_POST['cantidad_lineas']+1;
	$i = $_POST['cantidad_lineas'];
	$_POST['visible'.$i]=1; 
}

if(!empty($_POST['Eliminar']))
{
	$_POST['visible'.$_POST['Eliminar']]=0;
}

if(!empty($_POST['guardar']))
{
	$host="localhost";
  	$user="root";
  	$pass="";
  	$db="erpexpress_2";
  	$link= mysqli_connect($host,$user,$pass,$db);
  	if(!$link)
    	die("<br>Error: No se pudo conectar. ". mysqli_connect_error());
    $total = $subtotal * 1.5;
  	$sql="INSERT INTO factura VALUES ('".$_POST['Folio']."','".$_POST['CFDI']."',$total,$subtotal,'".$_POST['fecha']."','".$_POST['rfcEmpleado']."','".$_POST['rfcCliente']."','".$_POST['estado']."','".$_POST['pago_id']."')";
	mysqli_query($link,$sql);
	//echo $sql."<br>";
	for($i=1;$i<=$_POST['cantidad_lineas'];$i++)
	{
		if($_POST['visible'.$i] == 1)
		{
			$sql = "INSERT INTO detallefactura VALUES ('".$_POST['Folio']."','".$_POST['idArticulo'.$i]."','".$_POST['cantidad'.$i]."','".$_POST['idArticulo'.$i]."')";
			mysqli_query($link,$sql);
			//echo $sql."<br>";
		}
	}
	echo "Se han agregado los datos correctamente";
}
?>

<!DOCTYPE html>
<html lang ="es">
<head>
	<meta charset="utf-8"></meta>
	<meta name="viewport" content="width=divice-width,initial-scale=1,maximum-scale=1"></meta>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/></meta>
	<title>Factura</title>
	<link rel="stylesheet" href="css.css">
</head>
<body>
	<h1>Factura de Venta</h1>
	<form action="{{ url('factura') }}" method="POST">
		{{ csrf_field() }}
		<?php
			echo "<div class='formularios'>";
				echo "<table id='formulario'>";
					echo "<tr>";
						echo "<td align='left'>Folio</td>";
						echo "<td align='left'><input type='text' name='Folio' value='".$_POST['Folio']."'></td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td align='left'>CFDI</td>";
						echo "<td align='left'><input type='text' name='CFDI' value='".$_POST['CFDI']."'></td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td align='left'>Fecha</td>";
						echo "<td align='left'><input type='text' name='fecha' value='".$_POST['fecha']."'></td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td align='left'>RFC Empleado</td>";
						echo "<td align='left'><input type='text' name='rfcEmpleado' value='".$_POST['rfcEmpleado']."'></td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td align='left'>RFC Cliente</td>";
						echo "<td align='left'><input type='text' name='rfcCliente' value='".$_POST['rfcCliente']."'></td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td align='left'>Estado</td>";
						echo "<td align='left'><input type='text' name='estado' value='".$_POST['estado']."'></td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td align='left'>ID pago</td>";
						echo "<td align='left'><input type='text' name='pago_id' value='".$_POST['pago_id']."'></td>";
					echo "</tr>";
				echo "</table>";
			echo "</div>";

			echo "<br>";

			echo "<div class='formularios'>";
				echo "<table id='formulario' border='1'>";
					echo "<tr style='background-color:blue;color:white;'>";
						echo "<td align='center' width='20%'>idArticulo</td>";
						echo "<td align='center' width='20%'>cantidad</td>";
						echo "<td align='center' width='20%'>valor</td>";
						echo "<td align='center' width='20%'>Eliminar</td>";
					echo "</tr>";

					for($i=1;$i<=$_POST['cantidad_lineas'];$i++)
					{
						if($_POST['visible'.$i] == 1)
						{
							echo "<tr style='color:black;'>";
								echo "<td align='center'><input name='idArticulo".$i."' value='".$_POST['idArticulo'.$i]."'></td>";
								echo "<td align='center'><input name='cantidad".$i."' value='".$_POST['cantidad'.$i]."'></td>";
								echo "<td align='center'><input name='valor".$i."' value='".$_POST['valor'.$i]."'></td>";
								echo "<td align='center'><button name='Eliminar' value='".$i."'>Eliminar</button></td>";
							echo "</tr>";
						}

						echo "<input type='hidden' name='visible".$i."'value='".$_POST['visible'.$i]."'>";
					}

					echo "<tr style='background-color:blue;color:white;'>";
						echo "<td align='center'></td>";
						echo "<td align='right'>Subtotal: </td>";
						echo "<td align='right'>".$subtotal."</td>";
						echo "<td align='center'></td>";
					echo "</tr>";
				echo "</table>";

			echo "<br><br>";
			echo "<button name='agregar' value='agregar'>Agregar linea</button>";
			echo "</div>";

			echo "<div style='margin:0 auto; text-align:center;width:400px;'>";
			echo "<button name='guardar' value='guardar'>Guardar registros</button>";
			echo "</div>";

			echo "<input type='hidden' name='cantidad_lineas' value='".$_POST['cantidad_lineas']."'>";
		?>
	</form>
</body>
</html>