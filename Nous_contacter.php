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
    	<?php include("Barrec.php"); ?> 
        <h1 class="titrebleu"> Nous contacter </h1>
        <p class="centrerco"> Vous pouvez nous contacter en utilisant l'adresse suivante : 
        <?php include("Nous_contacter_php.php"); ?>
        </p>
        <div class="space"></div>
        <?php include("Barrer.php"); ?>    
    </body> 
</html>