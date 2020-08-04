<?php
$conexion = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($conexion, 'bdsaab');

if(isset($_POST['btnMod']))
{
    $id = $_POST['modId'];
    $usuario = $_POST['usuario'];
    $departamento = $_POST['departamento'];

    $query = "update catalogo set usuario='$usuario', departamento='$departamento' where idusuario='$id' ";
    $query_run = mysqli_query($conexion, $query);

    if($query_run)
    {
        echo '<script> alert("Datos actualizados"); </script>';
        header('location: usuarioPrueba.php');
    }
    else
    {
        echo '<script> alert("Datos no se han actualizado"); </script>';
    }
}
?>
