<?php


class Commentaire
{
    private $idCommentaire;
<<<<<<< HEAD
=======
    private $pseudo;
>>>>>>> 4149a1386a1755ba0739c13bcac1843291c94f8c
    private $dateCommentaire;
    private $content;
    private $idThread;

    
    public function setIdCommentaire($idCommentaire) 
    {
        $this->idCommentaire = $idCommentaire;
    }
    public function getIdCommentaire() 
    {
        return $this->idCommentaire;
    }
    
<<<<<<< HEAD

=======
    
    public function setPseudo($pseudo) 
    {
        $this->pseudo = $pseudo;
    }       
    public function getPseudo() 
    {
        return $this->pseudo;
    }
    
    
    
>>>>>>> 4149a1386a1755ba0739c13bcac1843291c94f8c
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
