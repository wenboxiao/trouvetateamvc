<?php session_start(); ?>
<?php 
        if (isset($_GET['tttd']) AND $_GET['tttd']==true) 
        {
        $_SESSION['tttpseudo']=NULL;
        $_SESSION['tttpass']=NULL;
        $_SESSION['tttville']=NULL;
        $_SESSION['tttmail']=NULL;
        $_SESSION['tttphoto']=NULL;
        $_SESSION['ttttelephone']=NULL;
        $_SESSION['tttnom']=NULL;
        $_SESSION['tttprenom']=NULL;
        $_GET['tttd']=NULL;
        }
        else{
        $_GET['tttd']=NULL;
        }
         ?>
<?php 
    if (isset($_SESSION['tttpseudo'])){
        include("Accueilc.php");
}       
   else{
            include("Accueild.php");
    } 
?>
