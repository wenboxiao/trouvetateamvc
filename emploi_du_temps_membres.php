
<?php

   try
        {
    $bddu = new PDO('mysql:host=localhost;dbname=trouve_ta_team;charset=utf8', 'root', '');
        }
    catch(Exception $e)
        {
    die('Erreur : '.$e->getMessage());
        }
        $requ = $bddu->prepare('SELECT * FROM appartenance_a_un_groupe WHERE id_groupe = ?');
        $requ->execute(array($_POST['id_groupe']));
    


 while ($donnees = $requ->fetch() ){
 
 	$utilisateur=$donnees['id_utilisateur'];
 	
 	
 	$reqi = $bddu->prepare('SELECT * FROM utilisateurs WHERE id_utilisateur = ?');
 	$reqi->execute(array($utilisateur));
 	
 	if ($donneesi = $reqi->fetch()) {
 		$nom=$donneesi['Nom'];
 		$prenom=$donneesi['Prenom'];
 		$ville_id=$donneesi['ville_id'];
 		$mail=$donneesi['Mail'];
 		$telephone=$donneesi['Telephone'];
 		
 	
 	
 	

 	
 	
 	$reqa = $bddu->prepare('SELECT * FROM villes_france_free WHERE ville_id = ?');
 	$reqa->execute(array($donneesi['ville_id']));
 	
 	if ($donnees = $reqa->fetch()) {
 		$ville=$donnees['ville_nom_reel'];
 	}
 	
 	
 	$reqa->closeCursor();
 	}
 	$reqi->closeCursor();
 	
 	echo $nom.'       '.$prenom.'</br>'.
 	 	 $ville.'</br>'.
 	 	 '0'.$telephone.'</br>'.
 	 	 $mail.'</br>'.'</br>';

 }
 	$requ->closeCursor();
 	

   
?>