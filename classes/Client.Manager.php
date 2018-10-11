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
require_once("database.php");

class ClientManager {
    //put your code here
    private $db;
    public function __construct($database){
        $this->db=$database;
    }
    
    public function save(Client $cli){        
        $nbRows = 0;
        if ($cli->getId()!=''){
            $query = "select count(*) as nb from `client` where `idCli`=?";
            $traitement = $this->db->prepare($query);
            $param1=$cli->getId();
            $traitement->bindparam(1,$param1);
            $traitement->execute();
            $ligne = $traitement->fetch();
            $nbRows=$ligne[0];
        }
        if ($nbRows > 0){ 
            $query = "update `client` set `nomCli`=?, `prenomCli`=?, `rueCli`=?,`cpCli`=?, `villeCli`=? where `idCli`=?";
            $traitement = $this->db->prepare($query);
            $param1=$cli->getNom();
            $traitement->bindparam(1,$param1);
            $param2=$cli->getPrenom();
            $traitement->bindparam(2,$param2);
            $param3=$cli->getRue();
            $traitement->bindparam(3,$param3);
            $param4=$cli->getCp();
            $traitement->bindparam(4,$param4);
            $param5=$cli->getVille();
            $traitement->bindparam(5,$param5);
            $param6=$cli->getId();
            $traitement->bindparam(6,$param6);
            $traitement->execute();
        }else{ 
            $query = "insert into `client` (`nomCli`,`prenomCli`,`rueCli`, `cpCli`,`villeCli`) "
                    . "values (?,?,?,?,?)";
            $traitement = $this->db->prepare($query);
            $param1=$cli->getNom();
            $traitement->bindparam(1,$param1);
            $param2=$cli->getPrenom();
            $traitement->bindparam(2,$param2);
            $param3=$cli->getRue();
            $traitement->bindparam(3,$param3);
            $param4=$cli->getCp();
            $traitement->bindparam(4,$param4);
            $param5=$cli->getVille();
            $traitement->bindparam(5,$param5);            
            $traitement->execute();
        }
    }
    
    public function delete(Client $cli){
        $nbRows = 0;
        if ($cli->getId()!=''){                    
            $query = "select count(*) as nb from `client` where `idCli`=?";
            $traitement = $this->db->prepare($query);
            $param1 = $cli->getId();
            $traitement->bindparam(1,$param1);
            $traitement->execute();
            $ligne = $traitement->fetch();
            $nbRows=$ligne[0];
        }if ($nbRows > 0){
            $query = "delete from `client` where `idCli`=?";
            $traitement = $this->db->prepare($query);
            $param1 = $cli->getId();
            $traitement->bindparam(1,$param1);
            $traitement->execute();            
            return true;
        }else {
            return false;
        }
    }
    
    public function getList($restriction='WHERE 1'){
        $query = "select * from `client` ".$restriction."";
        $cliList = Array();
        try{
            $result = $this->db->Query($query);
            while ($row = $result->fetch()){
                $client = new Client($row['nomCli'],$row['prenomCli'],$row['rueCli'],$row['cpCli'],$row['villeCli']);
                $client->setId($row['idCli']);
                $cliList[] = $client;
            }
            return $cliList;
        }catch(PDOException $e){
            die ("Erreur : ".$e->getMessage());
        }   
    }
    
    public function get($id){
        $query = "select * from `client` WHERE `idCli`=?";
        try{
            $traitement = $this->db->prepare($query);
            $traitement->bindparam(1,$id);
            $traitement->execute();
        }catch(PDOException $e){
            die ("Erreur : ".$e->getMessage());
        }
        $row = $traitement->fetch();
        $client = new Client($row['nomCli'],$row['prenomCli'],$row['rueCli'],$row['cpCli'],$row['villeCli']);
        $client->setId($row['idCli']);
        return $client;    
    }
}
