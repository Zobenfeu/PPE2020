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
        }
        return $user;
    }
    
    public static function findAllAdmin ()
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

            $tabUser [] = $user;
        }
        return $tabUser;
    }
    
    public static function deleteAdmin($idUser)
    {
        $bdd= DataBaseLinker::getConnexion();
        
        $state = $bdd->prepare("DELETE FROM User WHERE idUser = ?");
        $state->bindParam(1, $idUser);
        $state->execute();             
    }
    
    public static function insertUser($user)
    {
        $bdd= DataBaseLinker::getConnexion();
        
        $state = $bdd->prepare("INSERT INTO User (idUser, nomUser, prenomUser, pseudoUser, mdpUser, "
                . "dateNaissanceUser, emailUser, cheminAvatarUser) VALUES (?,?,?,?,?,?,?,?)");
        $state->bindParam(1, $user->getIdUser);
        $state->bindParam(2, $user->getNomUser);
        $state->bindParam(3, $user->getPrenomUser);
        $state->bindParam(4, $user->getPseudoUser);
        $state->bindParam(4, $user->getMdpUser);
        $state->bindParam(4, $user->getDateNaissanceUser);
        $state->bindParam(4, $user->getEmailUser);
        $state->bindParam(4, $user->getCheminAvatarUser);
        $state->execute();  
        $idUserGenere = $bdd->lastInsertId();
        $user->setIdUser($idUserGenere);
        
    }
    
    public static function updateUser ($user)
    {
        $bdd= DataBaseLinker::getConnexion();
        $state = $bdd->prepare("UPDATE User SET idUser = ?, nomUser = ?, prenomUser = ?, pseudoUser = ?, mdpUser = ?,"
                        . " dateNaissanceUser = ?, emailUser = ?, cheminAvatarUser = ? WHERE idUser = ?");
        $state->bindParam(1, $user->getIdUser);
        $state->bindParam(2, $user->getNomUser);
        $state->bindParam(3, $user->getPrenomUser);
        $state->bindParam(4, $user->getPseudoUser);
        $state->bindParam(5, $user->getMdpUser);
        $state->bindParam(6, $user->getDateNaissanceUser);
        $state->bindParam(7, $user->getEmailUser);
        $state->bindParam(8, $user->getCheminAvatarUser);
        $state->bindParam(9, $user->getIdUser);
        $state->execute();       
    }
}
