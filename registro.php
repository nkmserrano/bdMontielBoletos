<html>
<head>
	<title>Registro</title>
</head>

<body>
<a href="index.php">Inicio</a> <br />
<?php
include("conexion.php");

if(isset($_POST['enviar'])) {
	$nombre = $_POST['nombre'];
	$correo = $_POST['correo'];
	$usuario = $_POST['usuario'];
	$contrasenia = $_POST['contrasenia'];

	if($usuario == "" || $contrasenia == "" || $nombre == "" || $correo == "") {
		echo "Todos los campos deben estar rellenados. Uno o varios campos están vacíos.";
		echo "<br/>";
		echo "<a href='register.php'>Regresar</a>";
	} else {
		mysqli_query($mysqli, "INSERT INTO login(name, email, username, password) VALUES('$nombre', '$correo', '$usuario', md5('$contrasenia'))")
			or die("No se pudo ejecutar la consulta de inserción.");
			
		echo "Registro realizado con éxito";
		echo "<br/>";
		echo "<a href='iniciarsesion.php'>Login</a>";
	}
} else {
?>
	<p><font size="+2">Registro</font></p>
	<form name="form1" method="post" action="">
		<table width="75%" border="0">
			<tr> 
				<td width="10%">Nombre Completo</td>
				<td><input type="text" name="nombre"></td>
			</tr>
			<tr> 
				<td>Correo</td>
				<td><input type="text" name="correo"></td>
			</tr>			
			<tr> 
				<td>Usuario</td>
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
