<?php

include 'forum3.php';

if(isset($_GET['id'])) {

	$sujet = recuperer_sujet($_GET['id']);

	if(isset($_POST['message'])) {

		if(!empty($_POST['message'])) {

			if(ajouter_message($_GET['id'], $_POST['message'])) {
				$message = 'Message posté !';
			} else {
				$message = 'Erreur';
			}
		} else {
			$message = 'Tous les champs sont obligatoires';
		}
	}
	
	$messages = recuperer_messages($_GET['id']);

	include 'sujet-2.php';
}

