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
    
    public static function findIdUser($username)
    {        
        $bdd= DataBaseLinker::getConnexion();
        $state = $bdd->prepare("SELECT idUser FROM Utilisateur WHERE pseudo=?");
        $state->bindParam(1, $username);

        $state->execute();
        $result=$state->fetchAll();
        $codeRetour= $result[0][0];
            
        return $codeRetour;
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
    
    public static function insertUser($user,$pass)
    {
        $bdd= DataBaseLinker::getConnexion();
        
        $state = $bdd->prepare("INSERT INTO Utilisateur (pseudo, mdp, avatar, ban, admin) VALUES (?,?,1,0,0)");
        $state->bindParam(1, $user);
        $state->bindParam(2, $pass);
        $state->execute();          
    }
    
    public static function updateUser ($pseudo, $mdp, $avatar, $id)
    {
        $bdd= DataBaseLinker::getConnexion();
        $state = $bdd->prepare("UPDATE Utilisateur SET pseudo = ?, mdp = ?, avatar = ? WHERE idUser = ?");
        $state->bindParam(1, $pseudo);
        $state->bindParam(2, $mdp);
        $state->bindParam(3, $avatar);
        $state->bindParam(4, $id);
        $state->execute();       
    }
    
    public static function updateAvatar($idUser, $cheminAvatar)
    {
        $bdd = DataBaseLinker::getConnexion();
        $state = $bdd->prepare("UPDATE Utilisateur SET cheminAvatar = ? WHERE idUser = ?");
        $state->bindParam(1, $idUser);
        $state->bindParam(2, $cheminAvatar);
        $state->execute();
    }
    
    public static function testIdentifiants($username, $password)
    {
        
        $codeRetour = false;
        
        $bdd= DataBaseLinker::getConnexion();
        $state = $bdd->prepare("SELECT mdp FROM Utilisateur WHERE pseudo=?");
        $state->bindParam(1, $username);

        $state->execute();
        $result=$state->fetchAll();
        
        if ($password == $result[0][0])
        {
            $codeRetour = true;
        }
            
        return $codeRetour;
    }
}
