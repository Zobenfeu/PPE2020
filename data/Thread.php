<?php

class Thread 
{
    private $idThread;
    private $sujet;
    private $text;
    private $dateParution;
    
    public function setIdThread($idThread)
    {
        $this->idThread=$idThread;
    }
    
    public function getIdThread()
    {
        return $idThread;
    }
    
    
    public function setSujet($sujet)
    {
        $this->sujet=$sujet;
    }
    
    public function getSujet()
    {
        return $sujet;
    }
    
    
    public function setText($text)
    {
        $this->text=$text;
    }
    
    public function getText()
    {
        return $text;
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