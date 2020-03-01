<?php

class UserManager 
{
    public static function findUser ($idUser)
    {
        $bdd = DataBaseLinker::getConnexion();

        $state=$bdd->prepare("SELECT * FROM Utilisateur WHERE idUser=?");
        $state->bindParam(1, $idUser);
        $state->execute();
        $resultats = $state->fetchAll();
        $user = new User();
        foreach($resultats as $lineResult)
        {
            $user->setIdUser($lineResult["idUser"]);
            $user->setPseudo($lineResult["pseudo"]);
            $user->setMdp($lineResult["mdp"]);
            $user->setCheminAvatar($lineResult["cheminAvatar"]);
            $user->setBan($lineResult["ban"]);
            $user->setAdmin($lineResult["admin"]);
        }
        return $user;
    }
    
    public static function findAllUser ()
    {
        $tabUser = array();

        $bdd = DataBaseLinker::getConnexion();

        $state=$bdd->prepare("SELECT * FROM Utilisateur");

        $state->execute();
        $resultats = $state->fetchAll();

        foreach($resultats as $lineResult)
        {
            $user = new User();
            $user->setIdUser($lineResult["idUser"]);
            $user->setPseudo($lineResult["pseudo"]);
            $user->setMdp($lineResult["mdp"]);
            $user->setCheminAvatar($lineResult["cheminAvatar"]);
            $user->setBan($lineResult["ban"]);
            $user->setAdmin($lineResult["admin"]);

            $tabUser [] = $user;
        }
        return $tabUser;
    }
    
    public static function deleteUser($idUser)
    {
        $bdd= DataBaseLinker::getConnexion();
        
        $state = $bdd->prepare("DELETE FROM Utilisateur WHERE idUser = ?");
        $state->bindParam(1, $idUser);
        $state->execute();             
    }
    
    public static function insertUser($user)
    {
        $bdd= DataBaseLinker::getConnexion();
        
        $state = $bdd->prepare("INSERT INTO Utilisateur (pseudo, mdp, "
                . "ban, admin) VALUES (?,?,0,0)");
        $state->bindParam(1, $user->getPseudo);
        $state->bindParam(2, $user->getMdp);
        $state->execute();          
    }
    
    public static function updateUser ($user)
    {
        $bdd= DataBaseLinker::getConnexion();
        $state = $bdd->prepare("UPDATE Utilisateur SET pseudo = ?, mdp = ?"
                        . " WHERE idUser = ?");
        $state->bindParam(1, $user->getPseudo);
        $state->bindParam(2, $user->getMdp);
        $state->bindParam(3, $user->getidUser);
        $state->execute();       
    }
    
    public static function testIdentifiants($username, $password)
    {
        $loginUser = "MatteoJames";
        $passwordUser = "Brexit2020";
        
        $codeRetour = false;
        
        if ($username == $loginUser && $password == $passwordUser)
        {
            $codeRetour = true;
        }
            
        return $codeRetour;
    }
}
