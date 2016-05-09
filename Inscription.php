<?php session_start(); ?>
<?php 

if ((isset($_SESSION['tttpseudo'])==false)&&(isset($_SESSION['tttpass'])==false)) {
    include("Inscription1.php");
}
else
{
    include("Connexion3.php");
}
?>