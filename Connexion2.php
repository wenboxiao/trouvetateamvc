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
                <label for="pseudo" class="titrevert2">Votre pseudo :</label><br />
                <div class="pss"><input type="text" name="tttpseudo" id="tttpseudo" class="tttpseudo" placeholder="Ex: Gladolferat" size="30" maxlength="30" /></div><br />
                <h4 class="titrerouge">Veuillez remplir les champs</h4>
                <label for="pass" class="titrevert2">Votre mot de passe :</label><br />
                <div class="pss"><input type="password" name="tttpass" id="tttpass" placeholder="Ex: CaputDrackonis" size="30" maxlength="30"/></div><br />
                <h1 class="boutonp3"><input type="submit" value="Connexion"  class="bouton3"></h1></form>
                <a class="titrerouge" href="reinitialisation_mot_de_passe.php">*Mot de passe oublié ?</a><br/>
        
        <?php include("Barrer.php"); ?>
    </body> 
</html>