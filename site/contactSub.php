<?php include('header.php'); ?>

    <main>

        <section class="alaune">
            <article>
                <?php
                $errors = [];

                if(!array_key_exists('identite', $_POST) || $_POST['identite'] == ''){
                    $errors['identite'] = "Veuillez renseigner votre nom.";
                }

                if(!array_key_exists('mail', $_POST) || $_POST['mail'] == '' || !filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){
                    $errors['mail'] = "Veuillez renseigner un email valide.";
                }

                if(!array_key_exists('objet', $_POST) || $_POST['objet'] == ''){
                    $errors['objet'] = "Veuillez choisir un objet.";
                }

                if(!array_key_exists('corps', $_POST) || $_POST['corps'] == ''){
                    $errors['corps'] = "Veuillez renseigner votre message.";
                }

                if(!empty($errors)){
                    $_SESSION['errors'] = $errors;
                    $_SESSION['inputs'] = $_POST;
                    header('Location: contact.php');
                }else{
                    $objet = htmlentities($_POST['objet']);
                    $message = 'De '.htmlentities($_POST['identite']).', <br/>'.htmlentities($_POST['corps']);
                    $mail = htmlentities($_POST['mail']);
                    $headers = 'FROM : '.$mail;
                    mail('contact@leseditionslunaires.fr', $objet, $message, $headers);
                }
                ?>

                <p> Nous avons bien re&ccedil;u votre message. </p>
            </article>
        </section>
    </main>

<?php include('footer.php'); ?>