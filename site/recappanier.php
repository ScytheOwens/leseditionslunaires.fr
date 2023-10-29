<?php require 'header.php';?>
	<main>
		<section class=alaune>
            <article>
                <h1>Votre panier</h1>
                <?php $fdp = FALSE;?>
                <p> <?php echo $fdp;?> </p>
                <form method="post" action="recappanier.php">
                <table id="panier">
                <thead>
                    <th scope="col">Produit</th>
                    <th scope="col">Quantit&eacute;</th>
                    <th scope="col">Sous-total</th>
                </thead>

                <?php
                if (creationPanier()){
                    $nbProduits = count($_SESSION['panier']['produit']);
                    
                    if($nbProduits <= 0)
                        echo "<tr><td>Votre panier est vide</td></tr>";
                    else{
                        
                        for($i=0; $i < $nbProduits ; $i++){
                            echo "<tr>";
                            echo "<td>".$_SESSION['panier']['produit'][$i]. "</td>";
                            echo "<td>".$_SESSION['panier']['quantite'][$i]."</td>";
                            echo "<td>".$_SESSION['panier']['prix'][$i]*$_SESSION['panier']['quantite'][$i]."&euro;</td>";
                            echo "</tr>";
                            
                        }
                        echo "<tr><th colspan='2'>Total :</th>";
                        echo "<td>".total()."&euro;</td>";
                        echo "</tr>";
                        echo "<tr><td colspan='2'>frais de port</td>";
                        echo "<td>0.01&euro;</td></tr>";
                        $grandtotal = total() + 0.01;
                        echo "<tfoot><th colspan='2'>Total &agrave; payer</th><td>".$grandtotal."</td></tfoot>";
                    }
                }
                ?>
                </table>
                <?php if($nbProduits!=0){
                    echo '<input type="submit" value="commander">';
                }?>
                </form>
            </article>
	</main>
<?php require 'footer.php';?>