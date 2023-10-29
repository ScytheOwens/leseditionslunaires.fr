<?php require 'header.php';?>

<main>
	<section class="livraison">
		<?php if (isset($_SESSION['panier']) && $_POST['cgv']=="cgv"): ?>
			<h1>Vos coordonn&eacute;es pour la livraison : </h1>
			<form method="post" action="paiement.php">
				<input id="petit" type="text" name="nom" placeholder="Votre nom*" autofocus required>
				<input id="petit" type="text" name="prenom" placeholder="Votre pr&eacute;nom*" required><br/>
				<input id="petit" type="email" name="mail" placeholder="jeandupont@mail.com*" required>
				<input id="petit" type="text" name="telephone" placeholder="0600112233*" maxlength="10" minlength="10" required><br/>
				<input type="text" name="adresse" placeholder="8 rue de la Lune*" required>
				<input type="text" name="complement" placeholder="b&acirc;timent A, r&eacute;sidence ISS"><br/>
				<input id="petit" type="text" name="codepostal" placeholder="25420*" maxlength="5" minlength="5" required>
				<input id="petit" type="text" name="ville" placeholder="Lyon*" required><br/>
				<input type="text" name="pays" value="France" readonly required>
				<input type="submit" value="valider">
			</form>
		<?php elseif(!isset($_SESSION['panier'])): ?>
			<p> Votre panier est vide &eacute;.&egrave; </p>
		<?php else: ?>
			<?php 
			$_SESSION['errors'] = "Merci de cocher les CGV";
			header('Location: panier.php');
			?>
		<?php endif; ?>
	</section>
</main>

<?php require 'footer.php';?>