<?php session_start(); ?>
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
    	<?php 
        if ((!isset($_SESSION['tttpseudo']))&&(!isset($_SESSION['tttpass']))) {
            include("Barred.php");
        }
        else {
            include("Barrec.php");
        }
        ?>  
        <h1 class="titrevert"> Bienvenue à la Foire Aux Questions ! </h1>
        <p class="centrerco"> Vous pouvez ici consulter les questions les plus fréquement posée : il y a de forte chances qu'elle contiennent tout ce que vous voulez savoir sur notre site internet !
        </p>
        <?php include("FAQ_affichage.php"); ?>
        <?php include("Barrer.php"); ?>
    </body> 
</html>