<?php 
session_start();

include 'conexion.php';

$email = $_POST['email'];
$pass = md5($_POST['password']);

$sql = "SELECT * FROM usuarios WHERE email= '$email' and password= '$pass'";

$res = $con->query($sql);
if ($res->num_rows >0) {
    
    $user = $res->fetch_assoc();
    
    $_SESSION["logiado"]= "si";
    
    $_SESSION['id'] = $user['id'];
    $_SESSION['nombre'] = $user['nombre'];
    $_SESSION['email'] = $user['email'];
    
    $sql = "SELECT nombre FROM roles WHERE id= {$user['id_rol']}";
    
    $res = $con->query($sql);
    $rol = $res ->fetch_assoc();
    
    $_SESSION['rol'] = $rol['nombre'];


    echo "<script>location.href = 'index.php';</script>";
}else{
    
    header("Location: login.php?error=si");
}


