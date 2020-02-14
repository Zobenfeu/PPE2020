<?php


class CommentaireManager 
{
    public static function findCommentaire ($idCommentaire)
    {
        $bddCommentaire = DataBaseLinker::getConnexion();

        $state=$bddCommentaire->prepare("SELECT * FROM Commentaire WHERE idCommentaire=?");

        $state->bindParam(1, $idCommentaire);
        $state->execute();
        $resultats = $state->fetchAll();
        $com = new Commentaire();
        foreach($resultats as $lineResult)
        {
            $com->setIdCommentaire($lineResult["idCommentaire"]);
<<<<<<< HEAD
=======
            $com->setPseudo($lineResult["pseudo"]);
>>>>>>> 4149a1386a1755ba0739c13bcac1843291c94f8c
            $com->setDateCommentaire($lineResult["dateCommentaire"]);
            $com->setContent($lineResult["content"]);
            $com->setIdArticle($lineResult["idArticle"]);
        }
        return $com;
    }

    public static function findAllCommentaire ()
    {
        $tabCom = array();

        $bddCommentaire = DataBaseLinker::getConnexion();

        $state=$bddCommentaire->prepare("SELECT * FROM Commentaire");

        $state->execute();
        $resultats = $state->fetchAll();

        foreach($resultats as $lineResult)
        {
            $com = new Commentaire();
            $com->setIdCommentaire($lineResult["idCommentaire"]);
<<<<<<< HEAD
=======
            $com->setPseudo($lineResult["pseudo"]);
>>>>>>> 4149a1386a1755ba0739c13bcac1843291c94f8c
            $com->setDateCommentaire($lineResult["dateCommentaire"]);
            $com->setContent($lineResult["content"]);
            $com->setIdArticle($lineResult["idArticle"]);

            $tabCom [] = $com;
        }
        return $tabCom;
    }
    
    public static function deleteCommentaire($idCommentaire)
    {
        $bdd= DataBaseLinker::getConnexion();
        
        $state = $bdd->prepare("DELETE FROM Commentaire WHERE idCommentaire = ?");
        $state->bindParam(1, $idCommentaire);
        $state->execute();             
    }
    
    public static function insertCommentaire($com)
    {
        $bdd= DataBaseLinker::getConnexion();
        
<<<<<<< HEAD
        $state = $bdd->prepare("INSERT INTO Commentaire (idCommentaire, dateCommentaire, content, idThread) VALUES (?,?,?,?)");
        $state->bindParam(1, $com->getIdCommentaire);
        $state->bindParam(2, $com->getDateCommentaire);
        $state->bindParam(3, $com->getContent);
        $state->bindParam(4, $com->getIdThread);
        $state->execute();  
        $idComGenere = $bdd->lastInsertId();
        $com->setIdCommentaire($idComGenere);
        
    }
    
    public static function updateCommentaire ($com)
    {
        $bdd= DataBaseLinker::getConnexion();
        $state = $bdd->prepare("UPDATE Commentaire SET idCommentaire = ?, dateCommentaire = ?, content = ?, idThread = ? WHERE idCommentaire = ?");
        $state->bindParam(1, $com->getIdCommentaire);
        $state->bindParam(2, $com->getDateCommentaire);
        $state->bindParam(3, $com->getContent);
        $state->bindParam(4, $com->getIdThread);
        $state->bindParam(5, $com->getIdCommentaire);
        $state->execute();        
=======
        $state = $bdd->prepare("INSERT INTO Commentaire (idClient, pseudo, dateCommentaire, content, idThread) VALUES (?,?,?,?,?)");
        $state->bindParam(1, $com->getIdCommentaire);
        $state->bindParam(2, $com->getPseudo);
        $state->bindParam(3, $com->getDateCommentaire);
        $state->bindParam(4, $com->getContent);
        $state->bindParam(5, $com->getIdThread);
        $state->execute();
        $id=$bdd->lastInsertId();
        foreach($id as $line)
        {
           // $idComGenere = $id->getInt(1);
        }
>>>>>>> 4149a1386a1755ba0739c13bcac1843291c94f8c
    }
    
}
