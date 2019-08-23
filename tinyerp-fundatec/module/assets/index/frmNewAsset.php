<link href="../../../css/dropzone.css" rel="stylesheet" type="text/css"/>
<script src="../../../js/general.js" type="text/javascript"></script>
<script type="text/javascript" src="../../../js/assets/AssetsManagement.js"></script>
<script type="text/javascript" src="../../../js/assets/jquery.maskMoney.js"></script>
<script src="../../../js/assets/fileUploader.js" type="text/javascript"></script>
<script>
    $(document).ready(function () {
        //se inicializa el forms
        $(assetManagement.actions.fnAdditionInitializer());
    });
</script> 
<?php
require_once '../../../model/assets/MCatalog.php';
$mCatalog = new MCatalog();
$allCategoriesOfAssest = $mCatalog->getAllCategoryAssest();
$allProviders = $mCatalog->getAllProviders();
?>
<div class="page-header">
    <h1>Agregar Activo</h1>
</div>
<body>
<form id="frmNewAsset" method="post" enctype="multipart/form-data">
    <fieldset class="form-group">
        <legend>Información Activo</legend>
        <div class="row">
            <div class="form-group col-lg-6">
                <label for="code">Código</label>
                <input type="text" class="form-control" name="code" id="code" required="required" placeholder="Código">
            </div>

            <div class="form-group col-lg-6">
                <label for="codCategory">Categoría</label>
                <select class="form-control requeridoCombo" id="codCategory" name="codCategory" required="required">
                    <option value="">Seleccione</option>                   
                    <?php  foreach($allCategoriesOfAssest as $clave => $valor){
                    ?>
                    <option value="<?php echo ($valor["CodCatalogoValor"])?>"><?php echo ($valor["DescCatalogoValor"])?></option>   
                   <?php  }
                   ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-lg-6">
                <label for="brand">Marca</label>
                <input type="text" class="form-control requerido" name="brand" id="brand" required="required" placeholder="Marca">
            </div>

            <div class="form-group col-lg-6">
                <label for="price">Precio Adquisición</label>
                <input type="tel" class="form-control money" min="1" name="price" id="price" required="required" placeholder="Precio Adquisición">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-lg-6">
                <label for="provider">Proveedor</label>
                <select class="form-control requeridoCombo" id="provider" name="provider" required="required">
                    <option value="">Seleccione</option>
                     <?php  foreach($allProviders as $clave => $valor){
                    ?>
                    <option value="<?php echo ($valor["IdProveedor"])?>"><?php echo ($valor["Nombre"])?></option>   
                   <?php  }
                   ?>
                </select>
            </div>
            <div class="form-group col-lg-6">
                <label for="serialNum">Número Serie</label>
                <input type="text" required="required" class="form-control" name="serialNum" id="serialNum" placeholder="Número Serie">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-lg-6">
                <label for="plateNum">Número Placa</label>
                <input type="text" required="required" class="form-control" name="plateNum" id="plateNum" placeholder="Número Placa">
            </div>
            <div class="form-group col-lg-6">
                <label for="dtpAcquisition">Fecha Adquisición</label>
                <input type="text" required="required" class="form-control date" name="dtpAcquisition" id="dtpAcquisition">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-lg-12">
                <label for="description">Descripción</label>
                <textarea class="form-control" required="required" rows="3" name="description" id="description"></textarea>
            </div>
        </div>
    </fieldset>
    <fieldset class="form-group">
        <legend>Adjuntar garantía del Activo</legend>
        <div class="row">
            <div class="form-group col-lg-6">
                <label for="dtpExpiration">Fecha Vencimiento</label>
                <input type="text" class="form-control date" name="dtpExpiration" id="dtpExpiration">
            </div>

            <div class="form-group col-lg-6">
                <label for="terms">Condiciones</label>
                <textarea class="form-control" rows="3" name="terms" id="terms"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-lg-6">
            <label for="terms">Condiciones</label>
            <input type="file" id="attachedFile" name="attachedFile">
            </div>
        </div>
    </fieldset>
<div class="row">
    <div class="form-group col-lg-12">
        <button type="submit" class="btn btn-primary mb-2">Guardar</button>
        <input type="hidden" id="action" name= "action" value="createAsset">
        <a href="index.php" class="btn btn-default">Volver</a>
    </div>
</div>
</form>
</body>