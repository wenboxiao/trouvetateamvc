<?php session_start(); ?>
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
              include("Barred.php"); }
          else {
              include("Barrec.php"); }
        ?> 
        <h1 class="titrebleu"> Mentions Légales </h1>
        <p class="centrerco">
        <?php include("les_mentions_legales_php.php"); ?>
        </p>
        <div class="space"></div>
        <?php include("Barrer.php"); ?>    
    </body> 
</html>