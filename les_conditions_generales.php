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
        <h1 class="titrebleu"> Conditions générales d'utilisations </h1>
        <p class="centrerco">
        <?php include("les_conditions_generales_php.php"); ?>
        </p>
        <div class="space"></div>
        <?php include("Barrer.php"); ?>    
    </body> 
</html>