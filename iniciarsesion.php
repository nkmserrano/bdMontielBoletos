<?php session_start(); ?>
<html>
<head>
	<title>Inicio Sesion</title>
</head>

<body>
<a href="index.php">Inicio</a> <br />
<?php
include("conexion.php");

if(isset($_POST['enviar'])) {
	$usuario = mysqli_real_escape_string($mysqli, $_POST['usuario']);
	$contrasenia = mysqli_real_escape_string($mysqli, $_POST['contrasenia']);

	if($usuario == "" || $contrasenia == "") {
		echo "El campo de nombre de usuario o contraseña está vacío.";
		echo "<br/>";
		echo "<a href='iniciarsesion.php'>Regresar</a>";
	} else {
		$resultado = mysqli_query($mysqli, "SELECT * FROM login WHERE username='$usuario' AND password=md5('$contrasenia')")
					or die("No se pudo ejecutar la consulta select.");
		
		$fila = mysqli_fetch_assoc($resultado);
		
		if(is_array($fila) && !empty($fila)) {
			$validarusuario = $fila['username'];
			$_SESSION['valid'] = $validarusuario;
			$_SESSION['name'] = $fila['name'];
			$_SESSION['id'] = $fila['id'];
		} else {
			echo "Nombre de usuario o contraseña incorrectos.";
			echo "<br/>";
			echo "<a href='iniciarsesion.php'>Regresar</a>";
		}

		if(isset($_SESSION['valid'])) {
			header('Location: index.php');			
		}
	}
} else {
?>
	<p><font size="+2">Inicio de Sesión</font></p>
	<form name="form1" method="post" action="">
		<table width="75%" border="0">
			<tr> 
				<td width="10%">Usario</td>
				<td><input type="text" name="usuario"></td>
			</tr>
			<tr> 
				<td>Contraseña</td>
				<td><input type="password" name="contrasenia"></td>
			</tr>
			<tr> 
				<td>&nbsp;</td>
				<td><input type="submit" name="enviar" value="Enviar"></td>
			</tr>
		</table>
	</form>
<?php
}
?>
</body>
</html>
