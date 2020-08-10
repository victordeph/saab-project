<?php
require 'conexion.php';
session_start();

$user = $_POST['user'];
$password = $_POST['password'];

$query = "SELECT COUNT(*) as contar FROM administradores WHERE usuario = '$user' AND password = '$password'";
$consulta = mysqli_query($conexion, $query);
$array = mysqli_fetch_array($consulta);


if ($array['contar']>0) {
    $_SESSION['user'] = $user;
    echo '<script> alert("Bienvenido");</script>';
    header("Location: ../refacciones.php");
}else{
    echo '<script> alert("el usuario no existe");</script>';
    
}
?>
