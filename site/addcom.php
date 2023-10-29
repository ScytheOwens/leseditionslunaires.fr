<?php require "header.php"; 

	$query2 = $db->prepare('INSERT INTO commentaires(id,pseudo,jourpublie,note,contenu,romanid) VALUES(:id, :pseudo, :jourpublie, :note, :contenu, :romanid)');
	$query2->execute(array(
	'id' => $_POST['id'],
	'pseudo' => htmlentities($_POST['pseudo']),
	'jourpublie' => htmlentities($_POST['jourpublie']),
	'note' => htmlentities($_POST['note']),
	'contenu'=> htmlentities($_POST['contenu']),
	'romanid' => htmlentities($_POST['romanid'])));

	header("Location: ficheRoman.php?id=".htmlentities($_POST['romanid'])."");
?>