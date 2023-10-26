<?php session_start(); ?>
<html>
<head>
	<title>Inicio</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div id="header">
		Bienvenido a mi negocio BoleNais!
	</div>
	<?php
	if(isset($_SESSION['valid'])) {			
		include("conexion.php");					
		$result = mysqli_query($mysqli, "SELECT * FROM login");
	?>
				
		Bienvenido <?php echo $_SESSION['name'] ?> ! <a href='cerrarsesion.php'>Cerrar Sesión</a><br/>
		<br/>
		<a href='verpago.php'>Ver y Agregar un pago</a>
		<br/><br/>
	<?php	
	} else {
		echo "Debe iniciar sesión para ver esta página.<br/><br/>";
		echo "<a href='iniciarsesion.php'>Iniciar Sesión</a> | <a href='registro.php'>Registro</a>";
	}
	?>
	<div id="footer">
		Creado por Nairobi Keren Montiel Serrano 5°J</a>
	</div>
</body>
</html>
