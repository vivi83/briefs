<?php
session_start();

$pdo=new PDO ("mysql:host=localhost;dbname=brief;charset=utf8;","root","");

if(isset($_POST['connexion'])){

$emailconnexion= htmlspecialchars($_POST['emailconnexion']);
$passwordconnexion=sha1($_POST['passwordconnexion']);
    if(!empty($emailconnexion)AND !empty($passwordconnexion)){
        $confirmuser= $pdo->prepare("SELECT*FROM user WHERE email=? AND password=?");
        $confirmuser->execute(array($emailconnexion,$passwordconnexion));
        $userexiste= $confirmuser->rowCount();
        if($userexiste == 1){
            $userinfo=$confirmuser->fetch();
            $_SESSION['id']=$userinfo['id'];
            $_SESSION['name']=$userinfo['name'];
            $_SESSION['email']=$userinfo['email'];
            header("Location:admin.php?id=".$_SESSION['id']);
        }else{
            $erreur="Mauvais email ou mot de passe";
            }

    }else{
        $erreur = "Tous les champs doivent être complétés";
        }

}
?>

        <h2> Connexion</h2>
        <form method="POST" action="">
           
            <input type="email" name="emailconnexion" placeholder="entrez votre email">
            
            <input type="password" name="passwordconnexion" placeholder="entrez votre password">
           
            <input type="submit" name="connexion" value="envoyer">
        </form>
        <?php
            if(isset($erreur))
            {
                echo $erreur;
            }
        ?>
