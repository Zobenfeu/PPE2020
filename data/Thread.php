<?php

class Thread 
{
    private $idThread;
    private $sujet;
    private $text;
    private $dateParution;
    private $idUser;
    private $fermer;
    
    function getFermer() {
        return $this->fermer;
    }

    function setFermer($fermer) {
        $this->fermer = $fermer;
    }

        public function setIdThread($idThread)
    {
        $this->idThread=$idThread;
    }
    
    public function getIdThread()
    {
        return $this->idThread;
    }
    
    function getIdUser() {
        return $this->idUser;
    }

    function setIdUser($idUser) {
        $this->idUser = $idUser;
    }

        public function setSujet($sujet)
    {
        $this->sujet=$sujet;
    }
    
    public function getSujet()
    {
        return $this->sujet;
    }
    
    
    public function setText($text)
    {
        $this->text=$text;
    }
    
    public function getText()
    {
        return $this->text;
    }
    
    public function setDateParution($dateParution)
    {
        $this->dateParution=$dateParution;
    }
    
    public function getDateParution()
    {
        return $dateParution;
    }
    
}
