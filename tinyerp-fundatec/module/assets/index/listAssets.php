<script src="../../../js/assets/AssetsManagement.js" type="text/javascript"></script>
<script type="text/javascript" src="../../../js/jquery.dataTables.min.js"></script>
<script src="../../../js/general.js" type="text/javascript"></script>
<script type="text/javascript" src="../../../js/assets/jquery.maskMoney.js"></script>
<script type="text/javascript" src="../../../js/assets/moment.js"></script>
<link href="../../../css/circularFloatingButton.css" rel="stylesheet" type="text/css"/>
<link href="../../../css/dataTables.bootstrap.css" rel="stylesheet" type="text/css">
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once '../../../model/assets/MActivos.php';
require_once '../../../controller/Assets/AssetsController.php';
?>
<div class="page-header">
    <h1>Gestionar activos</h1>
</div>
<div class="btn-float">
        <button id="addAsset" type="button" class="btn btn-default btn-circle btn-xl btn-lateral"><i class="fa fa-plus"></i></button><br>
</div>
<!--<input type="button" id="addAsset" class="btn btn-success" value="Registrar activo" onclick="$(assetManagement.actions.fnButtonAddAsset());">-->

    <a id="btnRepair" href="index.php?action=consultRepairForm" class="btn btn-primary btnMenuPrincipal disabled" >Reparación</a>
    <a id="btnQuotation" href="index.php?action=consultQuotationForm" class="btn btn-primary btnMenuPrincipal" >Cotización</a>
    <a id="btnAssignment" href="index.php?action=listAssignment" class="btn btn-primary btnMenuPrincipal" >Asignación</a>
    <a id="btnPhysicalInventory" href="index.php?action=newPhysicalInventoryForm" class="btn btn-primary btnMenuPrincipal" >Toma física</a>
    <hr/>
    <input type="hidden" id="maskMoneySetter" class="money"/>
    <form id="formAssets" method="post" action="" class="form-inline">   
    <input type="hidden" id="action" name="action" value="listAssets">
        
        <table class="table table-striped table-bordered" id="AssetsMainTable" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Selección</th>
                    <th scope="col">Categoría</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Precio adquisición</th>
                    <th scope="col">Proveedor</th>
                    <th scope="col">Número de placa</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Número de serie</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach($this->listAssets as $clave => $valor){
                ?>         
                <tr>
                    <td><input type="radio" value="<?php echo($valor["IdActivo"]) ?>" name="assetRow"></input></td>
                    <td><?php echo($valor["Categoria"]) ?></td>
                    <td><?php echo($valor["Marca"]) ?></td>
                    <td><?php setlocale(LC_MONETARY, 'en_US'); 
                                echo(number_format($valor["PrecioAdquisicion"],2));  ?></td>
                    <td><?php echo($valor["Proveedor"]) ?></td>
                    <td><?php echo($valor["Estado"]) ?></td>
                    <td><?php echo($valor["NumeroSerie"]) ?></td>
                    <td><?php echo($valor["NumeroPlaca"]) ?></td>
                    <td><p data-placement="top" data-toggle="tooltip" title="Editar" ><a class="btn btn-primary btn-xs editarActivo"> <span class="glyphicon glyphicon-pencil"></span> </a></p></td>
                    <td><p data-placement="top" data-toggle="tooltip" title="Eliminar"><button class="btn btn-danger btn-xs" data-target="#modalEliminar" data-functiondelete="assetManagement.actions.fnDeleteAsset();" data-idtodelete="'<?php echo($valor["NumeroPlaca"]) ?>'" data-idAsset="'<?php echo($valor["NumeroPlaca"]) ?>'" data-title="Eliminar" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span></button></p></td>
                </tr>
                    <?php }?>
            </tbody>
        </table>
    </form>
<script type="text/javascript">
$(document).ready(function() {  
    $('#AssetsMainTable').DataTable({
    "language": {
        "lengthMenu": "_MENU_ Registros por página.",
        "zeroRecords": "No se han encontrado registros.",
        "info": "Página _PAGE_ de _PAGES_ / _START_ - _END_ de _TOTAL_ registros",
        "infoEmpty": "No se han encontrado registros.",
        "infoFiltered": " ",
        "search": "Buscar: ",
        "paginate": {
            "first": "Primero",
            "last": "Último",
            "next": "Siguiente",
            "previous": "Anterior"
        }
    }
});

$(".editarActivo").click(function(){
    var form = $("#formAssets");
    $("#action").val("editAssetForm");
    var idActivo = $("#AssetsMainTable > tbody > tr:nth-child(1) > td.sorting_1 > input[type=radio]").val();
    $('<input>').attr({
        type: 'hidden',
        id: 'IdActivo',
        name: 'IdActivo',
        value: idActivo
    }).appendTo($(form));
    $("#formAssets").submit();
    
});
});
</script>