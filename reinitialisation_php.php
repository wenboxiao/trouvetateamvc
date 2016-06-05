<?php session_start(); ?>
<?php 	

include('TTT_BDD.php');

//===adresse mail de l'administrateur
$req = $bdd->prepare('SELECT * FROM utilisateurs WHERE DroitAdmin = ?');
$req->execute(array(2));
if($donne = $req->fetch()){
	$Mailadmin=$donne['Mail'];}
	$req->closeCursor();
	
		if ((isset($_POST['pseudo'])) AND (isset($_POST['Mail'])) ) {
	
			$reqa = $bdd->prepare('SELECT * FROM utilisateurs WHERE NomUtilisateur = ?');
			$reqa->execute(array($_POST['pseudo']));
				if($donne = $reqa->fetch()){
					$Mail=$donne['Mail'];
					$id=$donne['id_utilisateur'];
					$pseudo=$donne['NomUtilisateur'];
					$reqa->closeCursor();
				$requ = $bdd->prepare('SELECT * FROM utilisateurs WHERE Mail = ?');
				$requ->execute(array($_POST['Mail']));
				if($donn = $requ->fetch()){
					if($Mail==$_POST['Mail'] AND $pseudo==$donn['NomUtilisateur']){ //vérification de l'utilisateur faisant la demande
						
				    
						$token = bin2hex(openssl_random_pseudo_bytes(16)); //génération d'une chaine aléatoire
						
						$time=time();  // horloge
						
						
						 
						
 			
						
						
				
// Envoi du mail : 
				
						
						
$destinataire = $Mail;
$expediteur   = $Mailadmin;
$reponse      = $expediteur;


$codehtml=
    '<html><body>'.
    '<h1>RÃ©cupÃ©ration de votre mot de passe.</h1>'.
    'Votre compte  sous le pseudo:'.'<b>'.$pseudo.'</b><br>'.
    
    'Voici votre code pour vous connecter:'.'<b>'.$token.'</b><br><br>'.
    'ATTENTION ce code sera valide pendant une periode de 10 minutes'.'<br>'.
    'Ceci est un e-mail automatique, merci de ne pas rÃ©pondre. '.'</body></html>';
mail($destinataire,
     '[Trouve Ta Team] RÃ©cupÃ©ration Mot de Passe',
     $codehtml,
     "From: $expediteur\r\n".
        "Reply-To: $reponse\r\n".
        "Content-Type: text/html; charset=\"UTF-8\"\r\n");
						
//=====================

     
     $_POST['token']=$token;
     $_POST['time']=$time;
     $_POST['pseudo']=$pseudo;
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
	
		
		

		
					

?>