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
require_once("database.php");

class EmployeManager {
    //put your code here
    private $db;
    public function __construct($database){
        $this->db=$database;
    }
    
    public function save(Employe $emp){        
        $nbRows = 0;
        if ($emp->getId()!=''){
            $query = "select count(*) as nb from `employe` where `idEmp`=?";
            $traitement = $this->db->prepare($query);
            $param1=$emp->getId();
            $traitement->bindparam(1,$param1);
            $traitement->execute();
            $ligne = $traitement->fetch();
            $nbRows=$ligne[0];
        }
        if ($nbRows > 0){ 
            $query = "update `employe` set `nomEmp`=?, `prenomEmp`=?, `fonction`=? where `idEmp`=?";
            $traitement = $this->db->prepare($query);
            $param1=$emp->getNom();
            $traitement->bindparam(1,$param1);
            $param2=$emp->getPrenom();
            $traitement->bindparam(2,$param2);
            $param3=$emp->getFonction();
            $traitement->bindparam(3,$param3);
            $param4=$emp->getId();
            $traitement->bindparam(4,$param4);
            $traitement->execute();
        }else{ 
            $query = "insert into `employe` (`nomEmp`,`prenomEmp`,`fonction`) values (?,?,?)";
            $traitement = $this->db->prepare($query);
            $param1=$emp->getNom();
            $traitement->bindparam(1,$param1);
            $param2=$emp->getPrenom();
            $traitement->bindparam(2,$param2);
            $param3=$emp->getFonction();
            $traitement->bindparam(3,$param3);
            $traitement->execute();
        }
    }
    
    public function delete(Employe $emp){
        $nbRows = 0;
        if ($emp->getId()!=''){                    
            $query = "select count(*) as nb from `employe` where `idEmp`=?";
            $traitement = $this->db->prepare($query);
            $param1 = $emp->getId();
            $traitement->bindparam(1,$param1);
            $traitement->execute();
            $ligne = $traitement->fetch();
            $nbRows=$ligne[0];
        }if ($nbRows > 0){
            $query = "delete from `employe` where `idEmp`=?";
            $traitement = $this->db->prepare($query);
            $param1 = $emp->getId();
            $traitement->bindparam(1,$param1);
            $traitement->execute();            
            return true;
        }else {
            return false;
        }
    }
    
    public function getList($restriction='WHERE 1'){
        $query = "select * from `employe` ".$restriction."";
        $empList = Array();
        try{
            $result = $this->db->Query($query);
            while ($row = $result->fetch()){
                $employe = new Employe($row['nomEmp'],$row['prenomEmp'],$row['fonction']);
                $employe->setId($row['idEmp']);
                $empList[] = $employe;
            }
            return $empList;
        }catch(PDOException $e){
            die ("Erreur : ".$e->getMessage());
        }   
    }
    
    public function get($id){
        $query = "select * from `employe` WHERE `idEmp`=?";
        try{
            $traitement = $this->db->prepare($query);
            $traitement->bindparam(1,$id);
            $traitement->execute();
        }catch(PDOException $e){
            die ("Erreur : ".$e->getMessage());
        }
        $row = $traitement->fetch();
        $employe = new Employe($row['nomEmp'],$row['prenomEmp'],$row['fonction']);
        $employe->setId($row['idEmp']);
        return $employe;    
    }
}
