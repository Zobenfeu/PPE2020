<?php

class Thread 
{
    private $idThread;
    private $sujet;
    private $text;
<<<<<<< HEAD
    private $dateParution;
=======
    private $date;
>>>>>>> 4149a1386a1755ba0739c13bcac1843291c94f8c
    
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
    
    
<<<<<<< HEAD
    public function setDateParution($dateParution)
    {
        $this->dateParution=$dateParution;
    }
    
    public function getDateParution()
    {
        return $dateParution;
=======
    public function setDate($date)
    {
        $this->date=$date;
    }
    
    public function getDate()
    {
        return $date;
>>>>>>> 4149a1386a1755ba0739c13bcac1843291c94f8c
    }
    
}
