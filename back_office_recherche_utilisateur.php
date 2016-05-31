<?php session_start(); ?>
<?php include("back_office_verif.php"); ?>
<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="stylettt.css" />
<link rel="stylesheet" href="Amb.css" />
<link rel="icon" type="image/png" href="image/faviconessai.png" />
<title>Trouve ta Team</title>
</head>
<body>
	<?php include("Barrec.php"); ?>
	<form method="post" action="back_office_recherche_resultat.php">
        <div class="space" ></div>
        <div> Pour modérer un utilisateur, recherchez le sur le site</div>
    	<div class="space" ></div>
        <p>
            <input type="text" name="Utilisateur" id="Utilisateur" placeholder="Rechercher un utilisateur" size="40" maxlength="70"/>
        </p>
        <h1><input type="submit" value="Rechercher"  class="bouton3"></h1>
    </form>
    </body>
</html>