<?php
require 'conexion.php';

if (isset($_POST['btnEli'])) {
    $id = $_POST['eliId'];
    
    $query = "DELETE FROM refacciones WHERE id_refacciones='$id' ";
    $query_run = mysqli_query($conexion, $query);

    echo $query;
    if ($query_run) {
        header('location: ../refacciones.php');   
    }
}

?>

