
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
     <section>
 <div class="space"></div>     
  
              <div class="spacearound"><div class="space2"></div><h3 class="blue">Nom du club </h3> <h3 class="green"><?php echo  	$_POST['nom_club']; ?></h3><div class="space2"></div></div>
     	<div class="spacearound"><div class="space2"></div><h3 class="blue">Sport </h3> <h3 class="green"><?php echo  $_POST['sport_club']; ?></h3><div class="space2"></div></div>
             <h4 class="titrerouge">La ville n'est pas reconnu !</h4><br />
        <div class="spacearound"><div class="space2"></div><h3 class="blue">Ville </h3> <h3 class="green"><?php echo  $_POST['ville_club']; ?></h3><div class="space2"></div></div>
        <div class="spacearound"><div class="space2"></div><h3 class="blue">Adresse</h3> <h3 class="green"><?php echo  $_POST['adresse_club']; ?></h3><div class="space2"></div></div>
        <div class="spacearound"><div class="space2"></div><h3 class="blue">E-mail </h3> <h3 class="green"><?php echo  $_POST['mail_club']; ?></h3><div class="space2"></div></div>
        <div class="spacearound"><div class="space2"></div><h3 class="blue">Description </h3> <h3 class="green"><p><?php echo  $_POST['description_club']; ?></p></h3><div class="space2"></div></div>
         
           <form method="post"  action="club_profil_modif.php">
           <input  name="nom_club" type="hidden"  value="<?php echo $_POST['nom_club']; ?>" >
 			<input  name="description_club" type="hidden"  value="<?php echo $_POST['description_club']; ?>" >
 			<input  name="ville_club" type="hidden"  value="<?php echo  $_POST['ville_club']; ?>" >
 			<input  name="sport_club" type="hidden"  value="<?php echo  $_POST['sport_club']; ?>" >
 			<input  name="adresse_club" type="hidden"  value="<?php echo  $_POST['adresse_club']; ?>" >
            <input  name="mail_club" type="hidden"  value="<?php echo  $_POST['mail_club']; ?>" >
 			
 			<div class="spacearound"><h3><button type=submit class="decox"> Modifier</button></h3></div></form>
    
    <footer >
    	<?php include("Barrer.php"); ?>
    </footer>
	</section>
  </body>
</html>