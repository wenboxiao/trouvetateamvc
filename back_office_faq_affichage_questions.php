<?php

try {
    $bddz = new PDO('mysql:host=localhost;dbname=trouve_ta_team;charset=utf8', 'root', '');
}
catch(Exception $e) {
    die('Erreur : '.$e->getMessage());
}

if(isset($_POST['suppression'])) {
    $req = $bddz -> prepare('DELETE FROM faq WHERE id_question = ?');
    $req -> execute(array($_POST['suppression']));
    echo '<p class="titrerouge">La Question/Réponse a bien été supprimée de la base de données. </p>';
}

if(isset($_POST['edition'])) {
    if($_POST['edition']=="new") {
        $req = $bddz -> prepare('INSERT INTO faq(question_theme, Texte) VALUES (?, ?)');
        $req -> execute(array($_POST['question'],
                            $_POST['reponse']
                                ));
        echo '<p class="titrerouge">La Question/Réponse a bien été ajoutée à la base de données. </p>';
    }
    else {
        $req = $bddz -> prepare('UPDATE faq SET question_theme = :question, Texte = :texte WHERE id_question = :id_question');
        $req -> execute(array(
                'question' => $_POST['question'],
                'texte' => $_POST['reponse'],
                'id_question' => $_POST['edition']
                ));
        echo '<p class="titrerouge">La Question/Réponse a bien été modifiée sur la base de données. </p>';
    }
}

echo '<p class="centrerco"> Vous pouvez ajouter une Question/Réponse en cliquant ici :
    <form method="post" action="back_office_faq_editer_question.php" class="centrerco">
            <button type="submit">Ajouter</button>
    </form>
    </p>';

$reqz = $bddz->query('SELECT * FROM faq');
while ($donnees = $reqz->fetch() ){
    $question=$donnees['question_theme'];
    $reponse=$donnees['Texte'];
    $id_question=$donnees['id_question'];

    echo '<p class="centrerco">
            <h3 class="titrevert">'.$question.'</h3><br/>'
            .$reponse.'</br>'.
        '<form method="post" action="back_office_faq_editer_question.php">
            <input name="modification" type="hidden" value="'.$id_question.'">
            <button type="submit">Modifier</button>
        </form>
        <form method="post" action="back_office_faq.php">
            <input name="suppression" type="hidden" value="'.$id_question.'">
            <button type="submit">Supprimer</button>
        </form>
        </p>';
}
$reqz->closeCursor();
  
?>
