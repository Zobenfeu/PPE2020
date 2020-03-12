<?php
    include("header-footer/header.php");
    include("dataManager/dataBaseLinker.php");
    include("data/User.php");
    include("dataManager/UserManager.php");
    include("data/Thread.php");
    include("dataManager/ThreadManager.php");
    
    //INFOS THREAD CONCERNE
    $thread = ThreadManager::findThread($_GET['idthread']);
    $titre = $thread->getSujet();
    $text = $thread->getText();
    $id = ThreadManager::findIdThread($titre);
    $date = $thread->getDateParution();
    
    //INFOS COMMENTAIRES DU THREAD
    $allCom = CommentaireManager::findAllCommentaireWithIdThread(id);
    
    //AFFICHAGE THREAD
    echo '<div = "threadContainer">';
          echo '<div class="titre">'.$titre.'</div>';
          echo '</br>';
          echo '<div class="contenue">'.$text.'</div>';     
          echo '</br>';
          echo '<div class="date">'.$date.'</div>';
    echo '</div>';        
    
    //AFFICHAGE COMMENTAIRE
    echo '<div = "commentairesContainer">';
          foreach ($allCom as $line)
            {
                //Récuperation infos threads
                $idUserCom = $line->getIdUser();
                $UserCom = UserManager::findUser($idUserCom);
                $pseudoUser = $UserCom->getPseudo();
                $comActuel = CommentaireManager::findCommentaire($line->getIdCommentaire());
                $textComActuel = $comActuel->getContent();
            }         
    echo '</div>'; 