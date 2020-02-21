<?php

class UserManager 
{
    public static function findUser ($idUser)
    {
        $bdd = DataBaseLinker::getConnexion();

        $state=$bdd->prepare("SELECT * FROM User WHERE idUser=?");
        $state->bindParam(1, $idUser);
        $state->execute();
        $resultats = $state->fetchAll();
        $user = new User();
        foreach($resultats as $lineResult)
        {
            $user->setIdUser($lineResult["idUser"]);
            $user->setNom($lineResult["nom"]);
            $user->setPrenom($lineResult["prenom"]);
            $user->setPseudo($lineResult["pseudo"]);
            $user->setMdp($lineResult["mdp"]);
            $user->setDateNaissance($lineResult["dateNaissance"]);
            $user->setEmail($lineResult["email"]);
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

        $state=$bdd->prepare("SELECT * FROM User");

        $state->execute();
        $resultats = $state->fetchAll();

        foreach($resultats as $lineResult)
        {
            $user = new User();
            $user->setIdUser($lineResult["idUser"]);
            $user->setNom($lineResult["nomUser"]);
            $user->setPrenom($lineResult["prenom"]);
            $user->setPseudo($lineResult["pseudo"]);
            $user->setMdp($lineResult["mdp"]);
            $user->setDateNaissance($lineResult["dateNaissance"]);
            $user->setEmail($lineResult["email"]);
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
        
        $state = $bdd->prepare("DELETE FROM User WHERE idUser = ?");
        $state->bindParam(1, $idUser);
        $state->execute();             
    }
    
    public static function insertUser($user)
    {
        $bdd= DataBaseLinker::getConnexion();
        
        $state = $bdd->prepare("INSERT INTO User (nom, prenom, pseudo, mdp, "
                . "dateNaissance, email, ban, admin) VALUES (?,?,?,?,?,?,?,0,0)");
        $state->bindParam(1, $user->getNom);
        $state->bindParam(2, $user->getPrenom);
        $state->bindParam(3, $user->getPseudo);
        $state->bindParam(4, $user->getMdp);
        $state->bindParam(5, $user->getDateNaissance);
        $state->bindParam(6, $user->getEmail);
        $state->execute();          
    }
    
    public static function updateUser ($user)
    {
        $bdd= DataBaseLinker::getConnexion();
        $state = $bdd->prepare("UPDATE User SET  nom = ?, prenom = ?, pseudo = ?, mdp = ?,"
                        . " dateNaissance = ?, email = ? WHERE idUser = ?");
        $state->bindParam(1, $user->getNom);
        $state->bindParam(2, $user->getPrenom);
        $state->bindParam(3, $user->getPseudo);
        $state->bindParam(4, $user->getMdp);
        $state->bindParam(5, $user->getDateNaissance);
        $state->bindParam(6, $user->getEmail);
        $state->bindParam(7, $user->getidUser);
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
