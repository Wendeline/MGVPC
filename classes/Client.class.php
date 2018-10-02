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
    
    function getIdCli() {
        return $this->idCli;}
    function getNomCli() {
        return $this->nomCli;}
    function getPrenomCli() {
        return $this->prenomCli;}
    function getRueCli() {
        return $this->rueCli;}
    function getCpCli() {
        return $this->cpCli;}
    function getVilleCli() {
        return $this->villeCli;}

    function setIdCli($idCli) {
        $this->idCli = $idCli;}
    function setNomCli($nomCli) {
        $this->nomCli = $nomCli;}
    function setPrenomCli($prenomCli) {
        $this->prenomCli = $prenomCli;}
    function setRueCli($rueCli) {
        $this->rueCli = $rueCli;}
    function setCpCli($cpCli) {
        $this->cpCli = $cpCli;}
    function setVilleCli($villeCli) {
        $this->villeCli = $villeCli;}


    
}
