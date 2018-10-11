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
    
    public function __construct($nomCli,$prenomCli,$rueCli,$cpCli,$villeCli){
        $this-> nomCli = $nomCli;
        $this-> prenomCli = $prenomCli;
        $this-> rueCli = $rueCli;
        $this-> cpCli = $cpCli;
        $this-> villeCli = $villeCli;
    }
    
    function getId() {return $this->idCli;}
    function getNom() {return $this->nomCli;}
    function getPrenom() {return $this->prenomCli;}
    function getRue() {return $this->rueCli;}
    function getCp() {return $this->cpCli;}
    function getVille() {return $this->villeCli;}

    function setId($idCli) {$this->idCli = $idCli;}
    function setNom($nomCli) {$this->nomCli = $nomCli;}
    function setPrenom($prenomCli) {$this->prenomCli = $prenomCli;}
    function setRue($rueCli) {$this->rueCli = $rueCli;}
    function setCp($cpCli) {$this->cpCli = $cpCli;}
    function setVille($villeCli) {$this->villeCli = $villeCli;}



    
}
