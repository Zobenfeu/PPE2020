<?php

class User
{
    private $idUser;
    private $nomUser;
    private $prenomUser;
    private $pseudoUser;
    private $mdpUser;
    private $dateNaissanceUser;
    private $emailUser;
    private $cheminAvatarUser;
    private $ban;
    private $idCommentaire;
    
    function getIdUser() {
        return $this->idUser;
    }

    function getIdCommentaire() {
        return $this->idCommentaire;
    }

    function setIdUser($idUser) {
        $this->idUser = $idUser;
    }

    function setIdCommentaire($idCommentaire) {
        $this->idCommentaire = $idCommentaire;
    }

        function getNomUser() {
        return $this->nomUser;
    }

    function getPrenomUser() {
        return $this->prenomUser;
    }

    function getPseudoUser() {
        return $this->pseudoUser;
    }

    function getMdpUser() {
        return $this->mdpUser;
    }

    function getDateNaissanceUser() {
        return $this->dateNaissanceUser;
    }

    function getEmailUser() {
        return $this->emailUser;
    }

    function getCheminAvatarUser() {
        return $this->cheminAvatarUser;
    }

    function setNomUser($nomUser) {
        $this->nomUser = $nomUser;
    }

    function setPrenomUser($prenomUser) {
        $this->prenomUser = $prenomUser;
    }

    function setPseudoUser($pseudoUser) {
        $this->pseudoUser = $pseudoUser;
    }

    function setMdpUser($mdpUser) {
        $this->mdpUser = $mdpUser;
    }

    function setDateNaissanceUser($dateNaissanceUser) {
        $this->dateNaissanceUser = $dateNaissanceUser;
    }

    function setEmailUser($emailUser) {
        $this->emailUser = $emailUser;
    }

    function setCheminAvatarUser($cheminAvatarUser) {
        $this->cheminAvatarUser = $cheminAvatarUser;
    }
    
    function getBan() {
        return $this->ban;
    }

    function setBan($ban) {
        $this->ban = $ban;
    }
}
