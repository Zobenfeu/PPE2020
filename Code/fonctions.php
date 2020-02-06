<?php

    function testIdentifiants($login, $password)
    {
        $loginUser = "MatteoJames";
        $passwordUser = "Brexit2020";
        
        $codeRetour = false;
        
        if ($login == $loginUser && $password == $passwordUser)
        {
            $codeRetour = true;
        }
            
        return $codeRetour;
    }
?>