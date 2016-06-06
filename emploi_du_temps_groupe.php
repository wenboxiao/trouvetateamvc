<?php session_start(); 
    if (isset($_SESSION['tttpseudo'])==False) {
        header('Location: Trouvetateam.php');
            }
?>
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
     <div class="groupe_profil">
     	<div class="spacearound"><div class="space2"></div><h3 class="blue">Nom de la team: </h3> <h3 class="green"><?php echo  htmlspecialchars($_POST['nom_team']); ?></h3><div class="space2"></div></div>
     	<div class="spacearound"><div class="space2"></div><h3 class="blue">Sport: </h3> <h3 class="green"><?php echo  htmlspecialchars($_POST['sport_team']); ?></h3><div class="space2"></div></div>
        <div class="spacearound"><div class="space2"></div><h3 class="blue">Ville: </h3> <h3 class="green"><?php echo  htmlspecialchars($_POST['ville_team']); ?></h3><div class="space2"></div></div>
        <div class="spacearound"><div class="space2"></div><h3 class="blue">Club:</h3> <h3 class="green"><?php echo  htmlspecialchars($_POST['club_team']); ?></h3><div class="space2"></div></div>
        <div class="spacearound"><div class="space2"></div><h3 class="blue">Nombres de participants:</h3> <h3 class="green"><?php echo  htmlspecialchars($_POST['nbmembres']); ?></h3><div class="space2"></div></div>
        <div class="spacearound"><div class="space2"></div><h3 class="blue">Description: </h3><h3 class="green"><p><?php echo  htmlspecialchars($_POST['description_team']); ?></p></h3><div class="space2"></div></div>
        <div class="spacearound"><div class="space2"></div><h3 class="blue">Membres du groupe: </h3><h3 class="green"><p><?php include ("emploi_du_temps_membres.php"); ?></p></h3><div class="space2"></div></div>
       </div>

 	</section>
    <footer >
    	<?php include("Barrer.php"); ?>
    </footer>
	
  </body>
</html>