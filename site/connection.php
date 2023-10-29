<?php require 'header.php'; ?>

	<?php
	$errors = [];
	$identifiant = htmlentities($_POST['identifiant']);
	$password = htmlentities($_POST['password']);
	
	if($identifiant == "maeva.gr@live.fr" && $password == "lapine98"){
		$_SESSION['admin'] = TRUE;
		header('Location: admin.php');
	}else{
		if($identifiant != "maeva.gr@live.fr"){
			$errors['identifiant'] = "Mauvais identifiant";
		}

		if($password != "lapine98"){
			$errors['password'] = "Mauvais mot de passe";
		}

		$_SESSION['errors'] = $errors;
		header('Location: admin.php');
	}
	?>
<?php require 'footer.php'; ?>