<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once '../../../utilities/utilities.php';

class MCatalog{
 public function getAllCategoryAssest() {
        /**
         * Método que obtiene de base de datos el catalogo de categorias de activos
         */
        Mysql::open();
        $query = "CALL pr_GetAllCategoryAssest();";
        $categories = array();
        $result = Mysql::query($query);
        while ($row = Mysql::get_row_array($result)) {
            array_push($categories, $row);
        }
        Mysql::close();
        return $categories;
    }
    
   public function getAllProviders() {
        /**
         * Método que obtiene de base de datos el catalogo de proveedores de activos
         */
        Mysql::open();
        $query = "CALL pr_getAllProviders();";
        $providers = array();
        $result = Mysql::query($query);
        while ($row = Mysql::get_row_array($result)) {
            array_push($providers, $row);
        }
        Mysql::close();
        return $providers;
    }
}