<?php require 'header.php'; 
    $erreur = false;

    $action = (isset($_POST['action'])? $_POST['action']: (isset($_GET['action'])? $_GET['action']:null )) ;
        if($action !== null){
            if(!in_array($action,array('ajout', 'suppression')))
            $erreur=true;

            $l = (isset($_POST['l'])? $_POST['l']: (isset($_GET['l'])? $_GET['l']:null )) ;
            $p = (isset($_POST['p'])? $_POST['p']:null ) ;
            $q = (isset($_POST['q'])? $_POST['q']:null ) ;
            $l = preg_replace('#\v#', '',$l);
            $p = floatval($p);
    
            if (is_array($q)){
                $QteArticle = array();
                $i=0;
                foreach ($q as $contenu){
                    $QteArticle[$i++] = intval($contenu);
                }
            }else{
                $q = intval($q);
            }

            if (!$erreur){
                switch($action){
                    Case "ajout":
                        if ($p < 6){
                            $l = $l." ePub";
                        }else{
                            $l = $l." broch&eacute;";
                        }
                        addProduit($l,$q,$p);
                    break;

                    Case "suppression":
                        suppProduit($l);
                    break;

                    Default:
                    break;
                }
            }
        }
?>
    <main>
        <section class=alaune>
            <article>
                <h1>Votre panier</h1>
                <?php if(isset($_SESSION['errors'])): ?>
                    <p id="erreur"> <?php echo $_SESSION['errors']; ?> </p>
                <?php endif; unset($_SESSION['errors']); ?>
                    
                <form method="post" action="livraison.php">
                <table id="panier">
                <thead>
                    <th></th>
                    <th scope="col">Produit</th>
                    <th scope="col">Quantit&eacute;</th>
                    <th scope="col">Sous-total</th>
                </thead>

                <?php
                if (creationPanier()){
                    unset($_SESSION['commande']['produits']);
                    $nbProduits = count($_SESSION['panier']['produit']);
                    
                    if($nbProduits <= 0)
                        echo "<tr><td>Votre panier est vide</td></tr>";
                    else{
                        for($i=0; $i < $nbProduits ; $i++){
                            echo "<tr>";
                            echo "<td><a href='panier.php?action=suppression&l=".rawurlencode($_SESSION['panier']['produit'][$i])."'>[x]</a></td>";
                            echo "<td>".$_SESSION['panier']['produit'][$i]. "</td>";
                            echo "<td>".$_SESSION['panier']['quantite'][$i]."</td>";
                            echo "<td>".$_SESSION['panier']['prix'][$i]*$_SESSION['panier']['quantite'][$i]."&euro;</td>";
                            echo "</tr>";
                        }

                        foreach($_SESSION['panier']['produit'] as $produit){
                            $i = 0;
                            $liste = $_SESSION['panier']['quantite'][$i]." ".$produit.", ";
                            $i++;
                            $check = 'broch&eacute';
                            if(strpos($produit,$check)>0){
                                $fdp = 1;
                            }
                        }
                        $_SESSION['liste'] = $liste;
                        
                        if(isset($fdp)){
                            echo "<tr><th colspan='3'>Frais de port</th><td>".$fdp."&euro;</td></tr>";
                        }
                        echo "<tfoot><th colspan='3'>Total :</th>";
                        $_SESSION['total'] = total()+$fdp;
                        echo "<td>".$_SESSION['total']."&euro;</td>";
                        echo "</tfoot>";
                    }
                }
                ?>
                </table>
                <?php if($nbProduits!=0):?>
                    <input type="checkbox" name="cgv" value="cgv">
                    <label for="cgv">J&apos;accepte les <a href="cgv.php" title="consulter les cgv">Conditions G&eacute;n&eacute;rales de Vente</a>*</label></br>
                    <input type="submit" value="commander">
                <?php endif; ?>
                </form>
            </article>
        </section>
    </main>

    <?php include('footer.php'); ?>