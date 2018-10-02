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
