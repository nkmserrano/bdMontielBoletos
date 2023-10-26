<html>
<head>
	<title>Pago Boleto</title>
</head>

<body>
	<a href="index.php">Inicio</a> | <a href="verpago.php">Ver pagos</a> | <a href="cerrarsesion.php">Cerrar Sesion</a>
	<br/><br/>

	<form action="pagoproceso.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>Id_Pago</td>
				<td><input type="number" name="id_pago"></td>
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
				<td>Fecha del pago</td>
				<td><input type="date" name="fecha"></td>
			</tr>
            <tr> 
				<td>Número de Tarjeta(16 digitos)</td>
				<td><input type="number" name="num_tarjeta"></td>
			</tr>
            <tr> 
				<td>Año de Vencimiento</td>
				<td><input type="number" name="anio"></td>
			</tr>
            <tr> 
				<td>Mes de Vencimiento</td>
				<td><input type="number" name="mes"></td>
			</tr>
            <tr> 
				<td>Codigo de Seguridad</td>
				<td><input type="password" name="codigo"></td>
			</tr>
            <tr> 
				<td>Tipo de Tarjeta: Debito o Credito</td>
				<td><input type="text" name="tipo_tar"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="agregar" value="Agregar"></td>
			</tr>
		</table>
	</form>
</body>
</html>

