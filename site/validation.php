<?php require 'header.php';?>

<main>
<section class="alaune">
	<?php if(isset($_SESSION['validation'])): ?>
		<h1><?php echo $_SESSION['commande']['prenom'];?>, nous avons bien re&ccedil;u votre commande, restez &agrave; l&apos;aff&ucirc;t de vos mails.</h1>
		<?php 
		foreach($_SESSION['panier']['produit'] as $produit){
			$check = 'ePub';
			if(strpos($produit,$check)>0){
				$version = strrpos($produit, " ");
				$name = substr($produit, 0, $version);
				echo "<button class='telecharger'><a href='download.php?file=".$name."' title='T&eacute;l&eacute;charger le livre num&eacute;rique'>T&eacute;l&eacute;charger ".$name."</button>";
			}
		}
		?>
		
		<?php 

		$req = $db->prepare('SELECT * FROM listecommandes WHERE ladate='.date('Y-m-d').'');
		$req -> execute();
	    $commandes = $req -> fetchAll();

	    $nbCommandes = count($commandes);
	    $indice = $nbCommandes+1;
		date_default_timezone_set('Europe/Paris');

	    if($nbCommandes < 10){
		$facture = date('Ymd')."0".$indice;
	    }else{
		$facture = date('Ymd')."".$indice;
	    }

        $req2 = $db -> prepare('INSERT INTO listecommandes(facture,nom,prenom,adresse,complement,codepostal,ville,pays,mail,telephone,produits) VALUES(:facture, :nom, :prenom, :adresse, :complement, :codepostal, :ville, :pays, :mail, :telephone, :produits)');
	    $req2 -> execute(array(
	    'facture' => $facture,
	    'nom' => $_SESSION['commande']['nom'],
        'prenom' => $_SESSION['commande']['prenom'],
        'adresse' => $_SESSION['commande']['adresse'],
        'complement' => $_SESSION['commande']['complement'],
        'codepostal' => $_SESSION['commande']['codepostal'],
        'ville' => $_SESSION['commande']['ville'],
        'pays' => $_SESSION['commande']['pays'],
        'mail' => $_SESSION['commande']['mail'],
        'telephone' => $_SESSION['commande']['telephone'],
	    'produits' => $_SESSION['commande']['produits']));

		$objet = "Confirmation de commande";
        $message = "Bonjour ".$_SESSION['commande']['prenom'].",<br/><br/>Les &Eacute;ditions Lunaires ont bien reçu votre commande.<br/> Nous vous ferons suivre la facture ".$facture." et les informations de suivi tr&eacute;s prochainement.<br/><br/>Nous vous remercions de votre confiance,<br/>Les &Eacute;ditions Lunaires.";
        mail($_SESSION['commande']['mail'], $objet, $message);

		unset($_SESSION['commande']);
		unset($_SESSION['panier']);
		unset($_SESSION['liste']);
		unset($_SESSION['total']);
		unset($_SESSION['validation']);
		?>
	<?php else:
		header('Location: index.php');
	endif;?>
</section>
</main>

<?php require 'footer.php';?>