<?php require 'header.php'; ?>

<main>
<section class="alaune">
<?php
if(!isset($_POST)){
	header('Location: livraison.php');
}else{
	$_SESSION['commande'] = array();
	$_SESSION['commande']['nom'] = htmlentities($_POST['nom']);
	$_SESSION['commande']['prenom'] = htmlentities($_POST['prenom']);
	$_SESSION['commande']['adresse'] = htmlentities($_POST['adresse']);
	$_SESSION['commande']['complement'] = htmlentities($_POST['complement']);
	$_SESSION['commande']['codepostal'] = htmlentities($_POST['codepostal']);
	$_SESSION['commande']['ville'] = htmlentities($_POST['ville']);
	$_SESSION['commande']['pays'] = htmlentities($_POST['pays']);
	$_SESSION['commande']['mail'] = htmlentities($_POST['mail']);
	$_SESSION['commande']['telephone'] = htmlentities($_POST['telephone']);
	$_SESSION['commande']['produits'] = $_SESSION['liste'];

	echo "<p>Total &agrave; r&eacute;gler : ".$_SESSION['total']."&euro;</p>";
	include ('paypal.php');
}
?>
</section>
</main>

<?php require 'footer.php'; ?>