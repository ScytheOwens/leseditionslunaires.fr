<?php require 'header.php';?>

<main>
<section class="admin">
	<h1>Modifier l&apos;article</h1>
	<?php 
		$req = $db -> prepare('SELECT * FROM articles WHERE id ='.$_GET['id']);
		$req -> execute();
		$article = $req->fetchAll();

		foreach($article as $art):
	?>
	<form method="post" action="administration.php">
		<input type="text" name="titre" value="<?php echo $art['titre'];?>"><br/>
		<textarea name="contenu"><?php echo $art['contenu'];?></textarea>
		<input type="hidden" name="action" value="modif">
		<input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
		<br/>
		<input type="submit" value="modifier">
	</form>
	<?php endforeach; ?>
</section>
</main>

<?php require 'footer.php';?>