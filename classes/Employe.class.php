<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Employe
 *
 * @author etudiant
 */
class Employe {
    //put your code here
    
    //idEmp, nomEmp, prenomEmp, objet fonction
    
     private $idEmp;
    private $nomEmp;
    private $prenomEmp;
    
    private $fonction;
        
    public function __construct($idEmp,$nomEmp,$prenomEmp,$fonction){
        $this-> idEmp = $idEmp;
        $this-> nomEmp = $nomEmp;
        $this-> prenomEmp = $prenomEmp;
        $this-> fonction = $fonction;
    }
    
    function getIdEmp() {
        return $this->idEmp;
    }
    function getNomEmp() {
        return $this->nomEmp;
    }
    function getPrenomEmp() {
        return $this->prenomEmp;
    }
    function getFonction() {
        return $this->fonction;
    }
    
    function setIdEmp($idEmp) {
        $this->idEmp = $idEmp;
    }
    function setNomEmp($nomEmp) {
        $this->nomEmp = $nomEmp;
    }
    function setPrenomEmp($prenomEmp) {
        $this->prenomEmp = $prenomEmp;
    }
    function setFonction($fonction) {
        $this->fonction = $fonction;
    }


    
}
