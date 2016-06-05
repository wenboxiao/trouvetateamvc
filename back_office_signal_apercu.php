<?php session_start(); ?>
<?php include("back_office_verif.php"); ?>
<!DOCTYPE html>
<html>
 	<head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="stylettt.css" />
        <link rel="stylesheet" href="Am.css" />
        <link rel="icon" type="image/png" href="image/faviconessai.png" />
        <title><?php include("Nom_site.php"); ?></title>
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
        <h1 class="titrevert"> Signalements effectués </h1>
        <p class="centrerco"> Des utilisateurs ont signalés les abus suivants :
        </p>
        <?php include("back_office_signal_affichage.php"); ?>
        <?php include("Barrer.php"); ?>
    </body> 
</html>