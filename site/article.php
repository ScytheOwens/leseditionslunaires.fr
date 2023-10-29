<?php require 'header.php'; ?>

<main>
<section class="admin">
	<h1>Ajouter un article</h1></br>
	<form action="administration.php" method="post">
		<label for="titre">Titre :</label>
		<input type="text" name="titre" require><br/><br/>
		<label for="contenu">Contenu :</label><br/>
		<textarea name="contenu" placeholder="N&apos;oublie pas les br/ ! " require></textarea><br/>
		<input type="hidden" name="action" value="crearticle">
		<input type="submit" value="Valider">
	</form>
</section>
</main>

<?php require 'footer.php'; ?>