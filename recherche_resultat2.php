
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
     <?php 

if ((isset($_SESSION['tttpseudo'])==false)&&(isset($_SESSION['tttpass'])==false)) {
    include("Barred.php");
}
else
{
    include("Barrec.php");
}
?>
     <section>
 
        
          <div class="centrerco">
          <div class="spacearound"> <h2 class="titrerouge">Résultat de la recherche : </h2></div><br />
          <?php include("recherche_res2.php"); ?>
        </div>
    <footer >
    	<?php include("Barrer.php"); ?>
    </footer>
	</section>
  </body>
</html>