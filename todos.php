<?php
require_once "views/header.php";
?>


    <?php

    require 'controller/conexion.php';

    $query = "select * from reportes";
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
                        <th>Costo U</th>
                        <th>Total</th>
                        <th>Fecha Solictud</th>
                        <th>Departamento</th>
                        <th># <sup>refaccion</sup></th>
                        <th>Status</th>
                        <th></th>
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
                            <td><button type="button" class="btn estado" id="estado"><i class="fas fa-pen"></i></button></td>
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

    <div class="container">

<!-- Modal -->
<div class="modal fade" id="estadoModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Cambiar status</h5>
    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    </div>
    <form role="form" action="controller/solicitarRefaccion.php" method="POST">
    <div class="modal-body">

    <div class="form-group">
                        <label>Estado</label>
                        <select class="form-control" id="status" name="status">
                            <option>Pendiente</option>
                            <option>Aprobado</option>
                            <option>No aprovado</option>
                        </select>
                    </div>
    </div>
        <div class="modal-footer">
        
            <input type="hidden" name="id_reporte" id="id_reporte">

                <button type="submit" class="btn btn-primary" name="btnEstado">Actualizar</button>
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </form>
            </div>
        </div>
    </div>
    </div>
</div>

        <script>
            $(document).ready(function(){
                $('.estado').on('click', function() {
                    $('#estadoModal').modal('show');
                        $tr = $(this).closest('tr');
                        var data = $tr.children("td").map(function() {
                            return $(this).text();
                        }).get();

                        console.log(data);

                        $('#id_reporte').val(data[0]);
                });
            });
        </script>


<?php
require_once "views/footer.php";
?>