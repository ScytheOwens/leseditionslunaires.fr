<?php require "header.php"; ?>

<main>
	<section class="repertoire">
		<h1><a href="download/dossierPresse.pdf">Lire le dossier de presse</a><h1>
		<hr/>
		<h2> Les nouvelles </h2><br/>
		<?php 
		$req = $db->prepare('SELECT * FROM articles ORDER BY id DESC');
		$req -> execute();
		$articles = $req->fetchAll();

		foreach($articles as $article):
		?>
		<h3><?php echo $article['titre'];?></h3>
		<p><i>Publi&eacute; le 
			<?php 
			$date = utf8_encode(strftime('%d %B %Y', strtotime($article['parution'])));
			echo $date;
			?>
		</i></p><br/>
		<p><?php echo $article['contenu'];?></p>
		<hr/>
		<?php endforeach; ?>
	</section>
</main>

<?php require "footer.php"; ?>