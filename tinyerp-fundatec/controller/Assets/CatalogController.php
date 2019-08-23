<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once '../../../utilities/utilities.php';
require_once '../../model/assets/MCatalog.php';

class CatalogController extends controller {

    function __construct() {
        parent::__construct(MODULO_ASSETS);
        Sesion::open();
        $this->verifyActiveSession();
        $this->loadModelAssbets("MCatalog");
    }

    public function procesar() {
        $action = $this->getAction();

        switch ($action) {
             case 'getAllCategoryAssest': {
                    $mCatalog = new MCatalog();
                    $getCategoryAssestResp = $mCatalog->getAllCategoryAssest();
                    echo ($getCategoryAssestResp);
                    break;
                }
            default :
                echo "";
                break;
        }
    }
}