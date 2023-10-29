<form action="addcom.php" method="post">
	<label for="pseudo">Pseudo :* </label>
	<input type="text" name="pseudo" required/>
	<label for="note">Note :* </label>
	<select id="note" name="note" required>
		<option value="5">5</option>
		<option value="4">4</option>
		<option value="3">3</option>
		<option value="2">2</option>
		<option value="1">1</option>
	</select><br/>
	<textarea name="contenu" placeholder="D&icirc;tes-nous ce que vous en avez pens&eacute;..."></textarea><br/>
	<input type="hidden" id="romanid" name='romanid' value='<?php echo $titre['id'];?>' required>
	<input type="hidden" id="jourpublie" name="jourpublie" value='<?php echo date('Y/m/d');?>' required>
	<input type="submit" value="envoyer">
</form>

<?php 
	$listecom = $db->prepare('SELECT id,pseudo,jourpublie,note,contenu FROM commentaires WHERE romanid='.$titre['id'].' ORDER BY id DESC');
	$listecom -> execute();
	$commentaire = $listecom -> fetchAll();

	if(empty($commentaire)){
		echo "Pas encore de commentaires";
	}

	foreach($commentaire as $com){
		$date = utf8_encode(strftime('%d %B %Y', strtotime($com['jourpublie'])));
		$moyenne += $com['note'];
		$nbnote++
?>	
	<article class="com">
		<h3><?php echo $com['pseudo'].", le ".$date. ". ".$com['note']."/5"; ?></h3>
		<p><?php echo $com['contenu'];?></p>
		<hr/>
	</article>
<?php
	}
	$moyenne /= $nbnote;
	var_dump($titre['note']);
	if($moyenne!=$titre['note']){
		echo "coucou";
		$query3 = $db->prepare('UPDATE listelivres SET note='.$moyenne.' WHERE id='.$titre['id'].'');
		echo "a priori c'est bon";
		$query3 -> execute();
		echo "fait";
	}
?>