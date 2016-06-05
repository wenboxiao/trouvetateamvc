<?php session_start(); ?>    
<?php include("back_office_verif.php"); ?>
<!DOCTYPE html>
<html>
 	<head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="stylettt.css" />
        <link rel="stylesheet" href="Amb.css" />
        <link rel="icon" type="image/png" href="image/faviconessai.png" />
        <title><?php include("Nom_site.php"); ?></title>
  </head>

  <body>
    <?php include("Barrec.php"); ?>

    <section>
      <div class="centrerco">
        <div class="spacearound"> <h2 class="titrerouge">Résultat de la recherche : </h2></div><br />
        <?php 
        include("back_office_traitement.php"); 
        ?>
      </div>
      <footer >
        <?php include("Barrer.php"); ?>
      </footer>
    </section>
  </body>
</html>