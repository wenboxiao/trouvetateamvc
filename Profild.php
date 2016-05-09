<?php session_start(); ?>
 <?php
    try
        {
    $bddu = new PDO('mysql:host=localhost;dbname=trouve_ta_team;charset=utf8', 'root', '');
        }
    catch(Exception $e)
        {
    die('Erreur : '.$e->getMessage());
        }

    $requ = $bddu->prepare('SELECT * FROM utilisateurs WHERE NomUtilisateur = ?');
    $requ->execute(array($_SESSION['tttpseudo']));


    
    if($donneesu = $requ->fetch()){

        $ville_id=$donneesu['ville_id'];
        $_SESSION['tttmail']=$donneesu['Mail'];
        $_SESSION['tttphoto']=$donneesu['UrlPhoto'];
        $_SESSION['ttttelephone']=$donneesu['Telephone'];
        $_SESSION['tttnom']=$donneesu['Nom'];
        $_SESSION['tttprenom']=$donneesu['Prenom'];
        
    }
    $requ->closeCursor();

    $reqi = $bddu->prepare('SELECT ville_nom_reel FROM villes_france_free WHERE ville_id = ?');
    $reqi->execute(array($ville_id));

    if ($donneesi = $reqi->fetch()) {
        $_SESSION['tttville']=$donneesi['ville_nom_reel'];
    }


    $reqi->closeCursor();
    header('Location: Trouvetateam.php');
?>
