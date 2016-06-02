<?php session_start(); ?>
 <?php
    try
        {
   include('TTT_BDD.php');
        }
    catch(Exception $e)
        {
    die('Erreur : '.$e->getMessage());
        }

    $requ = $bdd->prepare('SELECT * FROM utilisateurs WHERE NomUtilisateur = ?');
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

    $reqi = $bdd->prepare('SELECT ville_nom_reel FROM villes_france_free WHERE ville_id = ?');
    $reqi->execute(array($ville_id));

    if ($donneesi = $reqi->fetch()) {
        $_SESSION['tttville']=$donneesi['ville_nom_reel'];
    }


    $reqi->closeCursor();
    header('Location: Trouvetateam.php');
?>
