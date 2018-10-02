<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Produit
 *
 * @author etudiant
 */
class Produit {
    //put your code here
    
    private $idProd;
    private $libProd;
    private $descProd;
    private $prixProd;
    private $stockProd;
    private $emplacementProd;
    
    public function __construct($idProd,$libProd,$descProd,$prixProd,$stockProd,$emplacementProd){
        $this-> idProd = $idProd;
        $this-> libProd = $libProd;
        $this-> descProd = $descProd;
        $this-> prixProd = $prixProd;
        $this-> stockProd = $stockProd;
        $this-> emplacementProd = $emplacementProd;
    }
    
    function getIdProd() {
        return $this->idProd;
    }
    function getLibProd() {
        return $this->libProd;
    }
    function getDescProd() {
        return $this->descProd;
    }
    function getPrixProd() {
        return $this->prixProd;
    }
    function getStockProd() {
        return $this->stockProd;
    }
    function getEmplacementProd() {
        return $this->emplacementProd;
    }

    function setIdProd($idProd) {
        $this->idProd = $idProd;
    }
    function setLibProd($libProd) {
        $this->libProd = $libProd;
    }
    function setDescProd($descProd) {
        $this->descProd = $descProd;
    }
    function setPrixProd($prixProd) {
        $this->prixProd = $prixProd;
    }
    function setStockProd($stockProd) {
        $this->stockProd = $stockProd;
    }
    function setEmplacementProd($emplacementProd) {
        $this->emplacementProd = $emplacementProd;
    }

}
