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
<<<<<<< HEAD
            $thread->setDate($line["dateParution"]);
=======
            $thread->setDate($line["date"]);
>>>>>>> 4149a1386a1755ba0739c13bcac1843291c94f8c
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
<<<<<<< HEAD
            $thread->setDate($line["dateParution"]);
=======
            $thread->setDate($line["date"]);
>>>>>>> 4149a1386a1755ba0739c13bcac1843291c94f8c
            
            $tabThread [] = $thread;
        }
        return $tabThread;
    }
<<<<<<< HEAD
    
    //ADMIN et Utilisateur quand c'est le leur
    public static function deleteThread($idThread)
    {
        $bdd= DataBaseLinker::getConnexion();
        
        $state = $bdd->prepare("DELETE FROM Thread WHERE idThread = ?");
        $state->bindParam(1, $idThread);
        $state->execute();             
    }
    
    //Utilisateur et Admin
    public static function insertThread($thread)
    {
        $bdd= DataBaseLinker::getConnexion();
        
        $state = $bdd->prepare("INSERT INTO Thread (idThread, sujet, text, dateParution) VALUES (?,?,?,?)");
        $state->bindParam(1, $thread->getIdThread);
        $state->bindParam(2, $thread->getSujet);
        $state->bindParam(3, $thread->getText);
        $state->bindParam(4, $thread->getDateParution);
        $state->execute();  
        $idThreadGenere = $bdd->lastInsertId();
        $thread->setIdThread($idThread);        
    }
    
    //Utilisateur et Admin
    public static function updateThread ($thread)
    {
        $bdd= DataBaseLinker::getConnexion();
        $state = $bdd->prepare("UPDATE Thread SET idThread = ?, sujet = ?, text = ?, dateParution = ? WHERE idThread = ?");
        $state->bindParam(1, $thread->getIdThread);
        $state->bindParam(2, $thread->getSujet);
        $state->bindParam(3, $thread->getText);
        $state->bindParam(4, $thread->getDateParution);
        $state->bindParam(5, $thread->getIdThread);
        $state->execute();        
    }
=======
>>>>>>> 4149a1386a1755ba0739c13bcac1843291c94f8c
}
