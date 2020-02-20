<?php

    function testIdentifiants($username, $password)
    {
        $loginUser = "MatteoJames";
        $passwordUser = "Brexit2020";
        
        $codeRetour = false;
        
        if ($username == $loginUser && $password == $passwordUser)
        {
            $codeRetour = true;
        }
            
        return $codeRetour;
    }
?>