<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: iniciarsesion.php');
}
?>

<?php
//incluye el archivo de conexión a la base de datos
include("conexion.php");

//obteniendo id del dato de url
$id_p = $_GET['id_pago'];

//eliminando la fila de la tabla
$result=mysqli_query($mysqli, "DELETE FROM pago_boleto WHERE id_pago=$id_p");

//redirigir a la página de visualización (view.php en nuestro caso)
header("Location:verpago.php");
?>

