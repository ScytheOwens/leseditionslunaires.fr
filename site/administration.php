<?php require 'header.php';?>

<main>
	<?php
		if($_GET['statut']=='envoye'){
			$req2 = $db->prepare('UPDATE listecommandes SET statut="envoy&eacute;" WHERE id='.$_GET['id']);
			$req2 -> execute();
			header('Location: admin.php');
		}

		switch (htmlentities($_POST['action'])) {
			case 'edit':
				$req3 = $db -> prepare('UPDATE listelivres SET '.htmlentities($_POST['colonne']).'="'.htmlentities($_POST['modif']).'" WHERE id='.htmlentities($_POST['id']));
				$req3 -> execute();
				$id = htmlentities($_POST['id']);
				unset($_POST);
				header("Location: edition.php?id=".$id."");
			break;

			case 'creer':
				$req3 = $db -> prepare('INSERT INTO listelivres(id,titre,genre,longueur,dimensions,poids,auteur,isbnbroche,prixbroche,isbnnumerique,prixnumerique,resume,note,sortie,stock) VALUES(:id, :titre, :genre, :longueur, :dimensions, :poids, :auteur, :isbnbroche, :prixbroche, :isbnnumerique, :prixnumerique, :resume, :note, :sortie, :stock)');
				$req3 -> execute(array(
					'id' => $_POST['id'],
					'titre' => htmlentities($_POST['titre']),
					'genre' => htmlentities($_POST['genre']),
					'longueur' => htmlentities($_POST['longueur']),
					'dimensions' => htmlentities($_POST['dimensions']),
					'poids' => htmlentities($_POST['poids']),
					'auteur' => htmlentities($_POST['auteur']),
					'isbnbroche' => htmlentities($_POST['isbnbroche']),
					'prixbroche' => htmlentities($_POST['prixbroche']),
					'isbnnumerique' => htmlentities($_POST['isbnnumerique']),
					'prixnumerique' => htmlentities($_POST['prixnumerique']),
					'resume' => $_POST['resume'],
					'note' => $_POST['note'],
					'sortie' => htmlentities($_POST['sortie']),
					'stock' => htmlentities($_POST['stock'])
				));
				unset($_POST);
				header('Location: admin.php');
			break;

			case 'crearticle':
				$req3 = $db->prepare('INSERT INTO articles(id,titre,contenu) VALUES(:id, :titre, :contenu)');
				$req3 -> execute(array(
					'id' => $_POST['id'],
					'titre' => htmlentities($_POST['titre']),
					'contenu' => $_POST['contenu']
				));
				unset($_POST);
				header('Location: admin.php');
			break;

			case 'modif':
				var_dump($_POST);
				$req3 = $db->prepare('UPDATE articles SET titre="'.htmlentities($_POST['titre']).'", contenu="'.$_POST['contenu'].'" WHERE id='.$_POST['id']);
				$req3 -> execute();
				$id = htmlentities($_POST['id']);
				unset($_POST);
				header('Location: modification.php?id='.$id);
			default:
			break;
		}

	?>
</main>

<?php require 'footer.php';?>