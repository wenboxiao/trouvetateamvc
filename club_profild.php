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
            
 	$requ = $bddu->prepare('SELECT * FROM clubs WHERE id_utilisateur = ?');

 	$requ->execute(array($pseudo));
 	
 	
 	//if($donneesu = $requ->fetch()){
	

 while ($donneesu = $requ->fetch() ){
 	
 	
 
 	
 	$ville_id=$donneesu['ville_id'];
 	
 	
 	$reqi = $bddu->prepare('SELECT * FROM sport_du_club WHERE id_club = ?');
 	$reqi->execute(array($donneesu['id_club']));
 	
 	if ($donneesi = $reqi->fetch()) {
 		$sport_id=$donneesi['id_sport'];
 	}
 	
 	
 	$reqi->closeCursor();
 
 	
 	
 	
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
 	
 	echo $donneesu['nomclub'].
 	'<form method="post"  action="club_profil.php">
 			<input  name="id_club" type="hidden"  value="'.$donneesu['id_club'].'" >
 			<input  name="nom_club" type="hidden"  value="'.$donneesu['nomclub'].'" >
 			<input  name="description_club" type="hidden"  value="'.$donneesu['descriptionclub'].'" >
 			<input  name="ville_club" type="hidden"  value="'.$ville.'" >
 			<input  name="sport_club" type="hidden"  value="'.$sport.'" >
 			<input  name="adresse_club" type="hidden"  value="'.$donneesu['adresse'].'" >
 			<input  name="mail_club" type="hidden"  value="'.$donneesu['mailclub'].'" >
 					<button type="submit">+ de détails</button></form>'.'</br>';
 	
 	}
 	$requ->closeCursor();

 	
 	//else{ $requ->closeCursor();
 		//echo "Vous n'administrez pas encore de teams!";}
 
   
?>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              