<?php

try {
    $bddz = new PDO('mysql:host=localhost;dbname=trouve_ta_team;charset=utf8', 'root', '');
}
catch(Exception $e) {
    die('Erreur : '.$e->getMessage());
}

$reqz = $bddz->query('SELECT * FROM faq');
while ($donnees = $reqz->fetch() ){
    $question=$donnees['question_theme'];
    $reponse=$donnees['Texte'];
    $id_question=$donnees['id_question'];
    
    echo 
        '<div class="spacearound">
            <div class="space2"></div>
            <h3 class="blue">'.$question.'</h3> 
            <h3 class="green">'.$reponse.'</h3>
        <div class="space2"></div></div>';

    /*
    echo 
        '<div class="space"></div>
        <h3 class="titrevert">'.$question.'</h3><br/>
        <p class="centrerco">'
            .$reponse.'</br>
        </p>';
    */
}
$reqz->closeCursor();
  
?>