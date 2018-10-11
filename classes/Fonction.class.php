<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Fonction
 *
 * @author etudiant
 */
class Fonction {
    //put your code here
    
    private $idF;
    private $nomF;
    
    public function __construct($nomF){
        $this-> nomF = $nomF;
    }
    
    function getId() {return $this->idF;}
    function getNom() {return $this->nomF;}

    function setId($idF) {$this->idF = $idF;}
    function setNom($nomF) {$this->nomF = $nomF;}

}
