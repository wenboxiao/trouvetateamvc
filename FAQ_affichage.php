<?php

try {
   include('TTT_BDD.php');
}
catch(Exception $e) {
    die('Erreur : '.$e->getMessage());
}

$reqz = $bdd->query('SELECT * FROM faq');
while ($donnees = $reqz->fetch() ){
    $question=$donnees['question_theme'];
    $reponse=$donnees['Texte'];
    $id_question=$donnees['id_question'];
    
    echo 
        '<p class="centrerco">
            <div class="space2"></div>
            <h3 class="green">'.$question.'</h3> 
            '.$reponse.'
        <div class="space2"></div></p>';

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