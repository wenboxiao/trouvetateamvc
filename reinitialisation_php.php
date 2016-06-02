<?php session_start(); ?>
<?php 	

include('TTT_BDD.php');

//===adresse mail de l'administrateur
$req = $bdd->prepare('SELECT * FROM utilisateurs WHERE DroitAdmin = ?');
$req->execute(array(1));
if($donne = $req->fetch()){
	$Mailadmin=$donne['Mail'];}
	$req->closeCursor();
	
		if ((isset($_POST['pseudo'])) AND (isset($_POST['Mail'])) ) {
	
			$reqa = $bdd->prepare('SELECT * FROM utilisateurs WHERE NomUtilisateur = ?');
			$reqa->execute(array($_POST['pseudo']));
				if($donne = $reqa->fetch()){
					$Mail=$donne['Mail'];
					$pseudo=$donne['NomUtilisateur'];
					$reqa->closeCursor();
				$requ = $bdd->prepare('SELECT * FROM utilisateurs WHERE Mail = ?');
				$requ->execute(array($_POST['Mail']));
				if($donn = $requ->fetch()){
					if($Mail==$_POST['Mail'] AND $pseudo==$donn['NomUtilisateur']){ //v�rification de l'utilisateur faisant la demande
						
						$pass=$donn['MotDePass'];
				
						
						
				
// Envoi du mail : 
				
						
						
$destinataire = $Mail;
$expediteur   = $Mailadmin;
$reponse      = $expediteur;


$codehtml=
    '<html><body>'.
    '<h1>Récupération de votre mot de passe.</h1>'.
    'Votre compte Trouve Ta Team sous le pseudo:'.'<b>'.$pseudo.'</b><br>'.
    
    'Voici votre mot de passe:'.'<b>'.$pass.'</b><br><br>'.
    'Ceci est un e-mail automatique, merci de ne pas répondre. '.'</body></html>';
mail($destinataire,
     '[Trouve Ta Team] Récupération Mot de Passe',
     $codehtml,
     "From: $expediteur\r\n".
        "Reply-To: $reponse\r\n".
        "Content-Type: text/html; charset=\"UTF-8\"\r\n");
						
//=====================

     
     
     
				include ("reinitialisation_mot_de_passe2.php");
					}
				else{		
				$requ->closeCursor();
				include ("reinitialisation_mot_de_passe1.php");}
				}
			else{
				$requ->closeCursor();
				include ("reinitialisation_mot_de_passe1.php");}
				}
				else{
					$reqa->closeCursor();
				include ("reinitialisation_mot_de_passe1.php");}
				}
	
		else{
			
			include ("reinitialisation_mot_de_passe1.php");}
		
		



?>