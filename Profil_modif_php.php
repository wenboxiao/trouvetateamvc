<?php session_start(); ?>
<?php 	

include('TTT_BDD.php');

$req = $bdd->prepare('SELECT id_utilisateur FROM utilisateurs WHERE NomUtilisateur = ?');
$req->execute(array($_SESSION['tttpseudo']));
if($do = $req->fetch()){
	$pseudo=$do['id_utilisateur'];
	$req->closeCursor();}
	
		if ((isset($_POST['Ville'])) ) {
	
			$reqa = $bdd->prepare('SELECT ville_id FROM villes_france_free WHERE ville_nom_reel = ?');
			$reqa->execute(array($_POST['Ville']));	
				if($donne = $reqa->fetch()){
					$_SESSION['tttville'] = $_POST['Ville'];
					$ville =$donne['ville_id'];
					$reqa->closeCursor();
								
				$requ = $bdd->prepare('UPDATE utilisateurs SET ville_id = :nv_ville WHERE id_utilisateur = :pseudo');
				$requ->execute(array(
						'nv_ville' => $ville,
						'pseudo' => $pseudo,			
				));			
				$requ->closeCursor();
				}
			
			else{
				$req->closeCursor();
				include("Profil_modif1.php");}
		
		}
	
		
		
		


if ((isset($_POST['Nom'])) ) {
	
			$_SESSION['tttnom'] = $_POST['Nom'];
			$requ = $bdd->prepare('UPDATE utilisateurs SET Nom = :nv_nom WHERE id_utilisateur = :pseudo');
			$requ->execute(array(
					'nv_nom' => $_POST['Nom'],
					'pseudo' => $pseudo,
			));
			$requ->closeCursor();
	}
	
	if ((isset($_POST['Prenom'])) ) {

			$_SESSION['tttprenom'] = $_POST['Prenom'];
			$requ = $bdd->prepare('UPDATE utilisateurs SET Prenom = :nv_prenom WHERE id_utilisateur = :pseudo');
			$requ->execute(array(
					'nv_prenom' => $_POST['Prenom'],
					'pseudo' => $pseudo,
			));
			$requ->closeCursor();
	}
	
	if ((isset($_POST['Telephone'])) ) {
	
			$_SESSION['ttttelephone'] = $_POST['Telephone'];
			$requ = $bdd->prepare('UPDATE utilisateurs SET Telephone = :nv_tel WHERE id_utilisateur = :pseudo');
			$requ->execute(array(
					'nv_tel' => $_POST['Telephone'],
					'pseudo' => $pseudo,
			));
			$requ->closeCursor();
	}
		
		
		if ((isset($_POST['Mail'])) ) {
			
		
				$_SESSION['tttmail'] = $_POST['Mail'];
				$requ = $bdd->prepare('UPDATE utilisateurs SET Mail = :nv_mail WHERE id_utilisateur = :pseudo');
				$requ->execute(array(
						'nv_mail' => $_POST['Mail'],
						'pseudo' => $pseudo,
				));
				$requ->closeCursor();}
				
				
				if ((isset($_POST['Pass'])) ) {
				
				
					if (MD5($_POST['Pass'])!=MD5($_POST['Confi'])){
						include("Profil_modif2.php");}
							
					elseif($_POST['Pass']!=""){
							
							$requ = $bdd->prepare('UPDATE utilisateurs SET MotDePass = :nv_pass WHERE id_utilisateur = :pseudo');
							$requ->execute(array(
									'nv_pass' => MD5($_POST['Pass']),
									'pseudo' => $pseudo,
							));
							$requ->closeCursor();
						}
							
				}
	include("profil_modif3.php");
		
?>