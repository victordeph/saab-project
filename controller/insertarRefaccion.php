<?php
 require 'conexion.php';

if (isset($_POST['insertar'])) {

    $refaccion = $_POST['refaccion'];
    $vehiculo = $_POST['vehiculo'];
    $cantidad = $_POST['cantidad'];
    $costo = $_POST['costo'];
    $date = $_POST['date'];



$query = "INSERT INTO refacciones (refaccion,vehiculo,cantidad, costo, fecha) values ('$refaccion','$vehiculo','$cantidad','$costo','$date');";
$query_run = mysqli_query($conexion, $query);

if ($query_run) {
    header('location: ../refacciones.php');
}

}

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