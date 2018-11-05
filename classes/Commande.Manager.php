<?php
require_once("database.php");

class CommandeManager {
    //put your code here
    private $db;
    public function __construct($database){
        $this->db=$database;
    }
    
    public function save(Commande $commande){        
        $nbRows = 0;
        if ($commande->getId()!=''){
            $query = "select count(*) as nb from `commande` where `numCde`=?";
            $traitement = $this->db->prepare($query);
            $param1=$commande->getId();
            $traitement->bindparam(1,$param1);
            $traitement->execute();
            
            $ligne = $traitement->fetch();
            $nbRows=$ligne[0];
        }
        if ($nbRows > 0){
        	
	    	$query = "update `commande` set `dateCde`=?, `etatCde`=?, `idCli`=? where `idcommande`=?";
            $traitement = $this->db->prepare($query);
            $param1=$commande->getDateCde();
            $traitement->bindparam(1,$param1);
            $param2=$commande->getEtatCde();
            $traitement->bindparam(2,$param2);
            $param3=$commande->getClient();
            $traitement->bindparam(3,$param3);
            $param4=$commande->getStock();

            $traitement->bindparam(4,$param4);
            $param5=$commande->getEmplacement();
            $traitement->bindparam(5,$param5);
            $param6=$commande->getId();
            $traitement->bindparam(6,$param6);
            $traitement->execute();







            $listProduit =  $commande->getProduits();
            $listQuantit =  $commande->getQuantites();

            foreach ($listProduit as $key => $rowProduit) {
                if ($listProduit->getId()!= ''){
                    $query = "SELECT count(*) as nb from `comporter` where `numCde`=? AND `idProd`";
                    $traitement = $this->db->prepare($query);

                    $param1=$listProduit->getId();
                    $param2=$listProduit->getId();

                    $traitement->bindparam(1,$param1);
                    $traitement->bindparam(2,$param2);
                    $traitement->execute();
                    
                    $ligne  = $traitement->fetch();
                    $nbRows = $ligne[0];
                }
                if ($nbRows > 0){
                }
            }       
        }else{ 
            $query = "insert into `commande` (``,``,``, ``,``) values (?,?,?,?,?)";
            $traitement = $this->db->prepare($query);
            $param1=$commande->getLib();
            $traitement->bindparam(1,$param1);
            $param2=$commande->getDesc();
            $traitement->bindparam(2,$param2);
            $param3=$commande->getPrix();
            $traitement->bindparam(3,$param3);
            $param4=$commande->getStock();
            $traitement->bindparam(4,$param4);
            $param5=$commande->getEmplacement();
            $traitement->bindparam(5,$param5);   
            $traitement->execute();
        }
    }
    
    public function delete(commandeuit $commande){
        $nbRows = 0;
        if ($commande->getId()!=''){                    
            $query = "select count(*) as nb from `commandeuit` where `idcommande`=?";
            $traitement = $this->db->prepare($query);
            $param1 = $commande->getId();
            $traitement->bindparam(1,$param1);
            $traitement->execute();
            $ligne = $traitement->fetch();
            $nbRows=$ligne[0];
        }if ($nbRows > 0){
            $query = "delete from `commandeuit` where `idcommande`=?";
            $traitement = $this->db->prepare($query);
            $param1 = $commande->getId();
            $traitement->bindparam(1,$param1);
            $traitement->execute();            
            return true;
        }else {
            return false;
        }
    }
    
    public function getList($restriction='WHERE 1'){
        $query = "select * from `commandeuit` ".$restriction."";
        $commandeList = Array();
        try{
            $result = $this->db->Query($query);
            while ($row = $result->fetch()){
                $commandeuit = new commandeuit($row['libcommande'],$row['desccommande'],$row['prixcommande'],$row['stockcommande'],$row['emplacementcommande']);
                $commandeuit->setId($row['idcommande']);
                $commandeList[] = $commandeuit;
            }
            return $commandeList;
        }catch(PDOException $e){
            die ("Erreur : ".$e->getMessage());
        }   
    }
    
    public function get($id){
        $query = "select * from `commandeuit` WHERE `idcommande`=?";
        try{
            $traitement = $this->db->prepare($query);
            $traitement->bindparam(1,$id);
            $traitement->execute();
        }catch(PDOException $e){
            die ("Erreur : ".$e->getMessage());
        }
        $row = $traitement->fetch();
        $commandeuit = new commandeuit($row['libcommande'],$row['desccommande'],$row['prixcommande'],$row['stockcommande'],$row['emplacementcommande']);
        $commandeuit->setId($row['idcommande']);
        return $commandeuit;    
    }
}