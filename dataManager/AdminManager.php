<?php

class AdminManager 
{
    public static function findAdmin ($idAdmin)
    {
        $bdd = DataBaseLinker::getConnexion();

        $state=$bdd->prepare("SELECT * FROM Admin WHERE idAdmin=?");

        $state->bindParam(1, $idAdmin);
        $state->execute();
        $resultats = $state->fetchAll();
        $admin = new Admin();
        foreach($resultats as $lineResult)
        {
            $admin->setIdAdmin($lineResult["idAdmin"]);
            $admin->setNomAdmin($lineResult["nomAdmin"]);
            $admin->setPrenomAdmin($lineResult["prenomAdmin"]);
            $admin->setPseudoAdmin($lineResult["PseudoAdmin"]);
            $admin->setMdpAdmin($lineResult["mdpAdmin"]);
            $admin->setDateNaissanceAdmin($lineResult["dateNaissanceAdmin"]);
            $admin->setEmailAdmin($lineResult["emailAdmin"]);
            $admin->setCheminAvatarAdmin($lineResult["cheminAvatarAdmin"]);
        }
        return $admin;
    }
    
    public static function findAllAdmin ()
    {
        $tabAdmin = array();

        $bdd = DataBaseLinker::getConnexion();

        $state=$bdd->prepare("SELECT * FROM Admin");

        $state->execute();
        $resultats = $state->fetchAll();

        foreach($resultats as $lineResult)
        {
            $admin = new Admin();
            $admin->setIdAdmin($lineResult["idAdmin"]);
            $admin->setNomAdmin($lineResult["nomAdmin"]);
            $admin->setPrenomAdmin($lineResult["prenomAdmin"]);
            $admin->setPseudoAdmin($lineResult["PseudoAdmin"]);
            $admin->setMdpAdmin($lineResult["mdpAdmin"]);
            $admin->setDateNaissanceAdmin($lineResult["dateNaissanceAdmin"]);
            $admin->setEmailAdmin($lineResult["emailAdmin"]);
            $admin->setCheminAvatarAdmin($lineResult["cheminAvatarAdmin"]);

            $tabAdmin [] = $admin;
        }
        return $tabAdmin;
    }
    
    public static function deleteAdmin($idAdmin)
    {
        $bdd= DataBaseLinker::getConnexion();
        
        $state = $bdd->prepare("DELETE FROM Admin WHERE idAdmin = ?");
        $state->bindParam(1, $idAdmin);
        $state->execute();             
    }
    
    public static function insertAdmin($admin)
    {
        $bdd= DataBaseLinker::getConnexion();
        
        $state = $bdd->prepare("INSERT INTO Admin (idAdmin, nomAdmin, prenomAdmin, pseudoAdmin, mdpAdmin, "
                . "dateNaissanceAdmin, emailAdmin, cheminAvatarAdmin) VALUES (?,?,?,?,?,?,?,?)");
        $state->bindParam(1, $admin->getIdAdmin);
        $state->bindParam(2, $admin->getNomAdmin);
        $state->bindParam(3, $admin->getPrenomAdmin);
        $state->bindParam(4, $admin->getPseudoAdmin);
        $state->bindParam(5, $admin->getMdpAdmin);
        $state->bindParam(6, $admin->getDateNaissanceAdmin);
        $state->bindParam(7, $admin->getEmailAdmin);
        $state->bindParam(8, $admin->getCheminAvatarAdmin);
        $state->execute();  
        $idAdminGenere = $bdd->lastInsertId();
        $admin->setIdAdmin($idAdminGenere);
        
    }
    
    public static function updateAdmin ($admin)
    {
        $bdd= DataBaseLinker::getConnexion();
        $state = $bdd->prepare("UPDATE Admin SET idAdmin = ?, nomAdmin = ?, prenomAdmin = ?, pseudoAdmin = ?, "
                            ." mdpAdmin = ?, dateNaissanceAdmin = ?, emailAdmin = ?, cheminAvatarAdmin = ? WHERE idAdmin = ?");
        $state->bindParam(1, $admin->getIdAdmin);
        $state->bindParam(2, $admin->getNomAdmin);
        $state->bindParam(3, $admin->getPrenomAdmin);
        $state->bindParam(4, $admin->getPseudoAdmin);
        $state->bindParam(5, $admin->getMdpAdmin);
        $state->bindParam(6, $admin->getDateNaissanceAdmin);
        $state->bindParam(7, $admin->getEmailAdmin);
        $state->bindParam(8, $admin->getCheminAvatarAdmin);
        $state->bindParam(9, $admin->getIdAdmin);
        $state->execute();       
    }
}
