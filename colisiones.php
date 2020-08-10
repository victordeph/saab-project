<?php
require_once "views/header.php";
?>


    <?php

    require 'controller/conexion.php';

    $query = "SELECT * FROM reportes WHERE departamento_reportes='Colisiones'";
    $query_run = mysqli_query($conexion, $query);
    $array = mysqli_fetch_array($query_run);

    ?>

    <div class="container">
        <h2>Refacciones Solicitadas</h2>
        
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Refaccion</th>
                        <th>Vehiculo</th>
                        <th>Cantidad</th>
                        <th>Costo Unitario</th>
                        <th>Total</th>
                        <th>Fecha Solictud</th>
                        <th>Departamento</th>
                        <th># Refaccion</th>
                        <th>Status</th>
                        <!-- <th>Acciones</th> -->

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
                            <td> <?php echo $row['id_reportes'];?></td>
                            <td><?php echo $row['refaccion_reportes'];?></td>
                            <td><?php echo $row['vehiculo_reportes'];?></td>
                            <td><?php echo $row['cantidad_reportes'];?></td>
                            <td><?php echo $row['costo_reportes'];?></td>
                            <td><?php echo $row['costo_total_reportes'];?></td>
                            <td><?php echo $row['fecha_solictud_reportes'];?></td>
                            <td><?php echo $row['departamento_reportes'];?></td>
                            <td><?php echo $row['id_refacciones'];?></td>
                            <td><?php echo $row['estado_reportes'];?></td>
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