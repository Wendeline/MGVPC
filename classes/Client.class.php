<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Client
 *
 * @author etudiant
 */
class Client {
    //put your code here
    
    private $idCli;
    private $nomCli;
    private $prenomCli;
    private $rueCli;
    private $cpCli;
    private $villeCli;
    
    public function __construct($idCli,$nomCli,$prenomCli,$rueCli,$cpCli,$villeCli){
        $this-> idCli = $idCli;
        $this-> nomCli = $nomCli;
        $this-> prenomCli = $prenomCli;
        $this-> rueCli = $rueCli;
        $this-> cpCli = $cpCli;
        $this-> villeCli = $villeCli;
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
