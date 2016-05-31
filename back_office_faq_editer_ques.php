<?php


try {
    $bddo = new PDO('mysql:host=localhost;dbname=trouve_ta_team;charset=utf8', 'root', '');
}
catch(Exception $e) {
    die('Erreur : '.$e->getMessage());
}

$question="";
$reponse="";
$id_question="new";
if(isset($_POST['modification'])) {
	$req = $bddo->prepare('SELECT * FROM faq WHERE id_question=?');
	$req -> execute(array($_POST['modification']));

	if ($donnees = $req->fetch() ){
	    $question=$donnees['question_theme'];
	    $reponse=$donnees['Texte'];
	    $id_question=$donnees['id_question'];
	}
	$req->closeCursor();
}

echo '<form method="post" action="back_office_faq.php" class="centrerco">
		<p>
			<div></div>
	        <label for="question">Question : </label><br/>
	        <textarea name="question" id="question" rows="2" cols="90">'
	        .$question.
	        '</textarea><br/><div class="space"></div>
	        <label for="reponse">Reponse : </label><br/>
	        <textarea name="reponse" id="reponse" rows="7" cols="90">'
	        .$reponse.
	        '</textarea>
        <p>
        <input name="edition" type="hidden" value="'.$id_question.'">
	    <button type="submit">Editer</button>
    </form>';
 

?>