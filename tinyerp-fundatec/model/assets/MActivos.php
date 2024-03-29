<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Esta clase se encarga de obtener y enviar datos a los servicios o base de datos
 * respectiva.
 *
 * @author enunezs89
 */
require_once '../../../utilities/utilities.php';

class MActivos {

    public function obtenerActivosERP() {
        $utilitiesAux = new Utilities();

        try {
            //creamos el cliente soap
            $client = new SoapClient($utilitiesAux->getWSDLGestionActivos());
            //$parametros = array('pApplicationID' => $utilitiesAux->getAplicationId(), 'pUserName' => $username, 'pPassword' => $clave);
            //se realiza el llamado al metodo del wcf
            $result = $client->ListarActivos();
            if ($result == null) {
                return false;
            } else {
                Sesion::setAttr("firstname", $result->validateUserResult->FirstName);
                Sesion::setAttr("lastname", $result->validateUserResult->LastName);
                Sesion::setAttr("globalUserId", $result->validateUserResult->UserID);
                Sesion::setAttr("username", $result->validateUserResult->Username);
                Sesion::setAttr("identification", $result->validateUserResult->Identification);
                Sesion::setAttr("imageProfile", $utilitiesAux->getProfileImageUrl() . "/" . $result->validateUserResult->ImageProfile);
                Sesion::setAttr("idUsuarioLocal", $result->validateUserResult->UserID);
                Sesion::setAttr("idUsuarioGlobal", $result->validateUserResult->UserID);
                return true;
            }
        } catch (Exception $e) {
            print "Caught exception: " . $e->getMessage() . "\n";
            return false;
        }
    }

    public function getAllAssets() {
        Mysql::open();
        $query = "CALL pr_GetAllAssets();";
        $assets = array();
        $result = Mysql::query($query);
        while ($row = Mysql::get_row_array($result)) {
            array_push($assets, $row);
        }
        Mysql::close();
        return $assets;
    }

    public function getAssetById($id) {
        Mysql::open();

        $query = "CALL pr_GetAssetById($id);";
        $result = Mysql::query($query);
        $asset = array();
        while ($row = Mysql::get_row_array($result)) {
            array_push($asset, $row);
        }
        Mysql::close();
        return json_encode($asset);
    }
    
     
     public function getAllCategoriesAssignement() {
        /**
         * Método que obtiene de base de datos el catalogo de categorias de activos
         */
        Mysql::open();
        $query = "CALL pr_GetAllCategoriesAssignement();";
        $categories = array();
        $result = Mysql::query($query);
        while ($row = Mysql::get_row_array($result)) {
            array_push($categories, $row);
        }
        Mysql::close();
        return json_encode($categories);
    }

  

    public function insertAsset(Asset $asset) {
        /**
         * Método que guarda la información de un activo en base de datos.
         */
        try {
            /* //obtenemos la ruta fisica del archivo
              $target_dir = "uploadFiles/";
              $target_file = $target_dir . basename($asset->getFileURLWarranty()); */

            //obtenemos los parametros del sp
            $codigo = $asset->getCode();
            $codCategoria = $asset->getCodCategory();
            $marca = $asset->getBrand();
            $precio = $asset->getPrice();
            $idProveedor = $asset->getIdProvider();
            $codEstado = $asset->getCodState();
            $numSerie = $asset->getSerialNumber();
            $numPlaca = $asset->getPlateNumber();
            $descripcion = $asset->getDescription();
            $fechaAdquisicion = $asset->getAcquisitionDate();
            $fechaVencimientoGarantia = $asset->getExpirationDateWarranty();
            $condicionesGarantia = $asset->getTermsWarranty();
            $archivo = $asset->getFile();
            $tipoMime = $asset->getFileType();
            $nombreArchivo = $asset->getFileName();
            $tamano = $asset->getFileSize();
            Mysql::open();
            $archivo = Mysql::escapeString($archivo);
            $nombreArchivo = Mysql::escapeString($nombreArchivo);  
            $tipoMime =  Mysql::escapeString($tipoMime);
            $sql = "CALL pr_InsertAssest('$codigo', $codCategoria, '$marca', "
                    . "$precio, $idProveedor, $codEstado, '$numSerie', '$numPlaca', "
                    . "'$descripcion', '$fechaAdquisicion', '$fechaVencimientoGarantia', "
                    . "'$condicionesGarantia', '$archivo', '$tipoMime','$nombreArchivo', $tamano); ";
            x;
            Mysql::execute($sql);
            Mysql::close();
            return 1;
        } catch (Exception $exc) {
            return -1;
            
        }
    }

