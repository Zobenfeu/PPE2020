<?php

class ThreadManager 
{
    public static function findThread ($idThread)
    {
        $bdd = DataBaseLinker::getConnexion();
        
        $state = $bdd->prepare("SELECT * FROM Thread WHERE idThread=?");
        
        $state->bindParam(1, $idThread);
        $state->execute();
        $resultats = $state->fetchAll();
        
        $thread = new Thread;
        
        foreach($resultats as $line)
        {
            $thread->setIdThread($line["idThread"]);
            $thread->setSujet($line["sujet"]);
            $thread->setText($line["text"]);
            $thread->setDateParution($line["dateParution"]);
            $thread->setFermer($line["fermer"]);
            $thread->setIdUser($line["idUser"]);
        }
        return $thread;
    }
    
    public static function findAllThread ()
    {
        $tabThread = Array();
        
        $bdd = DataBaseLinker::getConnexion(); 
        
        $state = $bdd->prepare("SELECT * FROM Thread");
        
        $state->execute();
        $results = $state->fetchAll();
        
        foreach($results as $line)
        {
            $thread = new Thread();
            $thread->setIdThread($line["idThread"]);
            $thread->setSujet($line["sujet"]);
            $thread->setText($line["text"]);
            $thread->setDateParution($line["dateParution"]);
            $thread->setFermer($line["fermer"]);
            $thread->setIdUser($line["idUser"]);

            $tabThread [] = $thread;
        }
        return $tabThread;
    }
    
    public static function deleteThread($idThread)
    {
        $bdd= DataBaseLinker::getConnexion();
        
        $state = $bdd->prepare("DELETE FROM Thread WHERE idThread = ?");
        $state->bindParam(1, $idThread);
        $state->execute();             
    }
    
    public static function openOrCloseThread($idThread)
    {
        $bdd= DataBaseLinker::getConnexion();
        $thread = ThreadManager::findThread($idThread);
        if($thread->getFermer()==0)
        {
            $state = $bdd->prepare("UPDATE Thread SET fermer = 1 WHERE idThread = ?");
            $state->bindParam(1, $idThread);
            $state->execute();
            $thread->setFermer(1);
        }
        elseif($thread->getFermer()==1)
        {
            $state = $bdd->prepare("UPDATE Thread SET fermer = 0 WHERE idThread = ?");
            $state->bindParam(1, $idThread);
            $state->execute();
            $thread->setFermer(0);
        }
        
    }
    
    public static function insertThread($thread)
    {
        $bdd= DataBaseLinker::getConnexion();
        
        $state = $bdd->prepare("INSERT INTO Thread (sujet, text, dateParution, fermer, idUser) VALUES (?,?,CURDATE(),0,?)");
        $state->bindParam(1, $thread->getSujet());
        $state->bindParam(2, $thread->getText());
        $state->bindParam(3, $thread->getIdUser());
        $state->execute();      
    }
    
    public static function updateThread ($thread)
    {
        $bdd= DataBaseLinker::getConnexion();
        $state = $bdd->prepare("UPDATE Thread SET sujet = ?, text = ?, dateParution = CURDATE() WHERE idThread = ?");
        $state->bindParam(1, $thread->getSujet());
        $state->bindParam(2, $thread->getText());
        $state->bindParam(3, $thread->getIdThread());
        $state->execute();        
    }
}
