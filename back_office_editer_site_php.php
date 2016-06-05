<?php

if(($_POST['url_logo']!="") && ($_POST['Email_contact']!="") && ($_POST['Nom_site']!="") && ($_POST['Conditions']!="") && ($_POST['Mentions_legales']!="")) {
	try {
	    include('TTT_BDD.php');
	}
	catch(Exception $e) {
	    die('Erreur : '.$e->getMessage());
	}

	$date= date("Y-m-d");

	$req = $bdd -> prepare('INSERT INTO formulaire_admin(logo, email_de_contact, nom_du_site, conditions_d_utilisation, mentions_legales, date_modification) VALUES (:logo, :email, :nom_du_site, :conditions, :mentions_legales, :date_modifications)');
	$req -> execute(array(	'logo' => $_POST['url_logo'],
							'email' => $_POST['Email_contact'],
							'nom_du_site' =>  $_POST['Nom_site'],
							'conditions' => $_POST['Conditions'],
							'mentions_legales' => $_POST['Mentions_legales'],
							'date_modifications' => $date
						));

	include('back_office_editer_site_termine.php');
}
else {
	include("back_office_editer_site.php");
	//header('Location: http://localhost/trouvetateamvc/back_office_editer_site.php');
}
?>