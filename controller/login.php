<?php
require 'conexion.php';
session_start();

$usuario = $_POST['user'];
$password = $_POST['password'];

$query = "SELECT COUNT(*) as contar FROM catalogo WHERE usuario = '$usuario' AND password = '$password'";
$consulta = mysqli_query($conexion, $query);
$array = mysqli_fetch_array($consulta);


if ($array['contar']>0) {
    $_SESSION['user'] = $usuario;
    echo '<script> alert("Bienvenido");</script>';
    header("Location: ../pedidosUser.php");
}else{
    echo '<script> alert("el usuario no existe");</script>';

}
?>
