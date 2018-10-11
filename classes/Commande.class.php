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
    private $produits=array();
    private $quantites=array();
        
    public function __construct($numCde,$client){
        $this-> numCde = $numCde;
        $this-> dateCde = date("Y-m-d");
        $this-> etatCde = "en attente";
        $this-> client = $client;
    }
       
    function getNumCde()    {return $this->numCde;}
    function getDateCde()   {return $this->dateCde;}
    function getEtatCde()   {return $this->etatCde;}
    function getClient()    {return $this->client;}
    function getProduits()  {return $this->produits;}
    function getQuantites() {return $this->quantites;}
    
    function setNumCde($numCde)         {$this->numCde      = $numCde;}
    function setDateCde($dateCde)       {$this->dateCde     = $dateCde;}
    function setEtatCde($etatCde)       {$this->etatCde     = $etatCde;}
    function setClient($client)         {$this->client      = $client;}
    function setProduits($produits)     {$this->produits    = $produits;}
    function setQuantites($quantites)   {$this->quantites   = $quantites;}


    public function addProduit($prod){
        if (isset($this->quantites[$prod->id])){
            $this->quantites[$prod->id] += 1;
        }else{
            array_push($this->produits,$prod);
            $this->quantites[$prod->id] = 1;
        }
    }
    
}
