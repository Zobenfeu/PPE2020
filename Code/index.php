<?php

    session_name("ppe_session");
	session_start();

    include("fonctions.php");

	if (!empty($_POST["username"]) && !empty($_POST["password"]))
	{
		
        if (testIdentifiants($_POST["username"], $_POST["password"]) == true)
        {
            $_SESSION["login"] = $_POST["username"];
            
            header('Location: admin.php');
			exit;
        }
	}
	
	if (!empty($_GET["deco"]) && $_GET["deco"] == true)
	{
        session_unset();
		session_destroy();
	}

    include("header.php");
	
?>
    <link rel="stylesheet" type="text/css" href="css/index.css" media="all"/>

    <div class="page_content">
    	Vous devez vous connecter pour accéder au forum
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
