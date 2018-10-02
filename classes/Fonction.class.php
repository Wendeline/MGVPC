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
    
    public function __construct($idF,$nomF){
        $this-> idF = $idF;
        $this-> nomF = $nomF;
    }
    
    function getIdF() {
        return $this->idF;
    }
    function getNomF() {
        return $this->nomF;
    }

    function setIdF($idF) {
        $this->idF = $idF;
    }
    function setNomF($nomF) {
        $this->nomF = $nomF;
    }


}
