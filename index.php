<?php 
    session_name("ppe_session");
    session_start();
    include("header.php");

    if($_SESSION["ppe_session"] == false)
    {
        header('Location: login.php');
    }
    
   
?>
	
        <link rel="stylesheet" type="text/css" href="index.css" media="all"/>

            <div class="container-sujet">
                <div class="headOfSujet">
                    <p>Vos Sujet</p>
                </div>

                <div class="blockGerer">

                </div>
                
                <div class="boutonRetour">
            </div>    
                
   
                
                
<?php
    include("footer.php");
?>
