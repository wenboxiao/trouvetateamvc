	<p align=center ><a type="button" href="forum.php" value="retour"  class="bouton">retour</a></p>
	<h3><font color="Black">Ajouter sujet</font></h3>
	<form method="post">
	<?php
		if(isset($message))
			echo '<p>'.$message.'</p>';
	?>
		<label>Titre : </label><input type="text" name="titre"><br>
		<label>Message : </label><br>
		<textarea name="message" rows="10" cols="50"></textarea><br>
		<a href="forum.php"><input type="submit" name="" ></a>
	</form>