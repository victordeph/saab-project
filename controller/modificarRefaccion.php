<?php
require 'conexion.php';

if (isset($_POST['btnMod'])) {
    $id = $_POST['modId'];
    $refaccion = $_POST['refaccion'];
    $vehiculo = $_POST['vehiculo'];
    $cantidad = $_POST['cantidad'];
    $costo = $_POST['costo'];
    $date = $_POST['date'];

    $query = "UPDATE refacciones SET refaccion='$refaccion', vehiculo='$vehiculo', cantidad='$cantidad', costo='$costo', fecha='$date' WHERE id_refacciones='$id' ";
    $query_run = mysqli_query($conexion, $query);

    if ($query_run) {
        header('location: ../refacciones.php');   
    }
}

?>