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
        <title>Trouve ta Team</title>
  </head>
  <body>
     <?php include("Barrec.php"); ?>
     <section>
 
        
          <div class="centrerco">
          <div class="spacearound"> <h2 class="titrerouge">Mes Teams:</h2></div><br />
          
         <p> 
         
			<?php include("groupe_profild.php")?>
		 </p>
			  </div> 
       
        
         
          <div class="centrerco">
          <div class="spacearound"> <h2 class="titrerouge">Mes Clubs:</h2></div><br />
       
          <p>
          	  <?php include("club_profild.php")?>
          </p>  
          
        </div> 
    <footer >
    	<?php include("Barrer.php"); ?>
    </footer>
	</section>
  </body>
</html>