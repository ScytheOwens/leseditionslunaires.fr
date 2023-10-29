<?php include('header.php'); ?>

    <main>
        <section class="fiche">
            <?php 
                $query = $db->prepare('SELECT * FROM listelivres WHERE id='.htmlentities($_GET['id']).'');
                $query->execute();
                $livre = $query->fetchAll();
                if(empty($livre)){
                    die('Cet article n\'existe pas.');
                }
                foreach ($livre as $titre){
            ?>
        <img src="image/<?php echo $titre['titre']; ?>.jpg"/>
        <h1><?php echo $titre['titre']; ?></h1>
            <?php
                }
            ?>

            <article>
                <form action="panier.php" method="post">
                    <label for="p">Plut&ocirc;t papier ou num&eacute;rique ?</label>
                    </br>
                    <select id="p" name="p" required>
                        <option value="<?php echo $titre['prixbroche'];?>">Broch&eacute; <?php echo $titre['prixbroche'];?>&euro;</option>
                        <?php 
                            if($titre['sortie'] <= date('Y-m-d')):
                        ?>
                        <option value="<?php echo $titre['prixnumerique'];?>">Epub <?php echo $titre['prixnumerique'];?>&euro;</option>
                        <?php endif; ?>
                    </select></br>

                    <label for="q">Nombre d&apos;exemplaires : </label>
                    </br>
                    <select id="q" name="q" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    </br>
                    <input type="hidden" id="l" name="l" value="<?php echo $titre['titre'];?>">
                    <input type="hidden" id="action" name="action" value="ajout">
                    <input type="submit" value="Ajouter au panier"/>
                </form>

                <p>
                    R&eacute;sum&eacute; :</br></br>
                    <?php echo $titre['resume']; ?>
                </p>

                <hr/>

                <table>
                    <tr><th>Genre</th>
                    <td><?php echo $titre['genre']; ?></td></tr>

                    <tr><th>Longueur</th>
                    <td><?php echo $titre['longueur']; ?> pages</td></tr>

                    <tr><th>Dimensions</th>
                    <td><?php echo $titre['dimensions']; ?></td></tr>

                    <tr><th>Poids</th>
                    <td><?php echo $titre['poids']; ?>g</td></tr>

                    <tr><th>Auteur</th>
                    <td><?php echo $titre['auteur']; ?></td></tr>

                    <tr><th>ISBN Broch&eacute;</th>
                        <td><?php echo $titre['isbnbroche'];?></td></tr>
                    <tr><th>ISBN .Epub</th>
                        <td><?php echo $titre['isbnnumerique'];?></td>
                    </tr>
                </table>
            </article>
        </section>

        <section class="commentaires">
            <h2> Commentaires </h2>
            <h3> Note moyenne : <?php echo $titre['note'];?>/5 </h3>
            <?php include "commentaires.php"; ?>
        </section>
    </main>

    <?php include('footer.php'); ?>