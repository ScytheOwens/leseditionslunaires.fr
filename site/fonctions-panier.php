<?php

function creationPanier(){
	if (!isset($_SESSION['panier'])){
		$_SESSION['panier'] = array();
		$_SESSION['panier']['produit'] = array();
		$_SESSION['panier']['quantite'] = array();
		$_SESSION['panier']['prix'] = array();
		$_SESSION['panier']['verrou'] = false;
	}
	return true;
}

function addProduit($produit,$quantite,$prix){
	if (creationPanier() && !isVerrouille()){
		$id = array_search($produit, $_SESSION['panier']['produit']);

		if ($id !== false){
			$_SESSION['panier']['quantite'][$id] += $quantite;
		}else{
			array_push($_SESSION['panier']['produit'],$produit);
			array_push($_SESSION['panier']['quantite'],$quantite);
			array_push($_SESSION['panier']['prix'],$prix);
		}
		header("Location: panier.php");
	}
	else echo "Ce produit n\'existe pas.";
}

function suppProduit($produit){
	if (creationPanier() && !isVerrouille()){
		$tampon = array();
		$tampon['produit'] = array();
		$tampon['quantite'] = array();
		$tampon['prix'] = array();
		$tampon['verrou'] = $_SESSION['panier']['verrou'];

		for($i=0; $i<count($_SESSION['panier']['produit']);$i++){
			if ($_SESSION['panier']['produit'][$i] !== $produit){
				array_push($tampon['produit'],$_SESSION['panier']['produit'][$i]);
				array_push($tampon['quantite'],$_SESSION['panier']['quantite'][$i]);
				array_push($tampon['prix'],$_SESSION['panier']['prix'][$i]);
			}
		}
		$_SESSION['panier'] = $tampon;
		unset($tampon);
	}
	else echo "Impossible de supprimer ce produit";
}


function total(){
	$total=0;
	for($i=0; $i<count($_SESSION['panier']['produit']); $i++){
		$total += $_SESSION['panier']['quantite'][$i] * $_SESSION['panier']['prix'][$i];
	}
	return $total;
}

function isVerrouille(){
	if (isset($_SESSION['panier']) && $_SESSION['panier']['verrou'])
	return true;
	else
	return false;
}

function compterProduits(){
	if (isset($_SESSION['panier']))
	return count($_SESSION['panier']['produit']);
	else
	return 0;
}

function calcfdp($produit){
	if(stripos($produit,'broch&eacute;')!=FALSE){
		$fdp = TRUE;
	}else{
		$fdp = FALSE;
	}
	return $fdp;
}

function suppPanier(){
	unset($_SESSION['panier']);
}

?>