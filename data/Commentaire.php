<?php


class Commentaire
{
    private $idCommentaire;
    private $dateCommentaire;
    private $content;
    private $idUser;
    private $idThread;

    function getIdUser() {
        return $this->idUser;
    }

    function setIdUser($idUser) {
        $this->idUser = $idUser;
    }

        public function setIdCommentaire($idCommentaire) 
    {
        $this->idCommentaire = $idCommentaire;
    }
    public function getIdCommentaire() 
    {
        return $this->idCommentaire;
    }
    

    public function setDateCommentaire($dateCommentaire) 
    {
        $this->dateCommentaire = $dateCommentaire;
    }
    public function getDateCommentaire() 
    {
        return $this->dateCommentaire;
    }
    
    
    public function setContent($content) 
    {
        $this->content = $content;
    }
    public function getContent() 
    {
        return $this->content;
    }

    
    
    public function setIdThread($idThread) 
    {
        $this->idThread = $idThread;
    }
    public function getIdThread() 
    {
        return $this->idThread;
    }
    
}
