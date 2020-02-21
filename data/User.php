<?php

class User
{
    private $idUser;
    private $nom;
    private $prenom;
    private $pseudo;
    private $mdp;
    private $dateNaissance;
    private $email;
    private $cheminAvatar;
    private $ban;
    private $admin;
    
    
    function getIdUser() {
        return $this->idUser;
    }

    function getNom() {
        return $this->nom;
    }

    function getPrenom() {
        return $this->prenom;
    }

    function getPseudo() {
        return $this->pseudo;
    }

    function getMdp() {
        return $this->mdp;
    }

    function getDateNaissance() {
        return $this->dateNaissance;
    }

    function getEmail() {
        return $this->email;
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

    function setIdUser($idUser) {
        $this->idUser = $idUser;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    function setPseudo($pseudo) {
        $this->pseudo = $pseudo;
    }

    function setMdp($mdp) {
        $this->mdp = $mdp;
    }

    function setDateNaissance($dateNaissance) {
        $this->dateNaissance = $dateNaissance;
    }

    function setEmail($email) {
        $this->email = $email;
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
