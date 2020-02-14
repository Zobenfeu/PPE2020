<?php

class Admin 
{
    private $idAdmin;
    private $nomAdmin;
    private $prenomAdmin;
    private $pseudoAdmin;
    private $mdpAdmin;
    private $dateNaissanceAdmin;
    private $emailAdmin;
    private $cheminAvatarAdmin;
    
    
    function getIdAdmin() {
        return $this->idAdmin;
    }

    function getNomAdmin() {
        return $this->nomAdmin;
    }

    function getPrenomAdmin() {
        return $this->prenomAdmin;
    }

    function getPseudoAdmin() {
        return $this->pseudoAdmin;
    }

    function getMdpAdmin() {
        return $this->mdpAdmin;
    }

    function getDateNaissanceAdmin() {
        return $this->dateNaissanceAdmin;
    }

    function getEmailAdmin() {
        return $this->emailAdmin;
    }

    function getCheminAvatarAdmin() {
        return $this->cheminAvatarAdmin;
    }

    function setIdAdmin($idAdmin) {
        $this->idAdmin = $idAdmin;
    }

    function setNomAdmin($nomAdmin) {
        $this->nomAdmin = $nomAdmin;
    }

    function setPrenomAdmin($prenomAdmin) {
        $this->prenomAdmin = $prenomAdmin;
    }

    function setPseudoAdmin($pseudoAdmin) {
        $this->pseudoAdmin = $pseudoAdmin;
    }

    function setMdpAdmin($mdpAdmin) {
        $this->mdpAdmin = $mdpAdmin;
    }

    function setDateNaissanceAdmin($dateNaissanceAdmin) {
        $this->dateNaissanceAdmin = $dateNaissanceAdmin;
    }

    function setEmailAdmin($emailAdmin) {
        $this->emailAdmin = $emailAdmin;
    }

    function setCheminAvatarAdmin($cheminAvatarAdmin) {
        $this->cheminAvatarAdmin = $cheminAvatarAdmin;
    }
}