    public function editAsset(Asset $asset) {
        /**
         * Método que guarda la información de un activo en base de datos.
         */
        try {
            //obtenemos los parametros del sp
            $idActivo = $asset->getId();
            $codigo = $asset->getCode();
            $codCategoria = $asset->getCodCategory();
            $marca = $asset->getBrand();
            $precio = $asset->getPrice();
            $idProveedor = $asset->getIdProvider();
            $codEstado = $asset->getCodState();
            $numSerie = $asset->getSerialNumber();
            $numPlaca = $asset->getPlateNumber();
            $descripcion = $asset->getDescription();
            $fechaAdquisicion = $asset->getAcquisitionDate();
            $idGarantia = $asset->getIdWarranty();
            $fechaVencimientoGarantia = $asset->getExpirationDateWarranty();
            $condicionesGarantia = $asset->getTermsWarranty();
            $urlArchivoGarantia = $asset->getFileURLWarranty();
            $extensionArchivoGarantia = $asset->getFileTypeWarranty();

            Mysql::open();
            $sql = "CALL pr_EditAssest($idActivo,'$codigo', $codCategoria, '$marca', "
                    . "$precio, $idProveedor, $codEstado, '$numSerie', '$numPlaca', "
                    . "'$descripcion', '$fechaAdquisicion', $idGarantia, '$fechaVencimientoGarantia', "
                    . "'$condicionesGarantia', '$urlArchivoGarantia', '$extensionArchivoGarantia'); ";
            Mysql::execute($sql);
            Mysql::close();
            return 1;
        } catch (Exception $exc) {
            return -1;
        }
    }

    public function updateStateAsset($idActivo, $codEstado) {
        /**
         * Método que guarda la información de un activo en base de datos.
         */
        try {
            Mysql::open();
            $sql = "CALL pr_ChangeStateAsset($idActivo,$codEstado); ";
            Mysql::execute($sql);
            Mysql::close();
            return 1;
        } catch (Exception $exc) {
            return -1;
        }
    }

    public function getAllRepairsByAssetId($idAsset) {
        Mysql::open();
        $query = "CALL pr_GetAllRepairsByAssetId($idAsset);";
        $assets = array();
        $result = Mysql::query($query);
        while ($row = Mysql::get_row_array($result)) {
            array_push($assets, $row);
        }
        Mysql::close();
        return json_encode($assets);
    }

    public function insertRepair(Repair $repair) {
        /**
         * Método que guarda la información de un activo en base de datos.
         */
        try {
            //obtenemos los parametros del sp
            $assetId = $repair->getAssetId();
            $description = $repair->getDescription();
            $studioName = $repair->getStudioName();
            $devolutionDate = $repair->getDevolutionDate();
            $coverByWarranty = $repair->getCoverByWarranty();
            $attachementId = $repair->getAttachementId();
            $fileURL = $repair->getFileURL();
            $fileType = $repair->getFileType();

            Mysql::open();
            $sql = "CALL pr_InsertRepair($assetId, '$description', '$studioName'"
                    . ", '$devolutionDate', $coverByWarranty, '$fileURL', '$fileType');";
            Mysql::execute($sql);
            Mysql::close();
            return 1;
        } catch (Exception $exc) {
            return -1;
        }
    }

    public function editRepair(Repair $repair) {
        /**
         * Método que obtiene la información de una reparacion en base de datos.
         */
        try {
            $repairId = $repair->getRepairId();
            $assetId = $repair->getAssetId();
            $description = $repair->getDescription();
            $studioName = $repair->getStudioName();
            $devolutionDate = $repair->getDevolutionDate();
            $coverByWarranty = $repair->getCoverByWarranty();
            $attachementId = $repair->getAttachementId();
            $fileURL = $repair->getFileURL();
            $fileType = $repair->getFileType();

            Mysql::open();
            $sql = "CALL pr_EditRepair($assetId, '$description', '$studioName'"
                    . ", '$devolutionDate', $coverByWarranty, $repairId"
                    . ", '$fileURL', '$fileType');";
            Mysql::execute($sql);
            Mysql::close();
            return 1;
        } catch (Exception $exc) {
            return -1;
        }
    }

