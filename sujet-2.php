<p align=center ><a type="button" href="forum.php" value="retour"  class="bouton">retour</a></p>
<h1><?php echo $sujet['titre']; ?></h1>
	<?php
		if(isset($message))
			echo '<p>'.$message.'</p>';
	?>
<p>

	Ecrit par <?php echo $sujet['id_membre']; ?> le	  <?php echo $sujet['date']; ?>
</p>
<p>
<h2>	<?php echo nl2br($sujet['message']); ?></h2>
</p>
<ul>
	<?php 
		foreach ($messages as $message) {
	?>
	<h2>	<ul><?php echo $message['id_membre']; ?> : <?php echo nl2br($message['message']); ?></ul></h2>
	<?php
		}
	?>
</ul>
<form method="post">
	<textarea name="message" cols="50" rows="10"></textarea><br>
	<input class="bouton2" type="submit" name="">
</br>
</form>
</br>