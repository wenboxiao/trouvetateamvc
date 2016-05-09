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
      <?php include("Barred.php");?>
        <div class="space"></div>     
        <form method="post" action="Insc.php" class="centrerco">
          <div class="centrerco"><div><input type="text" name="Nom" id="Nom"  placeholder="Nom" size="10" maxlength="30" />
              <input type="text" name="Prenom" id="Prenom" placeholder="Prenom" size="10" maxlength="30"/></div><br />
              <input type="text" name="Pseudo" id="Pseudo" placeholder="*Pseudo" size="25" maxlength="30" /><br />
              <h4 class="titrerouge">le pseudo existe déjà</h4><br />
              <input type="text" name="Telephone" id="Telephone" placeholder="Téléphone" size="25" maxlength="10"/><br />
              <input type="text" name="Ville" id="Ville" placeholder="*Ville" size="25" /><br />
              <input type="email" name="Mail" id="Mail" placeholder="*E-Mail" size="25" maxlength="70"/><br />
              <input type="password" name="Pass" id="Pass" placeholder="*MotDePass" size="25" maxlength="70"/><br />
              <input type="password" name="Confi" id="Confi" placeholder="*Confirmation" size="25" maxlength="70"/><br />
          </div>
              <h1 class="boutonp3"><input type="submit" value="Inscription"  class="bouton3"></h1>
        </form>
        <?php include("Barrer.php"); ?>
    </body> 
</html>