    public function getRepairById($id) {
        Mysql::open();

        $query = "CALL pr_GetRepairById($id);";
        $result = Mysql::query($query);
        $asset = array();
        while ($row = Mysql::get_row_array($result)) {
            array_push($asset, $row);
        }
        Mysql::close();
        return json_encode($asset);
    }

    public function deleteRepairById($repairId) {
        Mysql::open();

        try {
            Mysql::open();
            $sql = "CALL pr_deleteRepairById($repairId);";
            Mysql::execute($sql);
            Mysql::close();
            return 1;
        } catch (Exception $exc) {
            return -1;
        }
    }

    public function getAllQuotations() {
        Mysql::open();
        $query = "CALL pr_GetAllQuotation();";
        $assets = array();
        $result = Mysql::query($query);
        while ($row = Mysql::get_row_array($result)) {
            array_push($assets, $row);
        }
        Mysql::close();
        return json_encode($assets);
    }
     public function getAllAssignments() {
        Mysql::open();
        $query = "CALL pr_GetAllAssignments();";
        $assets = array();
        $result = Mysql::query($query);
        while ($row = Mysql::get_row_array($result)) {
            array_push($assets, $row);
        }
        Mysql::close();
        return json_encode($assets);
    }
     public function getAllAssetsByCodePlateDescription($searchedValue) {
        Mysql::open();
        $query = "CALL pr_SearchAssetByCodePlateDescription('$searchedValue');";
        $assets = array();
        $result = Mysql::query($query);
        while ($row = Mysql::get_row_array($result)) {
            array_push($assets, $row);
        }
        Mysql::close();
        return json_encode($assets);
    }
    
    public function insertQuotation(Quotation $quotation) {        
        try {
        $idProvider = $quotation->getProviderId();
        $urlFile = $quotation->getFileURL();
        $urlEvaluadoFile = $urlFile == "0" ? "NULL" : $urlFile;
        $amount = $quotation->getAmount();
        $fechaVencimiento = $quotation->getDueDate();
        $query = "INSERT INTO cotizacion (IdProveedor,IdArchivoAdjunto,Monto,FechaVencimiento) VALUES ($idProvider,$urlEvaluadoFile,$amount,'$fechaVencimiento')";
        Mysql::open();
        Mysql::execute($query);
        $resultado = Mysql::last_id();
        Mysql::close();
            return $resultado;
        } catch (Exception $exc) {
            return -1;
        }
    }
        
     public function insertMultipleAssetsOnQuotation(Quotation $quotation) {        
        try {
        $idQuotation = $quotation->getIdQuotation();
        $assets = $quotation->getAssets();
        $query = "INSERT INTO cotizacionactivo (IdCotizacion,IdActivo) VALUES ";
        $longitud = count($assets);
        for($i=0; $i<$longitud; $i++){
            if($i + 1 == $longitud){
                $query .= "($idQuotation,$assets[$i]);"; 
            }else{
                $query .= "($idQuotation,$assets[$i]),";    
            }                  
        }
        Mysql::open();
        Mysql::execute($query);
        Mysql::close();
            return 1;
        } catch (Exception $exc) {
            return -1;
        }
    }
    
    public function getQuotationById($id) {
        Mysql::open();

        $query = "CALL pr_GetQuotationById($id);";
        $result = Mysql::query($query);
        $asset = array();
        while ($row = Mysql::get_row_array($result)) {
            array_push($asset, $row);
        }
        Mysql::close();
        return json_encode($asset);
    }
    
    public function getPeriodById($id) {
        Mysql::open();

        $query = "CALL pr_GetPeriodById($id);";
        $result = Mysql::query($query);
        $asset = array();
        while ($row = Mysql::get_row_array($result)) {
            array_push($asset, $row);
        }
        Mysql::close();
        return json_encode($asset);
    }
    
     public function editQuotation(Quotation $quotation) {
        try {
            $id = $quotation->getIdQuotation();
            $amount = $quotation->getAmount();
            $urlFile = $quotation->getFileURL();
            $idProvider = $quotation->getProviderId();
            $fechaVencimiento = $quotation->getDueDate();
            Mysql::open();
            $sql = "CALL pr_EditQuotation($id, $idProvider, $urlFile, $amount,'$fechaVencimiento');";
            Mysql::execute($sql);
            Mysql::close();
            return 1;
        } catch (Exception $exc) {
            return -1;
        }
    }
    
    public function deleteQuotationById($idCotizacion) {
        Mysql::open();

         try {
            Mysql::open();
            $sql = "CALL pr_DeleteQuotationById($idCotizacion);";
            Mysql::execute($sql);
            Mysql::close();
            return 1;
        } catch (Exception $exc) {
            return -1;
        }
    }
    
