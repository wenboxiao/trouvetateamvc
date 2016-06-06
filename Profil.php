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
     <div class="profil">
     	<div class="spacearound"><div class="space2"></div><h3 class="blue">Pseudo </h3> <h3 class="green"><?php echo  $_SESSION['tttpseudo']; ?></h3><div class="space2"></div></div>
     	<div class="spacearound"><div class="space2"></div><h3 class="blue">Nom </h3> <h3 class="green"><?php echo  $_SESSION['tttnom']; ?></h3><div class="space2"></div></div>
     	<div class="spacearound"><div class="space2"></div><h3 class="blue">Prénom </h3> <h3 class="green"><?php echo  $_SESSION['tttprenom']; ?></h3><div class="space2"></div></div>
        <div class="spacearound"><div class="space2"></div><h3 class="blue">Ville </h3> <h3 class="green"><?php echo  $_SESSION['tttville']; ?></h3><div class="space2"></div></div>
        <div class="spacearound"><div class="space2"></div><h3 class="blue">Téléphone </h3> <h3 class="green">0<?php echo  $_SESSION['ttttelephone']; ?></h3><div class="space2"></div></div>
        <div class="spacearound"><div class="space2"></div><h3 class="blue">E-Mail </h3> <h3 class="green"><?php echo  $_SESSION['tttmail']; ?></h3><div class="space2"></div></div>
        <div class="spacearound"><div class="space2"></div><h3 class="blue">Mot de passe </h3> <h3 class="green">Top Secret</h3><div class="space2"></div></div>
        <div class="spacearound"><h3><a href="Profil_modif.php" class="bouton3"> Modifier </a></h3></div>
    </div>
    <footer >
    	<?php include("Barrer.php"); ?>
    </footer>
	</section>
  </body>
</html>