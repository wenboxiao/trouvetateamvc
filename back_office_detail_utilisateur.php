<?php session_start(); ?>
<?php include("back_office_verif.php") ?>
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

    <?php
    include("back_office_personnalisation_details.php")
    ?>
  </body>
</html>