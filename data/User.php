<?php

class User
{
    private $idUser;
    private $pseudo;
    private $mdp;
    private $cheminAvatar;
    private $ban;
    private $admin;
    
    
    function getIdUser() {
        return $this->idUser;
    }
    
    function setIdUser($idUser) {
        $this->idUser = $idUser;
    }

    function getPseudo() {
        return $this->pseudo;
    }

    function getMdp() {
        return $this->mdp;
    }

    function getCheminAvatar() {
        return $this->cheminAvatar;
    }

    function getBan() {
        return $this->ban;
    }

    function getAdmin() {
        return $this->admin;
    }

    function setPseudo($pseudo) {
        $this->pseudo = $pseudo;
    }

    function setMdp($mdp) {
        $this->mdp = $mdp;
    }

    function setCheminAvatar($cheminAvatar) {
        $this->cheminAvatar = $cheminAvatar;
    }

    function setBan($ban) {
        $this->ban = $ban;
    }

    function setAdmin($admin) {
        $this->admin = $admin;
    }
}
