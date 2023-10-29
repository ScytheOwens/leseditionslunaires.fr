<?php
    session_start();
    include_once ('fonctions-panier.php');
    
    try{
        $db = new PDO('mysql:host=localhost;dbname=leseditionslunaires;charset=utf8', 'root','root'); 
    }
    catch (Exception $e){
        die('Erreur :' . $e -> getMessage());
    }
    setlocale (LC_TIME, 'fr_FR', 'fra');
?>

<!DOCTYPE html>

<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Les &Eacute;ditions Lunaires</title>
    <meta name="author" content="Ma&euml;va Grondin" />
    <meta name="description" content="Maison d'&eacute;dition sp&eacute;cialis&eacute;e dans la litt&eacute;rature de l'imaginaire, d&eacute;couvrez nos romans et suivez notre actualit&eacute;." />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="image/icon.png" type="image/x-icon" />
    <link rel="stylesheet" href="style/style.css" />
</head>

<body>
<header>
    <nav>
        <label for="sandwich" class="deroulant">&equiv; <a href="index.php">Les &Eacute;ditions Lunaires</a></label>
        <input type="checkbox" id="sandwich">
        <ul class="menu">
            <li class="romans"><a href="romans.php" title="Les romans &agrave; d&eacute;couvrir"> Romans </a></li>
            <li class="presse"><a href="presse.php" title="Communiqu&eacute;s et apparitions"> Presse </a></li>
            <li id="logo"><a href="index.php" title="Page d'accueil"> <img src="image/lune.png" alt="Logo"/></a></li>
            <li class="reseaux"><a href="https://www.instagram.com/scythe_owens/" target="blank" title="Retrouvez nous sur instagram"><img src="image/logoInsta.png"></a></li>
            <li class="contact"><a href="contact.php" title="Formulaire de contact"> Contact </a></li>
            <li class="panier"><a href="panier.php" title="Votre panier"> Panier </a></li>
        </ul>
    </nav>
</header>