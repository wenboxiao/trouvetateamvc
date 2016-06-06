
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
 	
        <form method="post" action="reinitialisation_php.php" class="centrerco">
          <div class="centrerco">
          <h1 class="titrerouge">Veuillez entrer votre pseudo et e-mail enregistrés lors de votre inscription:</h1>  <br/>
          	  <label for="pseudo">Pseudo :</label><input type="text" name="pseudo" id="pseudo"   size="10" maxlength="30"  />
             
              <label for="Mail">E-mail :</label> <input type="email" name="Mail" id="Mail"  size="25" maxlength="70"/><br />
              <h4 class="titrerouge">Les champs ne sont pas valides !</h4>  <br/>
          </div>
          <input  name="token" type="hidden"   >
		  <input  name="time" type="hidden"   >
		  
              <h1 class="boutonp3"><input type="submit" value="Valider"  class="bouton3"></h1>
        </form>
    <footer >
    	<?php include("Barrer.php"); ?>
    </footer>
	</section>
  </body>
</html>