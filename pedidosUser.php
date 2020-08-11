<?php 
require_once "views/users/headerUser.php";
?>
 <?php

require 'controller/conexion.php';

$query = "select * from refacciones";
$query_run = mysqli_query($conexion, $query);
$array = mysqli_fetch_array($query_run);

?>


<div class="container">
    <h2>Solicitud de refacciones</h2>

    <div class="table-responsive">          
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Refaccion</th>
                    <th>Vehiculo</th>
                    <th>Cantidad</th>
                    <th>Costo U.</th>
                    <th>Fecha Ingreso</th>
                    <th>Acciones</th>
                    
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
                        <td><?php echo $row['refaccion'];?></td>
                        <td><?php echo $row['vehiculo'];?></td>
                        <td><?php echo $row['cantidad'];?></td>
                        <td><?php echo $row['costo'];?></td>
                        <td><?php echo $row['fecha'];?></td>
                        <td><button type="button" class="btn btn-primary modbtn" id="modificar">Solicitar</button></td>
                        
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
    
    <div class="modal fade" id="solicitar" role="dialog">
        <div class="modal-dialog">
        
        <div class="modal-content">
            <div class="modal-header" >
            <h5 class="modal-title" id="exampleModalLabel">Solicitar Refaccion</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>
                <div class="modal-body">
                <form role="form" action="controller/solicitarRefaccion.php" method="POST" class="my-login-validation" novalidate="">
                <input type="hidden" name="idRefaccion" id="modId" disable>
                <div class="form-group">
                <input type="hidden" name="txtId">
                    <label> Refaccion</label>
                    <input type="text" class="form-control" id="refaccion" name="refaccion" placeholder="">
                </div>
                <div class="form-group">
                    <label>Vehiculo</label>
                    <input type="text" class="form-control" id="vehiculo" name="vehiculo" placeholder="">
                </div>
                <div class="form-group">
                    <label>Cantidad</label>
                    <input type="text" class="form-control" id="cantidad" name="cantidad" required autofocus>
                    <div class="invalid-feedback">
                        Requerido!
                    </div>
                </div>
                <div class="form-group">
                    <label>Costo Unitario</label>
                    <input type="text" class="form-control" id="costoU" name="costoU" placeholder="">
                </div>
                <div class="form-group">
                    <label>Fecha de solicitud</label>
                    <input type="text" class="form-control" id="date" name="date" required autofocus>
                    <div class="invalid-feedback">
                        Requerido!
                    </div>
                </div>
                <div class="form-group">
                    <label>Departamento</label>
                    <select class="form-control" id="departamento" name="departamento">
                        <option>Ventas</option>
                        <option>Colisiones</option>
                        <option>Mecanica</option>
                    </select>
                </div>
            <!-- </div> -->
            <div class="modal-footer">
            <button type="submit" class="btn btn-primary" name="solicitar"> Solicitar</button>
                    <button type="submit" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </form>
                </div>
            </div>
        </div>
        </div> 
    </div>

    <script>
$(document).ready(function(){
        $('.modbtn').on('click', function() {

            $('#solicitar').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#modId').val(data[0]);
                $('#refaccion').val(data[1]);
                $('#vehiculo').val(data[2]);
                /* $('#cantidad').val(data[3]); */
                $('#costoU').val(data[4]);
                /* $('#date').val(data[5]); */
        });
    });
</script>
<?php 
require_once "views/users/footerUser.php";
?>