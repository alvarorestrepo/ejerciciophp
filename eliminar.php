<?php 

	require_once 'conexion.php';
	$id = $_GET['id'];

	$sql = "DELETE FROM libros WHERE id = $id";
	$result = $con->query( $sql );	
	
	if ($result) 
		header('location:index.php');
	
	echo "<p>Error!</p> <a href='index.php'>Volver</a>";

?>
