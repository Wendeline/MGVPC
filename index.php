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
        include 'classes/Client.Manager.php'; //fonctionne
        include 'classes/Produit.class.php';
        include 'classes/Produit.Manager.php'; //fonctionne
        //include 'classes/Commande.class.php';
        //include 'classes/Commande.Manager.php';
        include 'classes/Fonction.class.php';
        include 'classes/Fonction.Manager.php';
        include 'classes/Employe.class.php';
        include 'classes/Employe.Manager.php';
        
        echo "<br><br>TEST DE LA CLASSE BIDULE <br>"; 
            echo "------------------------------------------------";
            $managerU = new ProduitManager(database::getDB());
            echo"<pre>";
                var_dump ($managerU->getList());
            echo '</pre><pre>';
                var_dump ($managerU->getList("WHERE idProd<20"));
            echo '</pre><pre>';
                var_dump ($managerU->get(14));
            echo '</pre>';
            $UTest = new Produit("LibSuper", "DescGeniale", 5000, 50, "E2.2");
            
            echo '<pre>';
                var_dump ($managerU->save($UTest));
            echo '</pre>';
            
            $UTest->setId(27);
            $UTest->setLib("NomGenial");
            echo '<pre>';
                var_dump ($managerU->save($UTest));
            echo '</pre>';
            var_dump ($managerU->delete($UTest));
            $UTest->setId(28);
            echo '<pre>';
                var_dump ($managerU->delete($UTest));
            echo '</pre>';
        ?>
    </body>
</html>
