<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Produit
 *
 * @author etudiant
 */
require_once("database.class.php");

class ProduitManager {
    //put your code here
    private $db;
    public function __construct($database){
        $this->db=$database;
    }
    
    public function save(Produit $prod){        
        $nbRows = 0;
        if ($prod->getId()!=''){
            $query = "select count(*) as nb from `produit` where `idP`=?";
            $traitement = $this->db->prepare($query);
            $param1=$prod->getId();
            $traitement->bindparam(1,$param1);
            $traitement->execute();
            $ligne = $traitement->fetch();
            $nbRows=$ligne[0];
        }
        if ($nbRows > 0){ 
            $query = "update `produit` set `libProd`=?, `descProd`=?, `prixProd`=?,`stockProd`=?, `emplacementProd`=? where `idP`=?";
            $traitement = $this->db->prepare($query);
            $param1=$prod->getLib();
            $traitement->bindparam(1,$param1);
            $param2=$prod->getDesc();
            $traitement->bindparam(2,$param2);
            $param3=$prod->getPrix();
            $traitement->bindparam(3,$param3);
            $param4=$prod->getStock();
            $traitement->bindparam(4,$param4);
            $param5=$prod->getEmplacement();
            $traitement->bindparam(5,$param5);
            $param6=$prod->getId();
            $traitement->bindparam(6,$param6);
            $traitement->execute();
        }else{ 
            $query = "insert into `produit` (`libProd`,`descProd`,`prixProd`, `stockProd`,`emplacementProd`) "
                    . "values (?,?,?,?,?)";
            $traitement = $this->db->prepare($query);
            $param1=$prod->getLib();
            $traitement->bindparam(1,$param1);
            $param2=$prod->getDesc();
            $traitement->bindparam(2,$param2);
            $param3=$prod->getPrix();
            $traitement->bindparam(3,$param3);
            $param4=$prod->getStock();
            $traitement->bindparam(4,$param4);
            $param5=$prod->getEmplacement();
            $traitement->bindparam(5,$param5);   
            $traitement->execute();
        }
    }
    
    public function delete(Produit $prod){
        $nbRows = 0;
        if ($prod->getId()!=''){                    
            $query = "select count(*) as nb from `produit` where `idP`=?";
            $traitement = $this->db->prepare($query);
            $param1 = $prod->getId();
            $traitement->bindparam(1,$param1);
            $traitement->execute();
            $ligne = $traitement->fetch();
            $nbRows=$ligne[0];
        }if ($nbRows > 0){
            $query = "delete from `produit` where `idP`=?";
            $traitement = $this->db->prepare($query);
            $param1 = $prod->getId();
            $traitement->bindparam(1,$param1);
            $traitement->execute();            
            return true;
        }else {
            return false;
        }
    }
    
    public function getList($restriction='WHERE 1'){
        $query = "select * from `produit` ".$restriction."";
        $prodList = Array();
        try{
            $result = $this->db->Query($query);
            while ($row = $result->fetch()){
                $produit = new Produit($row['libProd'],$row['descProd'],$row['prixProd'],$row['stockProd'],$row['emplacementProd']);
                $produit->setId($row['idP']);
                $prodList[] = $produit;
            }
            return $prodList;
        }catch(PDOException $e){
            die ("Erreur : ".$e->getMessage());
        }   
    }
    
    public function get($id){
        $query = "select * from `produit` WHERE `idP`=?";
        try{
            $traitement = $this->db->prepare($query);
            $traitement->bindparam(1,$id);
            $traitement->execute();
        }catch(PDOException $e){
            die ("Erreur : ".$e->getMessage());
        }
        $row = $traitement->fetch();
        $produit = new Produit($row['libProd'],$row['descProd'],$row['prixProd'],$row['stockProd'],$row['emplacementProd']);
        $produit->setId($row['idP']);
        return $produit;    
    }
}
