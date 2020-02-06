<?php

    session_name("tp05_session");
    session_start();

    include("header.php");

    if (empty($_SESSION["login"]))
    {
        header('Location: index.php');
        exit;
    }

?>

    <link rel="stylesheet" type="text/css" href="css/admin.css" media="all"/>

    <div class="container_page grey_background">
        <div class= "div_connexion">
            <fieldset class="fieldset_admin">

                <a href="index.php?deco=true" class="button_deco">Se déconnecter</a>

                <div class="container">
                    <p class="text_intro">Page d'administration</p>
                    <img class="profil_picture" src="img/admin.png" alt="admin"/>
                </div>
            </fieldset>
        </div>
     </div>

<?php

    include("footer.php");
	
?>