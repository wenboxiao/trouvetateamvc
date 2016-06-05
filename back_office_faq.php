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
        <h1 class="titrevert"> Gestion de la Foire Aux Questions (FAQ) </h1>
        <p class="centrerco"> Vous pouvez ici éditer la FAQ du site, afin d'offrir aux nouveaux utilisateurs du site les réponses aux questions qu'ils posent fréquemment ou pourraient être amené à se poser.
        </p>
        <?php include("back_office_faq_affichage_questions.php"); ?>
        <?php include("Barrer.php"); ?>
    </body> 
</html>