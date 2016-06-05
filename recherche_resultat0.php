
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
          <div class="spacearound"> <h2 class="titrerouge">Aucun résultat trouvé !</h2></div><br />
          
        </div>
    <footer >
    	<?php include("Barrer.php"); ?>
    </footer>
	</section>
  </body>
</html>