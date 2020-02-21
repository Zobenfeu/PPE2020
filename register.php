<?php
    session_name("ppe_session");
    session_start();
    include("header.php");
?>

        <div class="text">
    		<p>Pas de compte ?</p>
                <br>
                <p>Incrivez-vous</p>
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

