<div class="head">
    <div class="logo">
        <a href="Trouvetateam.php"><img src="image/LOGONtest.png" alt="Logo"/></a>
    </div>
    <div class="right_head">
            <div class="zone_insription_et_connexion">
                <div class="boutonpc">
                <h3 class="blue">Salut</h3><div class="px"></div><h3 class="green"><?php echo $_SESSION['tttpseudo'];?></h3>
                </div>
                <h3><a href="Deconnexion.php" class="decox"> Déconnexion </a></h3>
            </div>
        <div class="barre_de_navigation">
            <nav id="barre2">
                <ul class="menub">
                    <li>
                        <a href="Trouvetateam.php">Accueil</a>
                    </li>
                    <li>
                        <a href="#">Nos sports</a>
                        <ul>
                            <li><a href="#">Sport de Balle</a></li>
                            <li><a href="#">Sport de raquette</a></li>
                            <li><a href="#">Sport de Combat</a></li>
                            <li><a href="#">Sport de Raquette</a></li>
                            <li><a href="#">Gymnastique</a></li>
                            <li><a href="#">Athlétisme</a></li>
                            <li><a href="#">Equitation</a></li>
                            <li><a href="#">Autre</a></li> 
                        </ul>
                    </li>
                    <li>
                        <a href="#">Nos Clubs</a>
                        <ul>
                            <li><a href="club_inscription0.php">Ajouter mon club</a></li>                    
                            <li><a href="#">Clubs de Football</a></li>
                            <li><a href="#">Clubs de basket Ball</a></li>
                            <li><a href="#">Clubs de Handball</a></li>
                            <li><a href="#">Clubs de Raquette</a></li>
                            <li><a href="#">Clubs d'art martiaux</a></li>
                            <li><a href="#">club d'Athlétisme</a></li>
                            <li><a href="#">clubs d'Equitation</a></li>
                            <li><a href="#">Autre</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="groupe_inscription0.php">Nos Team</a>
                        <ul>
                    	   <li><a href="groupe_inscription0.php">Créer ma team</a></li>
                            <li><a href="#">Teams de Balle</a></li>
                            <li><a href="#">Teams de raquette</a></li>
                            <li><a href="#">Teams de Combat</a></li>
                            <li><a href="#">Teams de Raquette</a></li>
                            <li><a href="#">Teams de Gymnastique</a></li>
                            <li><a href="#">Teams d'Athlétisme</a></li>
                            <li><a href="#">Teams d'Equitation</a></li>
                            <li><a href="#">Autre Teams</a></li>

                        </ul>
                    </li>
                    <li>
                            <a href="#">Aide</a>
                            <ul>
                                <li><a href="#">Forum</a></li>
                                <li><a href="FAQ.php">FAQ</a></li>
                                <li><a href="#">Nous contacter</a></li>
                            </ul>
                    </li>
                    <?php

                    try {
                        $bdd = new PDO('mysql:host=localhost;dbname=trouve_ta_team;charset=utf8', 'root', ''); 
                    }
                    catch(Exception $e) {
                        die('Erreur : '.$e->getMessage()); 
                    }

                    $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE NomUtilisateur = ?');
                    $req->execute(array($_SESSION['tttpseudo']));
                    if ($donnees = $req->fetch() ){
                        $Droits=$donnees['DroitAdmin'];  
                    }
                    if(($Droits==1)||($Droits==2)) {
                        echo '<li>
                                    <a href="#">Arrière Boutique</a>
                                    <ul>
                                        <li><a href="back_office_recherche_utilisateur.php">Modérer des utilisateurs</a></li>
                                        <li><a href="back_office_faq.php">Editer la FAQ</a></li>
                                        <li><a href="#">Editer le site</a></li>
                                        <li><a href="#">Consulter les signalement d\'abus</a></li>
                                    </ul>
                            </li>
                            ';
                    }
                    ?>
                    <li>
                            <a href="#">Mon Compte</a>
                            <ul>
                                <li><a href="Profil.php">Mon Profil</a></li>
                                <li><a href="#">Emploi du Temps</a></li>
                                <li><a href="parametres_groupe_club.php">Parametres de mes Teams/Clubs</a></li>
                            </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>