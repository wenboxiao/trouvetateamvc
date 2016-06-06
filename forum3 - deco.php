<?php

function recuperer_sports() {

	global $pdo;
	return $pdo->query('SELECT * FROM sport');
}

function recuperer_sujets_aide() {

	global $pdo;
	return $pdo->query('SELECT * FROM forum_sujet WHERE id_sport = 0');
}

function ajouter_sujet($titre, $message, $sport) {

	global $pdo;
	$stmt = $pdo->prepare('INSERT INTO forum_sujet SET titre = :titre,
												message = :h,
												id_membre = :id_membre,
												id_sport = :sport,
												date = NOW()');
	$stmt->bindValue('titre', $titre);
	$stmt->bindValue('h', $message);
	$stmt->bindValue('sport', $sport);
	$stmt->bindValue('id_membre', $_SESSION['tttpseudo']);
	if($stmt->execute()) {
		return $pdo->lastInsertId();
	} else {
		return false;
	}
}

function recuperer_sujet($id) {
	global $pdo;
	$stmt = $pdo->prepare('SELECT * FROM forum_sujet 
											JOIN utilisateurs ON utilisateurs.NomUtilisateur = forum_sujet.id_membre
											WHERE forum_sujet.id = :id');
	$stmt->bindValue('id', $id);
	if($stmt->execute()) {
		return $stmt->fetch();
	} else {
		return false;
	}
}
/*function compteur($id) {
	$i=0;
	global $pdo;
	$stmt=$pdo->prepare('select * FROM forum_message
											JOIN utilisateurs ON utilisateurs.NomUtilisateur =forum_message.id_membre
											WHERE forum_message.id_sujet = ?');
	
	$hey=array($stmt);
	while ($donnees = $hey->fetch()){
		$i++;
	}
	return $i;
	/*if($stmt->execute()){
		return $stmt-fetchAll();
	}
	else{
		return false;
	}
}*/

function ajouter_message($id_sujet, $message) {

	global $pdo;
	$stmt = $pdo->prepare('INSERT INTO forum_message SET message = :message,
												id_membre = :id_membre,
												id_sujet = :id_sujet,
												date = NOW()');
	$stmt->bindValue('id_sujet', $id_sujet);
	$stmt->bindValue('message', $message);
	$stmt->bindValue('id_membre', $_SESSION['tttpseudo']);
	if($stmt->execute()) {
		return true;
	} else {
		return false;
	}
}

function recuperer_messages($id) {
	global $pdo;
	$stmt = $pdo->prepare('SELECT * FROM forum_message 
											JOIN utilisateurs ON utilisateurs.NomUtilisateur = forum_message.id_membre
											WHERE forum_message.id_sujet = :id');
	$stmt->bindValue('id', $id);
	if($stmt->execute()) {
		return $stmt->fetchAll();
	} else {
		return false;
	}
}

function recuperer_sujets_sport($id) {
	global $pdo;
	$stmt = $pdo->prepare('SELECT forum_sujet.id AS id_sujet, forum_sujet.*, membre.* FROM forum_sujet 
											JOIN membre ON membre.id = forum_sujet.id_membre
											WHERE forum_sujet.id_sport = :id');
	$stmt->bindValue('id', $id);
	if($stmt->execute()) {
		return $stmt->fetchAll();
	} else {
		return false;
	}
}

function recuperer_sport($id) {
	global $pdo;
	$stmt = $pdo->prepare('SELECT * FROM sport 
											WHERE id = :id');
	$stmt->bindValue('id', $id);
	if($stmt->execute()) {
		return $stmt->fetch();
	} else {
		return false;
	}
}