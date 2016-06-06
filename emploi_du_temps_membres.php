
<?php

   try
        {
   include('TTT_BDD.php');
        }
    catch(Exception $e)
        {
    die('Erreur : '.$e->getMessage());
        }
        $requ = $bdd->prepare('SELECT * FROM appartenance_a_un_groupe WHERE id_groupe = ?');
        $requ->execute(array($_POST['id_groupe']));
    


 while ($donnees = $requ->fetch() ){
 
 	$utilisateur=$donnees['id_utilisateur'];
 	
 	
 	$reqi = $bdd->prepare('SELECT * FROM utilisateurs WHERE id_utilisateur = ?');
 	$reqi->execute(array($utilisateur));
 	
 	if ($donneesi = $reqi->fetch()) {
 		$nom=$donneesi['Nom'];
 		$prenom=$donneesi['Prenom'];
 		$ville_id=$donneesi['ville_id'];
 		$mail=$donneesi['Mail'];
 		$telephone=$donneesi['Telephone'];
 		
 	
 	
 	

 	
 	
 	$reqa = $bdd->prepare('SELECT * FROM villes_france_free WHERE ville_id = ?');
 	$reqa->execute(array($donneesi['ville_id']));
 	
 	if ($donnees = $reqa->fetch()) {
 		$ville=$donnees['ville_nom_reel'];
 	}
 	
 	
 	$reqa->closeCursor();
 	}
 	$reqi->closeCursor();
 	
 	echo htmlspecialchars($nom).'       '.htmlspecialchars($prenom).'</br>'.
 	 	 htmlspecialchars($ville).'</br>'.
 	 	 '0'.htmlspecialchars($telephone).'</br>'.
 	 	 htmlspecialchars($mail).'</br>'.'</br>';

 }
 	$requ->closeCursor();
 	

   
?>