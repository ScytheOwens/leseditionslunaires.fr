<?php require 'header.php' ?>

<?php 
$query = $db -> prepare('SELECT * FROM listelivres WHERE id ='.$_GET['id']);
$query -> execute();
$livre = $query -> fetchAll();

foreach($livre as $titre):
?>

<main>
<section class="admin">
<table>
	<tr>
		<th><?php echo $titre['titre'];?></th>
		<td>
			<form action="administration.php" method="post">
			<input type="text" name="modif">
			<input type="hidden" name="action" value="edit">
			<input type="hidden" name="id" value="<?php echo $titre['id'];?>">
			<input type="hidden" name="colonne" value="titre">
			<input type="submit" value="modifier">
			</form>
		</td>
	</tr>
	<tr>
		<th><?php echo $titre['genre'];?></th>
		<td>
			<form action="administration.php" method="post">
			<input type="text" name="modif">
			<input type="hidden" name="action" value="edit">
			<input type="hidden" name="id" value="<?php echo $titre['id'];?>">
			<input type="hidden" name="colonne" value="genre">
			<input type="submit" value="modifier">
			</form>
		</td>
	</tr>
	<tr>
		<th><?php echo $titre['longueur']."<i> (nb de pages)</i>";?></th>
		<td>
			<form action="administration.php" method="post">
			<input type="text" name="modif">
			<input type="hidden" name="action" value="edit">
			<input type="hidden" name="id" value="<?php echo $titre['id'];?>">
			<input type="hidden" name="colonne" value="longueur">
			<input type="submit" value="modifier">
			</form>
		</td>
	</tr>
	<tr>
		<th><?php echo $titre['dimensions'];?></th>
		<td>
			<form action="administration.php" method="post">
			<input type="text" name="modif">
			<input type="hidden" name="action" value="edit">
			<input type="hidden" name="id" value="<?php echo $titre['id'];?>">
			<input type="hidden" name="colonne" value="dimensions">
			<input type="submit" value="modifier">
			</form>
		</td>
	</tr>
	<tr>
		<th><?php echo $titre['poids']."<i> (poids en grammes)</i>";?></th>
		<td>
			<form action="administration.php" method="post">
			<input type="text" name="modif">
			<input type="hidden" name="action" value="edit">
			<input type="hidden" name="id" value="<?php echo $titre['id'];?>">
			<input type="hidden" name="colonne" value="poids">
			<input type="submit" value="modifier">
			</form>
		</td>
	</tr>
	<tr>
		<th><?php echo $titre['auteur'];?></th>
		<td>
			<form action="administration.php" method="post">
			<input type="text" name="modif">
			<input type="hidden" name="action" value="edit">
			<input type="hidden" name="id" value="<?php echo $titre['id'];?>">
			<input type="hidden" name="colonne" value="auteur">
			<input type="submit" value="modifier">
			</form>
		</td>
	</tr>
	<tr>
		<th><?php echo $titre['isbnbroche'];?></th>
		<td>
			<form action="administration.php" method="post">
			<input type="text" name="modif">
			<input type="hidden" name="action" value="edit">
			<input type="hidden" name="id" value="<?php echo $titre['id'];?>">
			<input type="hidden" name="colonne" value="isbnbroche">
			<input type="submit" value="modifier">
			</form>
		</td>
	</tr>
	<tr>
		<th><?php echo $titre['prixbroche'];?></th>
		<td>
			<form action="administration.php" method="post">
			<input type="text" name="modif">
			<input type="hidden" name="action" value="edit">
			<input type="hidden" name="id" value="<?php echo $titre['id'];?>">
			<input type="hidden" name="colonne" value="prixbroche">
			<input type="submit" value="modifier">
			</form>
		</td>
	</tr>
	<tr>
		<th><?php echo $titre['isbnnumerique'];?></th>
		<td>
			<form action="administration.php" method="post">
			<input type="text" name="modif">
			<input type="hidden" name="action" value="edit">
			<input type="hidden" name="id" value="<?php echo $titre['id'];?>">
			<input type="hidden" name="colonne" value="isbnnumerique">
			<input type="submit" value="modifier">
			</form>
		</td>
	</tr>
	<tr>
		<th><?php echo $titre['prixnumerique'];?></th>
		<td>
			<form action="administration.php" method="post">
			<input type="text" name="modif">
			<input type="hidden" name="action" value="edit">
			<input type="hidden" name="id" value="<?php echo $titre['id'];?>">
			<input type="hidden" name="colonne" value="prixnumerique">
			<input type="submit" value="modifier">
			</form>
		</td>
	</tr>
	<tr>
		<th><?php echo $titre['resume'];?></th>
		<td>
			<form action="administration.php" method="post">
			<textarea name="modif"></textarea>
			<input type="hidden" name="action" value="edit">
			<input type="hidden" name="id" value="<?php echo $titre['id'];?>">
			<input type="hidden" name="colonne" value="resume">
			<input type="submit" value="modifier">
			</form>
		</td>
	</tr>
	<tr>
		<th><?php echo $titre['sortie'];?></th>
		<td>
			<form action="administration.php" method="post">
			<input type="text" name="modif">
			<input type="hidden" name="action" value="edit">
			<input type="hidden" name="id" value="<?php echo $titre['id'];?>">
			<input type="hidden" name="colonne" value="sortie">
			<input type="submit" value="modifier">
			</form>
		</td>
	</tr>
	<tr>
		<th><?php echo $titre['stock'];?></th>
		<td>
			<form action="administration.php" method="post">
			<input type="text" name="modif">
			<input type="hidden" name="action" value="edit">
			<input type="hidden" name="id" value="<?php echo $titre['id'];?>">
			<input type="hidden" name="colonne" value="stock">
			<input type="submit" value="modifier">
			</form>
		</td>
	</tr>
</table>
</section>
</main>
<?php endforeach;?>

<?php require 'footer.php' ?>