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
require_once("database.php");

class FonctionManager {
    //put your code here
    private $db;
    public function __construct($database){
        $this->db=$database;
    }
    
    public function save(Fonction $fo){        
        $nbRows = 0;
        if ($fo->getId()!=''){
            $query = "select count(*) as nb from `fonction` where `idF`=?";
            $traitement = $this->db->prepare($query);
            $param1=$fo->getId();
            $traitement->bindparam(1,$param1);
            $traitement->execute();
            $ligne = $traitement->fetch();
            $nbRows=$ligne[0];
        }
        if ($nbRows > 0){ 
            $query = "update `fonction` set `nomF`=? where `idF`=?";
            $traitement = $this->db->prepare($query);
            $param1=$fo->getNom();
            $traitement->bindparam(1,$param1);
            $param2=$fo->getId();
            $traitement->bindparam(2,$param2);
            $traitement->execute();
        }else{ 
            $query = "insert into `fonction` (`nomF`) values (?)";
            $traitement = $this->db->prepare($query);
            $param1=$fo->getNom();
            $traitement->bindparam(1,$param1);  
            $traitement->execute();
        }
    }
    
    public function delete(Fonction $fo){
        $nbRows = 0;
        if ($fo->getId()!=''){                    
            $query = "select count(*) as nb from `fonction` where `idF`=?";
            $traitement = $this->db->prepare($query);
            $param1 = $fo->getId();
            $traitement->bindparam(1,$param1);
            $traitement->execute();
            $ligne = $traitement->fetch();
            $nbRows=$ligne[0];
        }if ($nbRows > 0){
            $query = "delete from `fonction` where `idF`=?";
            $traitement = $this->db->prepare($query);
            $param1 = $fo->getId();
            $traitement->bindparam(1,$param1);
            $traitement->execute();            
            return true;
        }else {
            return false;
        }
    }
    
    public function getList($restriction='WHERE 1'){
        $query = "select * from `fonction` ".$restriction."";
        $foList = Array();
        try{
            $result = $this->db->Query($query);
            while ($row = $result->fetch()){
                $fonction = new Fonction($row['nomF']);
                $fonction->setId($row['idF']);
                $foList[] = $fonction;
            }
            return $foList;
        }catch(PDOException $e){
            die ("Erreur : ".$e->getMessage());
        }   
    }
    
    public function get($id){
        $query = "select * from `fonction` WHERE `idF`=?";
        try{
            $traitement = $this->db->prepare($query);
            $traitement->bindparam(1,$id);
            $traitement->execute();
        }catch(PDOException $e){
            die ("Erreur : ".$e->getMessage());
        }
        $row = $traitement->fetch();
        $fonction = new Fonction($row['nomF']);
        $fonction->setId($row['idF']);
        return $fonction;    
    }
}
