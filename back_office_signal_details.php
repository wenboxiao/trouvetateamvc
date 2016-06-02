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
    <h1 class="titrevert"> Détails signalement </h1>
    <?php
      include("back_office_signal_details_processus.php")
    ?>
  </body>
</html>