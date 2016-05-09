<!DOCTYPE html>
<html>

 	<head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="stylettt.css" />
        <link rel="stylesheet" href="Am.css" />
        <link rel="icon" type="image/png" href="image/faviconessai.png" />
        <title>Trouve ta Team</title>
    </head>
    <body>
    	<?php include("Barred.php"); ?>
        <div class="space"></div>     
        <form method="post" action="Pass.php">
                <label for="tttpseudo" class="titrevert2">Votre pseudo :</label><br />
                <div class="pss"><input type="text" name="tttpseudo" id="tttpseudo" class="tttpseudo" placeholder="Ex: Gladolferat" size="30" maxlength="30" /></div><br />
                <label for="tttpass" class="titrevert2">Votre mot de passe :</label><br />
                <div class="pss"><input type="password" name="tttpass" id="tttpass" placeholder="Ex: CaputDrackonis" size="30" maxlength="30"/></div><br />
                <h1 class="boutonp3"><input type="submit" value="Connexion"  class="bouton3"></h1>
        </form>
        <?php include("Barrer.php"); ?>
    </body> 
</html>