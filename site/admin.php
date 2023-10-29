<?php require 'header.php'; ?>
	
	<main>
		<section class="admin">
			<?php 
                if(array_key_exists('errors', $_SESSION)): ?>
                    <p id="repertoire"> <?= implode('<br>', $_SESSION['errors']); ?> </p>
            <?php unset($_SESSION['errors']); endif; ?>

			<?php if(!isset($_SESSION['admin'])):?>
				<form class="connexion" action="connection.php" method="post">
					<label for="identifiant">Identifiant : </label>
					<input type="text" name="identifiant" required/>
					<label for="password">Mot de passe : </label>
					<input type="password" name="password" required/>
					<input type="submit" value="connexion">
				</form>
			<?php else: ?>
				<h1>Commandes</h1>
				<table class="commandes">
					<thead>
						<th scope="col">Date</th>
						<th scope="col">Identit&eacute;</th>
						<th scope="col">Mail</th>
						<th scope="col">T&eacute;l&eacute;phone</th>
						<th scope="col">Adresse</th>
						<th scope="col">Produits</th>
						<th scope="col">Statut</th>
					</thead>
					<?php

					$reqq = $db->prepare('SELECT id FROM listecommandes');
					$reqq -> execute();
					$nbCommandes = COUNT($reqq->fetchAll());

					$max = 20;
					$nbPages = ceil($nbCommandes/$max);

					if(isset($_GET['page'])){
						$pageActuelle = intval($_GET['page']);
						if($pageActuelle > $nbPages){
							$pageActuelle = $nbPages;
						}
					}else{
						$pageActuelle = 1;
					}

					$entree = ($pageActuelle - 1)*$max;
					$req = $db->prepare('SELECT * FROM listecommandes ORDER BY id DESC LIMIT '.$entree.','.$max);
					$req -> execute();
					$commandes = $req->fetchAll();

					foreach($commandes as $commande):
					?>
						<tbody>
							<tr>
								<td><?php echo $commande['ladate'];?></td>
								<td><?php echo $commande['nom']."<br/>".$commande['prenom'];?></td>
								<td><?php echo $commande['mail'];?></td>
								<td><?php echo $commande['telephone'];?></td>
								<td><?php echo $commande['adresse']."<br/>".$commande['complement']."<br/>".$commande['codepostal']."<br/>".$commande['ville']."<br/>".$commande['pays'];?></td>
								<td><?php echo $commande['produits'];?></td>
								<td><?php if($commande['statut']=="commande"):?>
									<form method="get" action="administration.php">
										<input type="hidden" name="statut" value="envoye">
										<input type="hidden" name="id" value='<?php echo $commande['id'];?>'>
										<input type="submit" value="envoy&eacute;">
									</form>
									<?php else: echo $commande['statut']; endif;?>
								</td>
							</tr>
						</tbody>
					<?php endforeach; ?>
				</table>
				<p>Page : 
					<?php 
					for($i=1; $i<=$nbPages; $i++){
						if($i==$pageActuelle){
							echo '['.$i.']';
						}else{
							echo '<a href="admin.php?page='.$i.'">'.$i.'</a>';
						}
					}
					?>
				</p>

				<h1>Gestion des livres </h1>
				<a href="creation.php" title="creation d'un livre">+ Cr&eacute;ation</a>
				<?php 
				$req2 = $db->prepare('SELECT * FROM listelivres ORDER BY titre ASC');
				$req2 -> execute();
				$livres = $req2 -> fetchAll();
				?>
				<table class="commandes">
					<thead>
						<th scope="col">Titre</th>
						<th scope="col">Stock</th>
					</thead>

					<tbody>
						<?php foreach($livres as $livre): ?>
						<tr>
							<td><a href='edition.php?id=<?php echo $livre['id'];?>'><?php echo $livre['titre'];?></a></td>
							<td><?php echo $livre['stock'];?></td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>

				<br/><br/>
				<h1>Gestion d&apos;articles</h1>
				<a href="article.php" title="Cr&eacute;ation d&apos;un article.">+ Ajout d&apos;un article</a>
				<?php 
				$req3 = $db->prepare('SELECT id,titre,parution FROM articles ORDER BY id DESC LIMIT 5');
				$req3 -> execute();
				$articles = $req3->fetchAll();

				foreach($articles as $article){
					echo '<hr/><p><a href="modification.php?id='.$article['id'].'" title="Modifier l&apos;article">'.$article['titre'].'</a> paru le '.$article['parution'].'</p>';
				}
				?>
			<?php endif; ?>


		</section>
	</main>

<?php require 'footer.php';?>