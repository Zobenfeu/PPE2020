<?php

class Thread 
{
    private $idThread;
    private $sujet;
    private $text;
    private $date;
    
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
    
    
    public function setDate($date)
    {
        $this->date=$date;
    }
    
    public function getDate()
    {
        return $date;
    }
    
}
