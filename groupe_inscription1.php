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
        <form method="post" action="groupe_php.php" class="centrerco">
          <div class="centrerco">
          	
            
            <div><input type="text" name="Nom_team" id="Nom_team"  placeholder="*Nom de la team" size="25" maxlength="70" />*</div><br />
              <h4 class="titrerouge">Le nom existe déjà!</h4><br />
              <div><input type="text" name="Sport" id="Sport" placeholder="*Sport" size="25" />*</div><br />
              <div><input type="text" name="Ville" id="Ville" placeholder="*Ville" size="25"  />*</div><br />
              <input type="text" name="Sport" id="Sport" placeholder="*Sport" size="25" /><br />
              <input type="text" name="Ville" id="Ville" placeholder="*Ville" size="25"  /><br />
              <input type="text" name="Club" id="Club" placeholder="Club" size="25" /><br />
              
		<textarea name="description" id="description" rows="10" cols="50" placeholder="Description du groupe"/></textarea> <br />      
            
             
          </div>
              <h1 class="boutonp3"><input type="submit" value="Créer ta team"  class="bouton3"></h1>
        </form>
        <?php include("Barrer.php"); ?>
    </body> 
</html>