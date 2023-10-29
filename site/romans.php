<?php include('header.php'); ?>

     <main>
        <section class="repertoire">
            <h1>...Oserez-vous vous aventurer au c&oelig;ur de l&apos;imaginaire ?</h1>
            <hr />
            <?php $query = $db->prepare('SELECT * FROM listelivres');
                $query->execute();
                $livre = $query->fetchAll();
                foreach ($livre as $titre){
            ?>
                <article class="entree">
                    <img src="image/<?php echo $titre['titre']; ?>Mini.png"/>
                    <h2><?php echo '<a href=\'ficheRoman.php?id='  .$titre['id']. 
                    '\' title = \'Acc&eacute;dez &agrave; la fiche d&eacute;taill&eacute;e\'>'.$titre['titre'].'</a>'; ?> - <?php echo $titre['note'];?>/5 </h2>
                    <p><?php echo $titre['resume']; ?><p>
                </article>
                <hr/>
            <?php
                }
            ?>
            <article class="entree">
                <img src="image/aParaitre.jpg" alt="fond noir, &agrave; para&icirc;tre" />
                <h2>&Agrave; para&icirc;tre</h2>
                <p>
                    Tr&egrave;s bient&ocirc;t
                    <br /><br /><br /><br /><br /><br /><br />
                </p>
            </article>
        </section>
    </main>

 <?php include('footer.php'); ?>