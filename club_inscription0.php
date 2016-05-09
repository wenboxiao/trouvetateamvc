<?php session_start(); ?>
<?php 

if ((isset($_SESSION['tttpseudo'])==false)&&(isset($_SESSION['tttpass'])==false)) {
    include("Connexion1.php");
}
else
{
    include("club_inscription.php");
}
?>