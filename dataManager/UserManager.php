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
            $user->setNomUser($lineResult["nomUser"]);
            $user->setPrenomUser($lineResult["prenomUser"]);
            $user->setPseudoUser($lineResult["pseudoUser"]);
            $user->setMdpUser($lineResult["mdpUser"]);
            $user->setDateNaissanceUser($lineResult["dateNaissanceUser"]);
            $user->setEmailUser($lineResult["emailUser"]);
            $user->setCheminAvatarUser($lineResult["cheminAvatarUser"]);
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
            $user->setNomUser($lineResult["nomUser"]);
            $user->setPrenomUser($lineResult["prenomUser"]);
            $user->setPseudoUser($lineResult["pseudoUser"]);
            $user->setMdpUser($lineResult["mdpUser"]);
            $user->setDateNaissanceUser($lineResult["dateNaissanceUser"]);
            $user->setEmailUser($lineResult["emailUser"]);
            $user->setCheminAvatarUser($lineResult["cheminAvatarUser"]);
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
        
        $state = $bdd->prepare("INSERT INTO User (nomUser, prenomUser, pseudoUser, mdpUser, "
                . "dateNaissanceUser, emailUser, cheminAvatarUser, ban, admin) VALUES (?,?,?,?,?,?,?,0,0)");
        $state->bindParam(1, $user->getNomUser);
        $state->bindParam(2, $user->getPrenomUser);
        $state->bindParam(3, $user->getPseudoUser);
        $state->bindParam(4, $user->getMdpUser);
        $state->bindParam(5, $user->getDateNaissanceUser);
        $state->bindParam(6, $user->getEmailUser);
        $state->bindParam(7, $user->getCheminAvatarUser);
        $state->execute();          
    }
    
    public static function updateUser ($user)
    {
        $bdd= DataBaseLinker::getConnexion();
        $state = $bdd->prepare("UPDATE User SET  nomUser = ?, prenomUser = ?, pseudoUser = ?, mdpUser = ?,"
                        . " dateNaissanceUser = ?, emailUser = ?, cheminAvatarUser = ? WHERE idUser = ?");
        $state->bindParam(1, $user->getNomUser);
        $state->bindParam(2, $user->getPrenomUser);
        $state->bindParam(3, $user->getPseudoUser);
        $state->bindParam(4, $user->getMdpUser);
        $state->bindParam(5, $user->getDateNaissanceUser);
        $state->bindParam(6, $user->getEmailUser);
        $state->bindParam(7, $user->getCheminAvatarUser);
        $state->execute();       
    }
    
    public static function testIdentifiants($username, $password)
    {
        $loginUser = "user";
        $passwordUser = "user";
        
        $codeRetour = false;
        
        if ($username == $loginUser && $password == $passwordUser)
        {
            $codeRetour = true;
        }
            
        return $codeRetour;
    }
}
