<!DOCTYPE html>
<html>

  <head>
      <meta charset="utf-8" />
      <link rel="stylesheet" href="stylettt.css" />
      <link rel="stylesheet" href="Am.css" />
      <link rel="icon" type="image/png" href="image/faviconessai.png" />
      <title>Trouve ta Team</title>
  </head>
    <body>
      <?php include("Barrec.php");?>
        <div class="space"></div>     
        <form method="post" action="club_php.php" class="centrerco">
          <div class="centrerco">
          	<input type="text" name="id_club" id="id_club"  placeholder="*Immatriculation du club" size="25" /><br />
          	<input type="text" name="Nom_club" id="Nom_club"  placeholder="*Nom du club" size="25" /><br />
              <input type="text" name="Sport" id="Sport" placeholder="*Sport" size="25" /><br />
              <input type="text" name="Ville" id="Ville" placeholder="*Ville" size="25"  /><br />
              <h4 class="titrerouge">La ville n'est pas reconnu ! </h4><br />
              <input type="text" name="Adresse" id="Adresse" placeholder="Adresse" size="25" /><br />
               <input type="email" name="Mail" id="Mail" placeholder="*E-Mail" size="25" maxlength="70"/><br />
              
			<textarea name="description" id="description" rows="10" cols="50" placeholder="Description du club"/></textarea> <br />      
            
             
          </div>
              <h1 class="boutonp3"><input type="submit" value="Ajoute ton club"  class="bouton3"></h1>
        </form>
        <?php include("Barrer.php"); ?>
    </body> 
</html>
