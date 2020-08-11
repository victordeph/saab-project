<?php
require_once "views/header.php";
?>


    <?php

    require 'controller/conexion.php';

    $query = "SELECT id_refacciones, refaccion_trending, vehiculo_trending, cantidad_trending FROM trending 
    ORDER BY cantidad_trending DESC;";
    $query_run = mysqli_query($conexion, $query);
    $array = mysqli_fetch_array($query_run);

    ?>

    <div class="container">
        <h2>Refacciones mas solicitadas</h2>
        
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        <th>Refaccion</th>
                        <th>Vehiculo</th>
                        <th>Cantidades solicitadas</th>
                    </tr>
                </thead>
                <?php
                if($query_run)
                {
                    foreach($query_run as $row)
                    {
                ?>
                    <tbody>
                        <tr>
                            <td> <?php echo $row['id_refacciones'];?></td>
                            <td><?php echo $row['refaccion_trending'];?></td>
                            <td><?php echo $row['vehiculo_trending'];?></td>
                            <td><?php echo $row['cantidad_trending'];?></td>
                        </tr>
                    </tbody>
                    <?php
                        }
                    }
                    else
                    {
                        echo "No se encuentra el registro";
                    }
                ?>
            </table>
        </div>
    </div>


<?php
require_once "views/footer.php";
?>