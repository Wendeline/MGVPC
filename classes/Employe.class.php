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
