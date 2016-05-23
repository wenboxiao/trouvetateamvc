
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
            <p class="centrer"><h3 class="blue">Félicitation, vous avez intégré une nouvelle team !</h3></p>
            <p class="centrer"><img src="image/LOGONtest.png" alt="Logo"/></p>
            
          </div>
            <footer >
                <?php include("Barrer.php"); ?>
            </footer>
       </section>
    </body> 
</html>