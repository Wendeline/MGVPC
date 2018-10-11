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
        
    public function __construct($nomEmp,$prenomEmp,$fonction){
        $this-> nomEmp = $nomEmp;
        $this-> prenomEmp = $prenomEmp;
        $this-> fonction = $fonction;
    }
    
    function getId() {return $this->idEmp;}
    function getNom() {return $this->nomEmp;}
    function getPrenom() {return $this->prenomEmp;}
    function getFonction() {return $this->fonction;}

    function setId($idEmp) {$this->idEmp = $idEmp;}
    function setNom($nomEmp) {$this->nomEmp = $nomEmp;}
    function setPrenom($prenomEmp) {$this->prenomEmp = $prenomEmp;}
    function setFonction($fonction) {$this->fonction = $fonction;}



    
}
