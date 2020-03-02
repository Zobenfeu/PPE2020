<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/general.css" media="all"/>
        <link rel="icon" type="image/png" href="images/icon.png" />
        <title>ForumPPE</title>      
    </head>
    <body>

<div class="green_banniere">
    <div class="bouton">
        <a href="index.php">Accueil</a>
    </div>
	<h2>FORUM PPE</h2>
<?php
    session_name("ppe_session");
    session_start();
    if(!empty($_SESSION["ppe_session"]))
    {   
        echo'<div class="bouton_container">';
        echo '<div class="profil">';
        echo '<a href="profil.php">'.$_SESSION["ppe_session"].'</a>';
        echo '</div>';
        
        echo '<div class="bouton">';
        echo '<a href="login.php?deco=true">Deconnexion</a>';
        echo "</div> ";
        echo'</div>';
    }
    else 
    {
        echo '<div class="bouton">';
        echo '<a href="login.php">Connexion</a>';
        echo "</div> ";
        
    }
?>

</div>
<div class="container_page">
