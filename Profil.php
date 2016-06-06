<?php session_start(); 
    if (isset($_SESSION['tttpseudo'])==False) {
        header('Location: Trouvetateam.php');
            }
    include('TTT_BDD.php');
    $reqo = $bdd->prepare('SELECT * FROM utilisateurs WHERE NomUtilisateur = ?');
    $reqo->execute(array($_SESSION['tttpseudo']));
    if($donnees = $reqo->fetch()){
        $Nom=$donnees['Nom'];
        $Prenom=$donnees['Prenom'];
        $Telephone=$donnees['Telephone'];
        $Mail=$donnees['Mail'];
        $ville_id=$donnees['ville_id'];
        $UrlPhoto=$donnees['UrlPhoto'];
        $reqo->closeCursor();
        $reqa = $bdd->prepare('SELECT ville_nom_reel FROM villes_france_free WHERE ville_id = ?');
        $reqa->execute(array($ville_id)); 
        if($donne = $reqa->fetch()){
            $Ville=$donne['ville_nom_reel'];
             $reqa->closeCursor();}
    }
?>
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
     <?php include("Barrec.php"); ?>
     <section>
     <div class="profil">
        <?php if (isset($UrlPhoto) AND $UrlPhoto!="") {
        echo '<div class="spacearound"><div class="space2"></div><img src="'; echo $UrlPhoto ;echo'" alt="Photo de Profil" class="Photo"/><div class="space2"></div></div>';} ?>
     	<div class="spacearound"><div class="space2"></div><h3 class="blue">Pseudo </h3> <h3 class="green"><?php echo  $_SESSION['tttpseudo']; ?></h3><div class="space2"></div></div>
     	<?php if (isset($Nom) AND $Nom!="") {
        echo '<div class="spacearound"><div class="space2"></div><h3 class="blue">Nom </h3> <h3 class="green">'; echo  $Nom; echo '</h3><div class="space2"></div></div>';} ?>
        <?php if (isset($Prenom) AND $Prenom!="") {
        echo '<div class="spacearound"><div class="space2"></div><h3 class="blue">Prenom </h3> <h3 class="green">'; echo  $Prenom; echo '</h3><div class="space2"></div></div>';} ?>
        <?php if (isset($Ville) AND $Ville!="") {
        echo '<div class="spacearound"><div class="space2"></div><h3 class="blue">Ville </h3> <h3 class="green">'; echo  $Ville; echo '</h3><div class="space2"></div></div>';} ?>
<?php if (isset($Telephone) AND $Telephone!="") {
        echo '<div class="spacearound"><div class="space2"></div><h3 class="blue">Telephone </h3> <h3 class="green">'; echo  '0'; echo $Telephone; echo '</h3><div class="space2"></div></div>';} ?>
<?php if (isset($Mail) AND $Mail!="") {
        echo '<div class="spacearound"><div class="space2"></div><h3 class="blue">Mail </h3> <h3 class="green">'; echo  $Mail; echo '</h3><div class="space2"></div></div>';} ?>
        <div class="spacearound"><div class="space2"></div><h3 class="blue">Mot de passe </h3> <h3 class="green">Top Secret</h3><div class="space2"></div></div>
        <div class="spacearound"><h3><a href="Profil_modif.php" class="bouton3"> Modifier </a></h3></div>
    </div>
    <footer >
    	<?php include("Barrer.php"); ?>
    </footer>
	</section>
  </body>
</html>