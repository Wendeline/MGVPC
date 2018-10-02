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
    
    public function __get($prop){
        if (property_exists($this, $prop)){
            return $this->$prop;
        }
    }
    
    public function __set($prop, $val) {
        if(property_exists($this, $prop)){
            $this->$prop = $val; 
        }
    }

}
