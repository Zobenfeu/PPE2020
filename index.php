<?php 
    include("header-footer/header.php");
    include("dataManager/dataBaseLinker.php");
    include("data/User.php");
    include("dataManager/UserManager.php");
    include("data/Thread.php");
    include("dataManager/ThreadManager.php");
    
    if(isset($_SESSION["ppe_session"]))
    {
        $id = UserManager::findIdUser($_SESSION["ppe_session"]);
        $utilisateur = UserManager::findUser($id);
        $isAdmin = $utilisateur->getAdmin();
        $ban = $utilisateur->getBan();
        $allThread = ThreadManager::findAllThread();

        //Verifie si l'utilisateur est ban 
        if ($isAdmin == 0 and $ban==1) 
        {
            echo '<div class="msgBan">VOUS ÊTES BANNI DU FORUM</div>';
            session_unset();
            session_name("ppe_session");
            session_start();
            $id = NULL;
            $utilisateur = NULL;
            $isAdmin = 0;
            $ban = 0;
        }
    }
    else 
    {
        $id = NULL;
        $utilisateur = NULL;
        $isAdmin = 0;
        $ban = 0;
        $allThread = ThreadManager::findAllThread();
    }
    
    if ($isAdmin == 1) 
    {
            echo '<form class="formAdmin" action="index.php" method="post">';
                echo '<div class="boutons">';
                echo '<div class="boutonTop">  <input type="submit" name="openclose" value="Ouvrir/Clore"/>  </div>';
                echo'<div class="boutonTop">  <input type="submit" name="delete" value="Supprimer"/>  </div>';
                echo '</div>';
                
            foreach ($allThread as $line)
            {
                //Récuperation infos threads
                $lanceurDuThread = UserManager::findUser($line->getIdUser());
                $threadActuel = ThreadManager::findThread($line->getIdThread());
                $idThread = ThreadManager::findIdThread($threadActuel->getSujet());
                
                //Verification si l'admin a coché des cases pour supprimer/clore/réouvrir un thread
                if(!empty($_POST["openclose"]))
                {
                    if(!empty($_POST["threadBox".$line->getIdThread()]))
                    {
                        ThreadManager::openOrCloseThread($line->getIdThread());
                    }
                }       
                elseif(!empty($_POST["delete"]))
                {
                    if(!empty($_POST["threadBox".$line->getIdThread()]))
                    {
                        ThreadManager::deleteThread($line->getIdThread());
                        continue;
                    }
                }
            
                echo '<div class="checkBox">';

                echo'<input type="checkbox" name="threadBox'.$line->getIdThread().'"> 

                 </div>

                <div class="thread">';
                    echo'<div class="avatarUtilisateur">avatar</div>';
                    echo'<div class="pseudoLanceur">'.$lanceurDuThread->getPseudo().'</div>';
                    echo'<div class="titreThread"><a href="displayThread.php?idthread='.$idThread.'&idUser='.$id.'">'.$threadActuel->getSujet().'</a></div>';
                echo'</div>';   
            }
            echo '</form>';
    }
    
    if($id!=NULL)
    {
        echo '<div class="boutons">';
        echo '<div class="boutonTop"><a class="b" href="nouveauThread.php">Nouveau Sujet</a></div>';
        echo'<div class="boutonTop"><a class="b" href="gerezVosSujet.php">Gerez vos sujets</a></div>';
        echo '<div class="boutonTop"><a class="b" href="index.php">Actualisez</a></div>';
        echo '</div>';
    }
    //Verifie si c'est un admin
    else
    {
        echo '<div class="boutonsNoConnexion">';
        echo '<div class="boutonTop"><a class="b" href="index.php">Actualisez</a></div>';
        echo'</div>';
    }

    
    echo'<div class="thread_container">';

    foreach ($allThread as $line)
    {
        $lanceurDuThread = UserManager::findUser($line->getIdUser());
        $threadActuel = ThreadManager::findThread($line->getIdThread());
        $idThread = ThreadManager::findIdThread($threadActuel->getSujet());
        echo'<div class="thread">';
            echo'<div class="avatarUtilisateur">avatar</div>';
            echo'<div class="pseudoLanceur">'.$lanceurDuThread->getPseudo().'</div>';
            echo'<div class="titreThread"><a href="displayThread.php?idthread='.$idThread.'">'.$threadActuel->getSujet().'</a></div>';
        echo'</div>';
    }     
echo'</div>';//ThreadContainer
            
    
?>
    
                
                
<?php
    
    include("header-footer/footer.php");
?>
