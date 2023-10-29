<?php require 'header.php'; ?>

<main>
<section class="admin">
<a href="admin.php">Retour</a>
<h1>Cr&eacute;er un livre</h1>
<form action="administration.php">
<table>
	<tr>
		<th>Titre</th>
		<td>
			<input type="text" name="titre">
		</td>
	</tr>
	<tr>
		<th>Genre</th>
		<td>
			<input type="text" name="genre" placeholder="genre 1, genre 2, genre 3">
		</td>
	</tr>
	<tr>
		<th>Longueur</th>
		<td>
			<input type="text" name="longueur" placeholder="nb de pages">
		</td>
	</tr>
	<tr>
		<th>Dimensions</th>
		<td>
			<input type="text" name="dimensions" placeholder="Lxlxhcm">
		</td>
	</tr>
	<tr>
		<th>Poids</th>
		<td>
			<input type="text" name="poids" placeholder="en gramme">
		</td>
	</tr>
	<tr>
		<th>Auteur</th>
		<td>
			<input type="text" name="auteur" placeholder="Scythe Owens">
		</td>
	</tr>
	<tr>
		<th>ISBN Broch&eacute;</th>
		<td>
			<input type="text" name="isbnbroche" placeholder="">
		</td>
	</tr>
	<tr>
		<th>Prix Broch&eacute;</th>
		<td>
			<input type="text" name="prixbroche" placeholder="19.00">
		</td>
	</tr>
	<tr>
		<th>ISBN Num&eacute;rique</th>
		<td>
			<input type="text" name="isbnnumerique" placeholder="">
		</td>
	</tr>
	<tr>
		<th>Prix Num&eacute;rique</th>
		<td>
			<input type="text" name="prixnumerique" placeholder="5.99">
		</td>
	</tr>
	<tr>
		<th>R&eacute;sum&eacute;</th>
		<td>
			<textarea name="resume" placeholder="N'oublie pas les br"></textarea>
		</td>
	</tr>
	<tr>
		<th>Date de sortie</th>
		<td>
			<input type="text" name="sortie" placeholder="YYYY-MM-JJ">
		</td>
	</tr>
	<tr>
		<th>Stock</th>
		<td>
			<input type="text" name="stock" placeholder="nb ex">
		</td>
	</tr>
</table>
<input type="hidden" name="action" value="creer">
<input type="submit" value="Ajouter">
</form>

<form action="#" method="post" enctype="multipart/form-data">
	<input type="file" name="couv" accept="image/*" multiple>
	<input type="hidden" name="tailleMax" value="100000">
	<input type="submit" value="envoyer les images">
</form>

<?php
if(isset($_FILES)){
	$dossier = 'image/';
	$fichier = basename($_FILES['couv']['name']);
	$tailleMax = 100000;
	$taille = filesize($_FILES['couv'][tmp_name]);
	$extensions = array('.png','.jpg','.jpeg');
	$extension = strrchr($_FILES['couv']['name'], '.');

	if(!in_array($extension, $extensions)){
		$erreur = 'Extension non prise en charge.';
		echo "<p id='erreur'>".$erreur."</p>";
	}

	if($taille > $tailleMax){
		$erreur = 'Trop volumineux, max 100ko';
		echo "<p id='erreur'>".$erreur."</p>";
	}

	if(!isset($erreur)){
		$fichier = strtr($fichier,
			'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜİàáâãäåçèéêëìíîïğòóôõöùúûüıÿ',
			'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy',
		);
		$fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);

		if(move_uploaded_file($_FILES['couv']['tmp_name'], $dossier . $fichier)){
			echo 'Upload&eacute; avec succ&egrave;s.';
		}else{
			$erreur = 'Echec de l&apos;upload.';
			echo "<p id='erreur'>".$erreur."</p>";
		}
	}
}

unset($_FILES);
?>
</section>
</main>

<?php require 'footer.php'; ?>