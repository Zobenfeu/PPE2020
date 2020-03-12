<?php

    include("header-footer/header.php");
    include("dataManager/dataBaseLinker.php");
    include("data/User.php");
    include("dataManager/UserManager.php");
    
    /*Connexion a la base de données*/
    $bdd= DataBaseLinker::getConnexion();
    
    /* Vérification de la connexion */
    if (!$bdd)
    {
        echo "echec de la connexion";
        exit();
    }
?>

        <div class="text">
    		<p>Pas de compte ?</p>
                <br>
                <p>Incrivez-vous</p>
    	</div>
    	
	    <div class="page_register">
                
                    <form method="post" action="register.php" name="login_form" class="div_connexion">
                        
                                    <div class="fieldset_register">

                                                    <p>Pseudo</p>
                                                    <input type="text" name="pseudo">
                                                    
                                                    <p>Password</p>
                                                    <input type="password" name="password">
                                                    
                                                    <p>Répetez votre password</p>
                                                    <input type="password" name="repeatpassword"><br><br>

                                                    <input type="submit" name="submit" value="Valider" class="button_connexion">

                                    </div>
                    </form>
                
	    </div>


<?php

    if (isset($_POST['submit']))
    {
       /* on test si les champs sont bien remplis */
        if(!empty($_POST['pseudo']) and !empty($_POST['password']) and !empty($_POST['repeatpassword']))
        {
            /* on test si les deux mdp sont bien identique */
            if ($_POST['password']==$_POST['repeatpassword'])
            {   
                $user = new User;
                $user->setPseudo($_POST['pseudo']);
                $user->setMdp($_POST['password']);
                UserManager::insertUser($_POST['pseudo'],$_POST['password']);
                echo "Vous êtes bien inscrit sur le forum.";
                header('Location: index.php');
                exit;
            }
            else 
            {
                echo "Les mots de passe ne sont pas identiques";
            }   
        }
        else 
        {
            echo "Veuillez saisir tous les champs !";
        }
    }
   
?>

<?php
    include("header-footer/footer.php");
?>