<?php require 'header.php'; ?>

    <main>
        <section class="alaune">
        <h1>&Agrave; la une</h1>
            <article>
                <p>
                    <img class="une" src="image/une.jpg">
                </p>
            </article>
        </section>

        <section class="nouvelles">
            <h1>Nouvelles</h1>
            <?php 
		        $req = $db->prepare('SELECT * FROM articles ORDER BY id DESC');
		        $req -> execute();
		        $articles = $req->fetchAll();

                foreach($articles as $article):
            ?>
            <article>
                <h2><?php echo $article['titre']; ?></h2>
                <p><i>Paru le <?php $date = utf8_encode(strftime('%d %B %Y', strtotime($article['parution']))); echo $date;?></i></p>
                <br/>
                <p><?php echo $article['contenu']; ?></p>
                </article>
            <hr/>
            <?php endforeach; ?>
        </section>
    </main>

    <?php include('footer.php'); ?>