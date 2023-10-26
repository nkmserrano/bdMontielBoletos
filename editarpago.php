<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: iniciarsesion.php');
}
?>

<?php
// incluye el archivo de conexión a la base de datos
include_once("conexion.php");

if(isset($_POST['actualizar']))
{	
    $id_p= $_POST['id_pago'];
	$fecha = $_POST['fecha'];
	$numero = $_POST['num_tarjeta'];
    $anio=$_POST['anio'];
    $mes=$_POST['mes'];
    $codigo=$_POST['codigo'];
    $tipo=$_POST['tipo_tar'];
	
	// checking empty fields
	if(empty($id_p) || empty($fecha)|| empty($numero) || empty($anio)|| empty($mes)|| empty($codigo)|| empty($tipo)) {
				
		if(empty($id_p)) {
			echo "<font color='red'>El campo ID_Pago está vacío.</font><br/>";
		}

        if(empty($fecha)) {
			echo "<font color='red'>El campo Fecha Pago está vacío.</font><br/>";
		}

        if(empty($numero)) {
			echo "<font color='red'>El campo Número de tarjeta está vacío.</font><br/>";
		}

        if(empty($anio)) {
			echo "<font color='red'>El campo Año Vencimiento está vacío.</font><br/>";
		}

        if(empty($mes)) {
			echo "<font color='red'>El campo Mes Vencimiento está vacío.</font><br/>";
		}

        if(empty($codigo)) {
			echo "<font color='red'>El campo Código Seguridad está vacío.</font><br/>";
		}
		
        if(empty($tipo)) {
			echo "<font color='red'>El campo Tipo de Tarjeta está vacío.</font><br/>";
		}
		//enlace a la página anterior
		echo "<br/><a href='javascript:self.history.back();'>Regresar</a>";
	} else {	
		//Actualizando la tabla
		$resultado = mysqli_query($mysqli, "UPDATE pago_boleto SET id_pago='$id_p', fecha_pago='$fecha',
         num_tarjeta='$numero', anio_vence='$anio', mes_vence='$mes', codigo_segu='$codigo', tipo_tarjeta='$tipo' WHERE id_pago=$id_p");
		
		//Redireccionando a la página de visualización. En nuestro caso, es ver.php
		header("Location: verpago.php");
	}
}
?>
<?php
//Obteniendo id del url
$id_p= $_GET['id_pago'];

//seleccionar los datos asociados a este id
$resultado = mysqli_query($mysqli, "SELECT * FROM pago_boleto WHERE id_pago=$id_p");

while($fila = mysqli_fetch_array($resultado))
{
    $id_p= $fila['id_pago'];
    $fecha= $fila['fecha_pago'];
    $numero= $fila['num_tarjeta'];
    $anio= $fila['anio_vence'];
    $mes= $fila['mes_vence'];
    $codigo=$fila['codigo_segu'];
    $tipo=$fila['tipo_tarjeta'];
}
?>
<html>
<head>	
	<title>Editar Datos</title>
</head>

<body>
	<a href="index.php">Inicio</a> | <a href="verpago.php">Ver pagos</a> | <a href="cerrarsesion.php">Cerrar Sesion</a>
	<br/><br/>
	
	<form name="form1" method="post" action="editarpago.php">
		<table border="0">
            <tr> 
				<td>Id_Pago</td>
				<td><input type="number" name="id_pago" value="<?php echo $id_p;?>"></td>
			</tr>
			<tr> 
				<td>Fecha del pago</td>
				<td><input type="date" name="fecha" value="<?php echo $fecha;?>"></td>
			</tr>
            <tr> 
				<td>Número de Tarjeta (16 digitos)</td>
				<td><input type="textarea" name="num_tarjeta" value="<?php echo $numero;?>"></td>
			</tr>
            <tr> 
				<td>Año de Vencimiento</td>
				<td><input type="number" name="anio" value="<?php echo $anio;?>"></td>
			</tr>
            <tr> 
				<td>Mes de Vencimiento</td>
				<td><input type="number" name="mes" value="<?php echo $mes;?>"></td>
			</tr>
            <tr> 
				<td>Codigo de Seguridad</td>
				<td><input type="password" name="codigo" value="<?php echo $codigo;?>"></td>
			</tr>
            <tr> 
				<td>Tipo de Tarjeta: Debito o Credito</td>
				<td><input type="text" name="tipo_tar" value="<?php echo $tipo;?>"></td>
			</tr>
			<tr> 
				<td><input type="hidden" name="id_pago" value=<?php echo $_GET['id_pago'];?>></td>
				<td><input type="submit" name="actualizar" value="Actualizar"></td>
			</tr>
		</table>
	</form>
</body>
</html>
