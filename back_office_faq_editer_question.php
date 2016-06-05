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
        <h2 class="titrebleu"> Edition de la Question/Réponse </h2>
        <p class="centrerco"> Utilisez les zones de texte pour éditer la Question et la Réponse.
        </p>
        <?php include("back_office_faq_editer_ques.php"); ?>
        <?php include("Barrer.php"); ?>
    </body> 
</html>