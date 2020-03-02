<?php

    include("header-footer/header.php");
    include("dataManager/dataBaseLinker.php");
    include("data/User.php");
    include("dataManager/UserManager.php");
    $idUser = UserManager::findIdUser($_SESSION["ppe_session"]);
    $user = new User();
    $user = UserManager::findUser($idUser);
    
?>
    <div class="profil_content">

                <div class="text">
                        <p>Votre Profil</p>
                </div>

                <div class="profil">

                        <div class="Avatar">
                            "Avatar"
                        </div>

                        <div class="Pseudo">
<?php
echo $_SESSION["ppe_session"];
?>
                        </div>
                </div>       
                
                <div class="UpdateMdp">
                    
                    <p>Changer son mot de passe : </p>
                    
                    <form method="post" action="profil.php" name="updatePassword" class="updateMdp">
                            
                            <p>Entrée votre ancien mot de passe</p>
                            <input type="password" name="oldPassword">
                            
                            <p>Tapez votre nouveau mot de passe</p>
                            <input type="password" name="newPassword"><br>

                            <p>Retapez votre nouveau mot de passe</p>
                            <input type="password" name="repeatNewPassword"><br>

                            <input type="submit" name="submit" value="Valider">
                    </form>
                    
                </div>
        

    </div>

<?php 

    if (isset($_POST['submit']))
    {
       /* on test si les champs sont bien remplis */
        if(!empty($_POST['oldPassword']) && !empty($_POST['newPassword']) && !empty($_POST['repeatNewPassword']))
        {
            /* on test si les deux mdp sont bien identique */
            if ($_POST['newPassword']==$_POST['repeatNewPassword'])
            {   
                $user->setMdp($_POST['newPassword']);
                UserManager::updateUser($user);
                header('Location: profil.php');
                echo "Vous venez de changer votre mot de passe.";              
                exit;
            }
            else 
            {
                echo "Vérifier d'avoir bien rempli les champs.";
            }   
        }
        else 
        {
            echo "Veuillez saisir tous les champs !";
        }
    }
    
include("header-footer/footer.php");
?>