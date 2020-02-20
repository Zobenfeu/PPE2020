 <link rel="stylesheet" type="text/css" href="css/login.css" media="all"/>

<?php

    session_name("ppe_session");
    session_start();
    
    include("header.php");
    include("fonctions.php");
    include("dataManager/UserManager.php");
    include("dataManager/AdminManager.php");
    
        //Connexion
	if (!empty($_POST["username"]) && !empty($_POST["password"]))
	{   
            $codeRetourUser = UserManager::testIdentifiants($_POST["username"], $_POST["password"]);
            $codeRetourAdmin = AdminManager::testIdentifiants($_POST["username"], $_POST["password"]);
            
            if ($codeRetourUser == true || $codeRetourAdmin==true)
            {
                $_SESSION["login"] = $_POST["username"];

                header('Location: index.php');
                exit;
            }
            else
            {
                echo "<br>Identifiant ou mot de passe incorrect.";
            }
	}
        
	//Deconnexion
	if (!empty($_GET["deco"]) && $_GET["deco"] == true)
	{
                session_unset();
		session_destroy();
	}

?>

    <div class="page_content">
    	<div class="text">
    		<p>Vous devez vous connecter pour accéder au forum</p>
    	</div>
    	
	    <div class="page_connexion">
                
                    <form method="post" action="index.php" name="login_form" class="div_connexion">
                        
                                    <div class="fieldset_connexion">

                                                <div>
                                                        <label for="idLogin">Identifiant:</label>
                                                        <input type="text" id="idLogin" name="username" class="input_login" required>
                                                </div>

                                                <div>
                                                        <label for="idPassword">Mot de passe:</label>
                                                        <input type="password" id="idPassword" name="password" class="input_password" required>
                                                </div>

                                                <input type="submit" value="Connexion" class="button_connexion">

                                    </div>
                    </form>
                
	    </div>
	</div>
<?php

    include("footer.php");
	
?>

