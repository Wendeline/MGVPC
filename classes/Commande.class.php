<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Commande
 *
 * @author etudiant
 */
class Commande {
    //put your code here
        
    private $numCde;
    private $dateCde;
    private $etatCde;
    
    private $client;
    protected $produits=array();
    protected $quantites=array();
        
    public function __construct($numCde,$client){
        $this-> numCde = $numCde;
        $this-> dateCde = date("Y-m-d");
        $this-> etatCde = "en attente";
        $this-> client = $client;
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
   

    public function addProduit($prod){
        if (isset($this->quantites[$prod->id])){
            $this->quantites[$prod->id] += 1;
        }else{
            array_push($this->produits,$prod);
            $this->quantites[$prod->id] = 1;
        }
    }
    
}
