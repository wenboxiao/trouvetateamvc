<?php session_start(); ?>
<?php include("back_office_verif_admin.php"); ?>
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
    	<?php include("Barrec.php"); ?> 
        <h1 class="titrevert"> Mettre un logo en ligne </h1>
        <p class="centrerco"> Voici l'emplacement pour mettre en ligne le logo du site : vous pouvez ici le mettre sur le site le logo, et son url sera ensuite ajoutée au formulaire servant à l'édition du site.
        </p>
        <div class="space"></div>     
        <form action="back_office_editer_upload_traitement.php" method="post" enctype="multipart/form-data">
          <p>Formulaire d'envoi de fichier : <br/>
            <input type="file" name="logo_site" />
            <input type="submit" value="Mettre en ligne le fichier" />
          </p>
        </form>
    </body> 
</html>