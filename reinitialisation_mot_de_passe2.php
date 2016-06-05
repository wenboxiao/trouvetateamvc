
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
     <?php include("Barred.php"); ?>
     <section>
 <div class="space"></div>   
 	
        
          <h1 class="titrerouge">Demande envoyé ! Vous allez recevoir votre code  sur votre boite mail.</h1><br/> <br/>
          	
          <h1 class="titrebleu">Veillez entrer votre code ci-dessous (ATTENTION: uniquement valide pendant 10 minutes) : </h1><br/> <br/>
          	<form method="post" action="reinitialisation_confirm.php" class="centrerco">
         <label for="code">Code :</label><input type="text" name="code" id="code"  size="25" maxlength="70"/><br />
        
						<input  name="token" type="hidden"  value="<?php echo $_POST['token']?>" >
					    <input  name="time" type="hidden"  value="<?php echo $_POST['time']?>" >
					    <input  name="pseudo" type="hidden"  value="<?php echo $_POST['pseudo']?>" >
         <h1 class="boutonp3"><input type="submit" value="Se connecter"  class="bouton3"></h1><br /><br />
        </form>
             
      
    <footer >
    	<?php include("Barrer.php"); ?>
    </footer>
	</section>
  </body>
</html>