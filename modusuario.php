<?php
$conexion = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($conexion, 'bdsaab');

if(isset($_POST['btnMod']))
{
    $id = $_POST['modId'];
    $usuario = $_POST['usuario'];
    $departamento = $_POST['departamento'];
    $password = $_POST['password'];

    $query = "update catalogo set usuario='$usuario', departamento='$departamento', password='$password' where idusuario='$id' ";
    $query_run = mysqli_query($conexion, $query);

    if($query_run)
    {
        echo '<script> alert("Datos actualizados"); </script>';
        header('location: usuarios.php');
    }
    else
    {
        echo '<script> alert("Datos no se han actualizado"); </script>';
    }
}
?>
