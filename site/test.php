<?php require 'header.php';?>

<?php
	foreach($_SESSION['panier']['produit'] as $produit){
        $check = 'ePub';
        if(strpos($produit,$check)>0){
			$version = strrpos($produit, " ");
			$name = substr($produit, 0, $version);

            $file = "../ebooks/".$name.".epub";
	        header('Content-Type: application/octet-stream');
	        header('Content-Transfert-Encoding: Binary');
	        header('Content-disposition: attachment; filename='.basename($file).'');
	        echo readfile($file);
        }
    }
?>