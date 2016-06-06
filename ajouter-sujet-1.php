<?php

include 'forum3.php';

if(isset($_POST['titre']) && isset($_POST['message'])) {

	if(!empty($_POST['titre']) && !empty($_POST['message'])) {

		if(isset($_GET['sport'])) {
			$sport = $_GET['sport'];
		} else {
			$sport = 0;
		}

		$id_sujet = ajouter_sujet($_POST['titre'], $_POST['message'], $sport);

		if($id_sujet) {

//			header('Location: ?page=sujet&id=' . $id_sujet);
			exit();
		} else {
			$message='Impossible de rentrer dans la base de données';
		}
	} else {
		$message = 'Tous les champs sont obligatoires';
	}
}

include 'forum-ajouter-sujet-2.php';