<?php
include('TTT_BDD.php');

$req = $bdd->prepare('SELECT * FROM appartenance_a_un_groupe WHERE id_groupe = ? AND id_utilisateur= ?');
$req->execute(array($_POST['Groupe'],$_POST['Utilisateur']));
if($do = $req->fetch()){
	include('recherche_bienvenue_erreur.php');
}
else{	$pseudo=$do['id_utilisateur'];
	$req->closeCursor();

$req = $bdd->prepare('INSERT INTO appartenance_a_un_groupe(id_groupe, id_utilisateur, statut) VALUES( :id_groupe, :id_utilisateur, 1)');
$req->execute(array(
		'id_groupe' => $_POST['Groupe'],
		'id_utilisateur' => $_POST['Utilisateur'],
));
$req->closeCursor();




$requ = $bdd->prepare('UPDATE groupes SET nombremembres = :nv_membre WHERE id_groupe = :idgroupe');
$requ->execute(array(
		'nv_membre' =>$_POST['Nbmembres']+1, 
		'idgroupe' => $_POST['Groupe'],
));
$requ->closeCursor();

include("recherche_bienvenue_public.php");}
?>