     public function getAllPeriods() {
        /**
         * Método que obtiene de base de datos el catalogo de proveedores de activos
         */
        Mysql::open();
        $query = "CALL pr_GetAllPeriods();";
        $periods = array();
        $result = Mysql::query($query);
        while ($row = Mysql::get_row_array($result)) {
            array_push($periods, $row);
        }
        Mysql::close();
        return json_encode($periods);
    }
    
     public function getAllPeriodStates() {
        /**
         * Método que obtiene de base de datos el catalogo de proveedores de activos
         */
        Mysql::open();
        $query = "CALL pr_GetAllPeriodStates();";
        $periodStates = array();
        $result = Mysql::query($query);
        while ($row = Mysql::get_row_array($result)) {
            array_push($periodStates, $row);
        }
        Mysql::close();
        return json_encode($periodStates);
    }
    
     public function insertPeriod(Period $period) {
        /**
         * Método que guarda la información de un activo en base de datos.
         */
        try {
            //obtenemos los parametros del sp
            $description = $period->getDescription();
            $endDate = $period->getEndDate();
            $startDate = $period->getStartDate();
            $stateCode = $period->getStateCode();

            Mysql::open();
            $sql = "CALL pr_InsertPeriod('$startDate', '$endDate', $stateCode, '$description'); ";
            Mysql::execute($sql);
            Mysql::close();
            return 1;
        } catch (Exception $exc) {
            return -1;
        }
    }
    public function editPeriod(Period $period) {
        try {
            $id = $period->getIdPeriod();
            $description = $period->getDescription();
            $startDate = $period->getStartDate();
            $endDate = $period->getEndDate();
            $stateCode = $period->getStateCode();
            Mysql::open();
            $sql = "CALL pr_EditPeriod($id, '$description', '$startDate', '$endDate', $stateCode);";
            Mysql::execute($sql);
            Mysql::close();
            return 1;
        } catch (Exception $exc) {
            return -1;
        }
    }
    
     public function findResponsableById($id) {
        Mysql::open();
        $query = "CALL pr_FindResponsableById('$id');";
        $responsables = array();
        $result = Mysql::query($query);
        while ($row = Mysql::get_row_array($result)) {
            array_push($responsables, $row);
        }
        Mysql::close();
        $prueba = 0;
        if(empty($responsables)){
            $prueba = null;
        }else{
            $prueba = $responsables[0];            
        }
            
        return json_encode($prueba);
    }
    
        public function insertAssignment(Assignment $assignment) {        
        try {
        
        $assignmentDate = $assignment->getAssignmentDate();
        $assignmentDevolutionDate = $assignment->getDevolutionDate();
        $stateCode = $assignment->getStateCode();
        $responsableId = $assignment->getIdResponsable();
        
        $query = "INSERT INTO asignacion (FechaAsignacion,CodEstadoAsignacion,FechaDevolucion,BoletaSolicitud,IdResponsable) "
                . "VALUES ('$assignmentDate',$stateCode,'$assignmentDevolutionDate',NULL,'$responsableId')";
        Mysql::open();
        Mysql::execute($query);
        $resultado = Mysql::last_id();
        Mysql::close();
            return $resultado;
        } catch (Exception $exc) {
            return -1;
        }
    }
    
    public function insertMultipleAssetsOnAssignment(Assignment $assignment) {        
        try {
        $idAssignment = $assignment->getId();
        $assets = $assignment->getAssets();
        $query = "INSERT INTO asignacionactivo (IdAsignacion,IdActivo) VALUES ";
        $longitud = count($assets);
        for($i=0; $i<$longitud; $i++){
            if($i + 1 == $longitud){
                $query .= "($idAssignment,$assets[$i]);"; 
            }else{
                $query .= "($idAssignment,$assets[$i]),";    
            }                  
        }
        Mysql::open();
        Mysql::execute($query);
        Mysql::close();
            return 1;
        } catch (Exception $exc) {
            return -1;
        }
    }
    
        public function getAssignmentById($id) {
        Mysql::open();

        $query = "CALL pr_GetAssignmentById($id);";
        $result = Mysql::query($query);
        $assignments = array();
        while ($row = Mysql::get_row_array($result)) {
            array_push($assignments, $row);
        }
        Mysql::close();
        return json_encode($assignments);
    }
    
}