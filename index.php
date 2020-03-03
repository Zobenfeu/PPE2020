<?php 
    include("header-footer/header.php");
    include("dataManager/dataBaseLinker.php");
    include("data/User.php");
    include("dataManager/UserManager.php");
    include("data/Thread.php");
    include("dataManager/ThreadManager.php");
    if($_SESSION)
    $id = UserManager::findIdUser($_SESSION["ppe_session"]);
    $utilisateur = UserManager::findUser($id);
    $isAdmin = $utilisateur->getAdmin();
    $ban = $utilisateur->getBan();
    $allThread = ThreadManager::findAllThread();
    //Verifie si l'utilisateur est ban 
    if ($isAdmin == 0 and $ban==1) 
    {
        echo '<div class="msgBan">VOUS ÊTES BANNI DU FORUM</div>';
    }
    
    echo '<div class="boutons">';
        //Verifie si l'utilisateur est pas ban
        if($isAdmin == 0 and $ban == 0)
        {
            echo '<div class="boutonTop"><a class="b" href="nouveauThread.php">Nouveau Sujet</a></div>';
            echo'<div class="boutonTop"><a class="b" href="gerezVosSujet.php">Gerez vos sujets</a></div>';
            echo '<div class="boutonTop"><a class="b" href="index.php">Actualisez</a></div>';
        }
        //Verifie si c'est un admin
        elseif ($administrateur == 1 and $ban==0) 
        {
            echo '<form action="index.php" method="post">';
            echo '<div class="boutonTop">  <label>Re-ouvrir<input type="submit" name="reopen"/>  </div>';
            echo'<div class="boutonTop">  <label>Supprimer<input type="submit" name="delete"/>  </div>';
            echo '<div class="boutonTop">  <label>Clore<input type="submit" name="close"/>  </div>';
        }
    echo'</div>';
    
echo'<div class="thread_container">';
    foreach ($allThread as $line)
    {
        if($administrateur == 0 and $ban==0)
        {
        
            $lanceurDuThread = UserManager::findUser($line->getIdUser());
            $threadActuel = ThreadManager::findThread($line->getIdThread());
            echo'<div class="thread">';
                echo'<div class="avatarUtilisateur">avatar</div>';
                echo'<div class="pseudoLanceur">'.$lanceurDuThread->getPseudo().'</div>';
                echo'<div class="titreThread"><a href="sujet.php>"'.$threadActuel->getSujet().'</a></div>';
            echo'</div>';
        }
        elseif($administrateur == 1 and $ban==0)
        {
            $lanceurDuThread = UserManager::findUser($line->getIdUser());
            $threadActuel = ThreadManager::findThread($line->getIdThread());
            
            echo '<div class="checkBox">';

                echo'<form action="index.php" method="post">
                        <input type="checkbox" name="threadBox"> 
                    </form>;

                 </div>;

                <div class="thread">';
                    echo'<div class="avatarUtilisateur">avatar</div>';
                    echo'<div class="pseudoLanceur">'.$lanceurDuThread->getPseudo().'</div>';
                    echo'<div class="titreThread"><a href="sujet.php>"'.$threadActuel->getSujet().'</a></div>';
                echo'</div>';
            echo'</div>';            
        } 
        //Verification si l'admin a coché des cases pour supprimer/clore/réouvrir un thread
        if(!empty($_POST["reopen"]) or !empty($_POST["close"]))
        {
            if(!empty($_POST["threadBox"]))
            {
                ThreadManager::openOrCloseThread($threadActuel);
            }
        }       
        elseif(!empty($_POST["delete"]))
        {
            if(!empty($_POST["threadBox"]))
            {
                ThreadManager::deleteThread($threadActuel);
            }
        }
    }
    
    
        
echo'</div>';//ThreadContainer
            
    
?>
    
                
                
<?php
    
    include("header-footer/footer.php");
?>
