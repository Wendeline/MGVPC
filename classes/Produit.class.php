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
    
    public function __construct($libProd,$descProd,$prixProd,$stockProd,$emplacementProd){
        $this-> libProd = $libProd;
        $this-> descProd = $descProd;
        $this-> prixProd = $prixProd;
        $this-> stockProd = $stockProd;
        $this-> emplacementProd = $emplacementProd;
    }
    
    function getId() {return $this->idProd;}
    function getLib() {return $this->libProd;}
    function getDesc() {return $this->descProd;}
    function getPrix() {return $this->prixProd;}
    function getStock() {return $this->stockProd;}
    function getEmplacement() {return $this->emplacementProd;}

    function setId($idProd) {$this->idProd = $idProd;}
    function setLib($libProd) {$this->libProd = $libProd;}
    function setDesc($descProd) {$this->descProd = $descProd;}
    function setPrix($prixProd) {$this->prixProd = $prixProd;}
    function setStock($stockProd) {$this->stockProd = $stockProd;}
    function setEmplacement($emplacementProd) {$this->emplacementProd = $emplacementProd;}
 


}
