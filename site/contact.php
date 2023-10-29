<?php include('header.php'); ?>

    <main>
        <section class="repertoire">
            <h1>Une question ? Un commentaire ? Une r&eacute;clamation ? C&apos;est ici !</h1>
            <hr/>

                <?php 
                if(array_key_exists('errors', $_SESSION)): ?>
                    <p id="erreur"> <?= implode('<br>', $_SESSION['errors']); ?> </p>
                <?php unset($_SESSION['errors']); endif; ?>

                <form action="contactSub.php" method="post">
                    <ul>
                        <li><input type="text" name="identite" placeholder="Nom et Pr&eacute;nom" value="<?php echo $_SESSION['inputs']['identite'] ;?>" required/></li>
                        <li><input type="email" name="mail" placeholder="nomprenom@email.com" value="<?php echo $_SESSION['inputs']['mail'];?>" required/></li>
                        <li>
                            <select name="objet" required>
                                <option value="">Objet</option>
                                <option value="commande">Commande</option>
                                <option value="presse">Presse</option>
                                <option value="site">Site</option>
                            </select>
                        </li>
                        <li><textarea class="corps" name="corps" placeholder="Bonjour, je souhaiterais obtenir une information sur..." required><?php echo $_SESSION['inputs']['corps'];?></textarea></li>
                    </ul>
                    <button>Envoyer</button>                    
                </form>
            <br/>
        </section>
    </main>

    <?php include('footer.php'); ?>