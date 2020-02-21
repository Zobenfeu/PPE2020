<?php
    session_name("ppe_session");
    session_start();
    include("header.php");
    
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

                                                    <input type="submit" value="Valider" class="button_connexion">

                                    </div>
                    </form>
                
	    </div>

<?php
    

    $user = new User;
    $user->setPseudo($_POST['pseudo']);
    $user->setMdp($_POST['password']);
    
    if (isset($_POST['submit']))
    {
       /* on test si les champ sont bien remplis */
        if(!empty($_POST['pseudo']) and !empty($_POST['password']) and !empty($_POST['repeatpassword']))
        {
            /* on test si les deux mdp sont bien identique */
            if ($_POST['password']==$_POST['repeatpassword'])
            {
                UserManager::insertUser($user);
                echo "Vous êtes bien inscrit sur le forum.";
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