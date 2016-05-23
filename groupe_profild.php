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
            
 	$requ = $bddu->prepare('SELECT * FROM groupes WHERE id_utilisateur = ?');

 	$requ->execute(array($pseudo));
 	
 	
 	//if($donneesu = $requ->fetch()){
	

 while ($donneesu = $requ->fetch() ){
 
 	$ville_id=$donneesu['ville_id'];
 	$sport_id=$donneesu['id_sport'];
 	$club_id=$donneesu['id_club'];
 	
 	$reqi = $bddu->prepare('SELECT ville_nom_reel FROM villes_france_free WHERE ville_id = ?');
 	$reqi->execute(array($ville_id));
 	
 	if ($donneesi = $reqi->fetch()) {
 		$ville=$donneesi['ville_nom_reel'];
 	}
 	
 	
 	$reqi->closeCursor();
 	
 	$reqi = $bddu->prepare('SELECT nomsport FROM sports WHERE id_sport = ?');
 	$reqi->execute(array($sport_id));
 	
 	if ($donneesi = $reqi->fetch()) {
 		$sport=$donneesi['nomsport'];
 	}
 	
 	
 	$reqi->closeCursor();
 	
 	$reqi = $bddu->prepare('SELECT nomclub FROM clubs WHERE id_club = ?');
 	$reqi->execute(array($club_id));
 	
 	if ($donneesi = $reqi->fetch()) {
 		$club=$donneesi['nomclub'];
 	}
 	
 	
 	$reqi->closeCursor();
 	
 	
 	echo $donneesu['nomgroupe'].
 	'<form method="post"  action="groupe_profil.php">
 			<input  name="id_groupe" type="hidden"  value="'.$donneesu['id_groupe'].'" >
 			<input  name="nom_team" type="hidden"  value="'.$donneesu['nomgroupe'].'" >
 			<input  name="description_team" type="hidden"  value="'.$donneesu['descriptiongroupe'].'" >
 			<input  name="ville_team" type="hidden"  value="'.$ville.'" >
 			<input  name="sport_team" type="hidden"  value="'.$sport.'" >
 			<input  name="club_team" type="hidden"  value="'.$club.'" >
 			<input  name="nbmembres" type="hidden"  value="'.$donneesu['nombremembres'].'" >		
 					<button type="submit">+ de détails</button></form>'.'</br>';
 
 	

 	
 	
 }
 	$requ->closeCursor();

 	
 	//else{ $requ->closeCursor();
 		//echo "Vous n'administrez pas encore de teams!";}
 
   
?>
