<?php
    
    include("header-footer/header.php");
    include("dataManager/dataBaseLinker.php");
    include("dataManager/UserManager.php");
    include("data/User.php");

?>

    <div class="page_content">
    	<div class="text">
    		<p>Connexion</p>
    	</div>
    	
	    <div class="page_connexion">
                
                    <form method="post" action="login.php" name="login_form" class="div_connexion">
                        
                                    <div class="fieldset_connexion">

                                                <div>
                                                        <label for="idLogin">Identifiant:</label>
                                                        <input type="text" id="idLogin" name="username" class="input_login" required>
                                                </div>

                                                <div>
                                                        <label for="idPassword">Mot de passe:</label>
                                                        <input type="password" id="idPassword" name="password" class="input_password" required>
                                                </div>

                                                <input type="submit" name="submit" value="Connexion" class="button_connexion">

                                    </div>
                    </form>
                
	    </div>
        
	</div>

<?php

    if (!empty($_POST["username"]) && !empty($_POST["password"]))
    {   
        $codeRetour = UserManager::testIdentifiants($_POST["username"], $_POST["password"]);

        if ($codeRetour == true)
        {
            $_SESSION["ppe_session"] = $_POST["username"];
            $_SESSION["idUser"]= UserManager::findIdUser($_POST["username"]);
            header('Location: index.php');
            exit;
        }
        else
        {
            echo '<div class="pbCo">';
            echo "<br>Identifiant ou mot de passe incorrect.";
            echo '</div>';
        }
    }
        
	//Deconnexion
    if (!empty($_GET["deco"]) && $_GET["deco"] == true)
    {
            session_unset();
            session_destroy();
            header('Location: index.php');
            exit;
    }
    
    include("header-footer/footer.php");
?>

