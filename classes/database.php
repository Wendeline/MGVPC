<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of database
 *
 * @author etudiant
 */
class database {
    //put your code here
    private $serverName="172.16.220.20";
    private $serverPort="3128";
    private $databaseName="MGVPC";
    private $databaseUser="adminer";
    private $databasePassword="RootRoot123";
    private $databaseCharset="UTF8";
    
    //Attribut de type instance de PDO
    private $db=null;
    
    private function __construct()
    {        
        $serverName = $this->serverName;
        $databasePort = $this->serverPort;
        $databaseName = $this->databaseName;
        $databaseUser = $this->databaseUser;
        $databasePassword = $this->databasePassword;
        $databaseCharset = $this->databaseCharset;
                
        if (!isset($this->db))
        {
            $this->db = new PDO('mysql:host='.$serverName.';port='.$databasePort.';dbname='.$databaseName.';charset='.$databaseCharset, $databaseUser, $databasePassword);
        }
    }
/**
 * 
 * Récupère une connexion à la base de données
 * 
 * 
 * @staticvar   database    $database
 * @return      PDO         Connexion PDO à la base de données
 */
    public static function getDB()
    {
        static $database = null;
        if (!isset($database))
        {
            $database = new database();
        }
        return $database->db;
    }
}
