<?php session_start(); ?>
<?php

   try
        {
    $bddu = new PDO('mysql:host=localhost;dbname=trouve_ta_team;charset=utf8', 'root', '');
        }
    catch(Exception $e)
        {
    die('Erreur : '.$e->getMessage());
        }
        $req = $bddu->prepare('SELECT id_utilisateur FROM utilisateurs WHERE NomUtilisateur = ?');
        $req->execute(array($_SESSION['tttpseudo']));
        if($do = $req->fetch()){
        	$pseudo=$do['id_utilisateur'];
        	$req->closeCursor();}
            
 	$requ = $bddu->prepare('SELECT * FROM appartenance_a_un_groupe WHERE id_utilisateur = ?');

 	$requ->execute(array($pseudo));
 	
 	
 	//if($donneesu = $requ->fetch()){
	

 while ($donneesu = $requ->fetch() ){
 
 	$groupe_id=$donneesu['id_groupe'];
 	
 	
 	$reqi = $bddu->prepare('SELECT * FROM groupes WHERE id_groupe = ?');
 	$reqi->execute(array($groupe_id));
 	
 	if ($donneesi = $reqi->fetch()) {
 		$nomgroupe=$donneesi['nomgroupe'];
 		$description=$donneesi['descriptiongroupe'];
 		$ville_id=$donneesi['ville_id'];
 		$sport_id=$donneesi['id_sport'];
 		$club_id=$donneesi['id_club'];
 		$nbmembres=$donneesi['nombremembres'];
 	
 	
 	
 	$req->closeCursor();
 	
 	$req = $bddu->prepare('SELECT nomsport FROM sports WHERE id_sport = ?');
 	$req->execute(array($sport_id));
 	
 	if ($donnees = $req->fetch()) {
 		$sport=$donnees['nomsport'];
 	}
 	
 	
 	$req->closeCursor();
 	
 	$reqo = $bddu->prepare('SELECT nomclub FROM clubs WHERE id_club = ?');
 	$reqo->execute(array($club_id));
 	
 	if ($donnees = $reqo->fetch()) {
 		$club=$donnees['nomclub'];
 	}
 	
 	
 	$reqo->closeCursor();
 	
 	
 	$reqa = $bddu->prepare('SELECT * FROM villes_france_free WHERE ville_id = ?');
 	$reqa->execute(array($ville_id));
 	
 	if ($donnees = $reqa->fetch()) {
 		$ville=$donnees['ville_nom_reel'];
 	}
 	
 	
 	$reqa->closeCursor();
 	}
 	
 	echo $nomgroupe.'</br>'.
 	 	 $description.
 	'<form method="post"  action="emploi_du_temps_groupe.php">
 			<input  name="id_groupe" type="hidden"  value="'.$groupe_id.'" >
 			<input  name="nom_team" type="hidden"  value="'.$nomgroupe.'" >
 			<input  name="description_team" type="hidden"  value="'.$description.'" >
 			<input  name="ville_team" type="hidden"  value="'.$ville.'" >
 			<input  name="sport_team" type="hidden"  value="'.$sport.'" >
 			<input  name="club_team" type="hidden"  value="'.$club.'" >
 			<input  name="nbmembres" type="hidden"  value="'.$nbmembres.'" >	
 	<form method="post"  action="emploi_du_temps_membres.php">
 	<input  name="id_groupe" type="hidden"  value="'.$groupe_id.'" >
 	<button type="submit">+ de détails</button></form></form>'.'</br>';
 	
 	
 	
 }
 	$requ->closeCursor();
 	
 	
 	//else{ $requ->closeCursor();
 		//echo "Vous n'avez pas encore rejoint de team!";}
 
   
?>
