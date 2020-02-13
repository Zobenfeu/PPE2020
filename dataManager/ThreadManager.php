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
            $thread->setDate($line["date"]);
        }
        return $thread;
    }
    
    public static function findAllThread ()
    {
        $tabThread = Array();
        
        $bdd = DataBaseLinker::getConnexion(); 
        
        $state = $bdd->prepare("SELECT * FROM Article");
        
        $state->execute();
        $results = $state->fetchAll();
        
        foreach($results as $line)
        {
            $thread = new Thread();
            $thread->setIdThread($line["idThread"]);
            $thread->setSujet($line["sujet"]);
            $thread->setText($line["text"]);
            $thread->setDate($line["date"]);
            
            $tabThread [] = $thread;
        }
        return $tabThread;
    }
}
