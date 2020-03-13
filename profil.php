<?php

    include("header-footer/header.php");
    include("dataManager/dataBaseLinker.php");
    include("data/User.php");
    include("dataManager/UserManager.php");
    $idUser = UserManager::findIdUser($_SESSION["ppe_session"]);
    $user = UserManager::findUser($idUser);
    
?>
    <div class="profil_content">

                <div class="text">
                        <p>Votre Profil</p>
                </div>

                <div class="profil">

                        <div class="Avatar">
                            
                            <select name="$avatar">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                            
<?php
    
        if($avatar == 1)
        {
            echo '<img src="images/avatar1.jpg">';
        }
        else if($avatar == 2)
        {
            echo '<img src="images/avatar2.jpg">';
        }
        else
        {
            echo '<img src="images/avatar3.jpg">'; 
        }
    
    
?>                        
                        
                        
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
                            
                            <p>Entrez votre ancien mot de passe</p>
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

    if (!empty($_POST['submit']))
    {
       /* on test si les champs sont bien remplis */
        if(!empty($_POST['oldPassword']) and !empty($_POST['newPassword']) and !empty($_POST['repeatNewPassword']))
        {
            /* on test si les deux mdp sont bien identiques */
            if ($_POST['newPassword']==$_POST['repeatNewPassword'])
            {   
                $user->setMdp($_POST['newPassword']);
                UserManager::updateUser($user->getPseudo(), $user->getMdp(), $user->getIdUser());

                echo "Vous venez de changer votre mot de passe.";              
            }
            else 
            {
                echo '</br>';
                echo "Vérifiez d'avoir bien rempli les champs.";
            }   
        }     
        else 
        {
            echo "Veuillez saisir tous les champs !";
        }
    }
    
   
    
    
    
include("header-footer/footer.php");
?>