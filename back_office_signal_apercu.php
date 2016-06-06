<?php session_start(); 
    include('TTT_BDD.php');
    $reqm =  $bdd->query('SELECT * FROM utilisateurs WHERE is_banned=\'0\''); //On récupère tous les membres pas actifs
    while ($donnees = $reqm->fetch())
    {
        $date_connexion = $donnees['derniere_connexion'];
        $Datec=explode('-',$date_connexion);
        $dateco=mktime(0,0,0,$Datec[1],$Datec[2],$Datec[0]);
        $date = time();
        $difference = $date - $dateco;
        $nbreSecondesAn = (3600*24)*365;
        if ($difference > $nbreSecondesAn AND $date_connexion!='0000-00-00')//On supprime le membre
        {
            $requ = $bdd->prepare('DELETE FROM utilisateurs WHERE id_utilisateur= :id_utilisateur ');
            $requ->execute(array(
                'id_utilisateur' => $donnees['id_utilisateur']
        ));
        }
    }
?>
<?php include("back_office_verif.php"); ?>
<!DOCTYPE html>
<html>
 	<head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="stylettt.css" />
        <link rel="stylesheet" href="Am.css" />
        <link rel="icon" type="image/png" href="image/faviconessai.png" />
        <title><?php include("Nom_site.php"); ?></title>
    </head>
    <body>
    	<?php 
        if ((!isset($_SESSION['tttpseudo']))&&(!isset($_SESSION['tttpass']))) {
            include("Barred.php");
        }
        else {
            include("Barrec.php");
        }
        ?>  
        <h1 class="titrevert"> Signalements effectués </h1>
        <p class="centrerco"> Des utilisateurs ont signalés les abus suivants :
        </p>
        <?php include("back_office_signal_affichage.php"); ?>
        <?php include("Barrer.php"); ?>
    </body> 
</html>