<?php
    include("header-footer/header.php");
    include("dataManager/dataBaseLinker.php");
    include("data/User.php");
    include("dataManager/UserManager.php");
    include("data/Thread.php");
    include("data/Commentaire.php");
    include("dataManager/ThreadManager.php");
    include("dataManager/CommentaireManager.php");
    
    echo $_GET["idthread"];
    
    //INFOS THREAD CONCERNE
    $id = $_GET["idthread"];
    $thread = ThreadManager::findThread($id);
    $titre = $thread->getSujet();
    $text = $thread->getText();
    $date = $thread->getDateParution();
    
    //INFOS COMMENTAIRES DU THREAD
    $allCom = CommentaireManager::findAllCommentaireWithIdThread($id);
    
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
                //Récuperation infos Commentaires
                $idUserCom = $line->getIdUser();
                $UserCom = UserManager::findUser($idUserCom);
                $pseudoUser = $UserCom->getPseudo();
                $comActuel = CommentaireManager::findCommentaire($line->getIdCommentaire());
                $textComActuel = $comActuel->getContent();
                $dateCom = $comActuel->getDateCommentaire();
                
                //Affichage des infos
                echo '<div class="commentaire">'.$textComActuel.'</div>';
                echo'<div class="pseudoCom">'.$pseudoUser.'</div>';
                echo'<div class="dateCom">'.$dateCom.'</div>';
            }         
    echo '</div>'; 
    
    //ECRIRE COMMENTAIRE
    if(isset($_SESSION["ppe_session"]))
    {
        echo '<div class = "newCom">';
        
        ?> 
            <form method="post" action="displayThread.php" name="newCom_form" class="newComForm">
                <textarea name="message" rows="8" cols="45"></textarea>'
                <input type="submit" name="sendCom" value="Publier" class="button_sendCom"> 
            </form>

        <?php
            
        echo'</div>';  
        
       if (isset($_POST["sendCom"]))
       {
            /* on test si les champs sont bien remplis */
            if(!empty($_POST["message"]))
            {
                $com = new Commentaire;
                $com->setContent($_POST["message"]);
                $com->setIdThread($id);
                CommentaireManager::insertCommentaire($com);
                echo "Vous venez de publier un commentaire."; 
                header('Location: displayThread.php');
                exit;
            }
        }          
    }
    
    
include("header-footer/footer.php");

    