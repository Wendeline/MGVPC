<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        include 'classes/Client.class.php';
        include 'classes/Produit.class.php';
        include 'classes/Commande.class.php';
        include 'classes/Fonction.class.php';
        include 'classes/Employe.class.php';
        
        $client1 = new client(1,"Dussart","Jean","rue Saint-Gilles",80100,"Abbeville");
        $produit1 = new produit(1,"PRS S2 Mira","Perfect match for blues and rock",1249.50,200,"E51");
        $produit2 = new produit(2,"Guild Starfire IV","the top of your double-cut shopping list.",1049,50,"A62");
        echo'<pre>';
            var_dump($produit1);
            echo '</pre><pre>';
            var_dump($produit2);
            echo '</pre><pre>';
            var_dump($client1);
            echo '</pre>';
        $commande1 = new commande(1,$client1);
            $commande1-> produits = [$produit1,$produit2];
            $commande1-> quantites = [2,6];
        $produit1->stockProd = 200-2;
        $produit2->stockProd = 50-6;
        echo '<pre>';
            var_dump($commande1);
        echo '</pre>';
        
        $fonction1 = new fonction(1,"agent de manufaction");
        $employe1 = new employe(1,"Crapeaud","Edouard",$fonction1);
        echo '<pre>';
            var_dump($employe1);
        echo '</pre>';
        ?>
    </body>
</html>
