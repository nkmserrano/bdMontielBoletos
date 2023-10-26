<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: iniciarsesion.php');
}
?>

<html>
<head>
	<title>Agregar Pago</title>
</head>

<body>
<?php
//incluye el archivo de conexión a la base de datos
include_once("conexion.php");

if(isset($_POST['agregar'])) {	
    $id_c = $_SESSION['id'];
    $id_p= $_POST['id_pago'];
	$usuario = $_POST['usuario'];
	$contrasenia= $_POST['contrasenia'];
	$fecha = $_POST['fecha'];
	$numero = $_POST['num_tarjeta'];
    $anio=$_POST['anio'];
    $mes=$_POST['mes'];
    $codigo=$_POST['codigo'];
    $tipo=$_POST['tipo_tar'];
		
	// comprobación de campos vacíos
	if(empty($id_p) || empty($usuario)|| empty($contrasenia)|| empty($fecha)|| empty($numero) || empty($anio)|| empty($mes)|| empty($codigo)|| empty($tipo)) {
				
		if(empty($id_p)) {
			echo "<font color='red'>El campo ID_Pago está vacío.</font><br/>";
		}
        
        if(empty($usuario)) {
			echo "<font color='red'>El campo Usuario está vacío.</font><br/>";
		}

        if(empty($contrasenia)) {
			echo "<font color='red'>El campo Contraseña está vacío.</font><br/>";
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
		// si todos los campos están rellenados (no vacíos)
			
		//insertar datos a la base de datos
		$resultado = mysqli_query($mysqli, "INSERT INTO pago_boleto (id_pago, id, usuario, password, fecha_pago, num_tarjeta, anio_vence, mes_vence, codigo_segu, tipo_tarjeta)
         VALUES('$id_p','$id_c', '$usuario', md5('$contrasenia') ,'$fecha','$numero','$anio','$mes','$codigo','$tipo' )");
		
		//mostrar mensaje de éxito
		echo "<font color='green'>Datos añadidos con éxito";
		echo "<br/><a href='verpago.php'>Ver Resultado</a>";
	}
}
?>
</body>
</html>
