<?php session_start(); ?>
<?php
if ((isset($_POST['code']))){
	if($_POST['code']!=""){
		if($_POST['code']==$_POST['token'] AND time()<=($_POST['time']+(600))){         // avoir un code identique et moins de 10 min depuis le mail

			$_SESSION['tttpseudo']=$_POST['pseudo'];
			$_SESSION['tttpass']=1;
			header('Location: Profild.php');
		}
			
		else{
			
			
			
			include ("reinitialisation_mot_de_passe3.php");}
	}
	
	else{
			
			
			
		include ("reinitialisation_mot_de_passe3.php");}
	

}