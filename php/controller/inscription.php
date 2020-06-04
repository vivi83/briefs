<?php


$pdo=new PDO ("mysql:host=localhost;dbname=brief;charset=utf8;","root","");



if(isset($_POST['confirmation']))
{ $name=htmlspecialchars($_POST['name']); 
    $email=htmlspecialchars($_POST['email']);
    $email2=htmlspecialchars($_POST['email2']);
    $password=sha1($_POST['password']);
    $password2=sha1($_POST['password2']);

    if(!empty($_POST['name'])AND !empty($_POST['email'])AND !empty($_POST['email2'])AND !empty($_POST['password'])AND !empty($_POST['password2']))
    {
        $namelength= strlen($name);
        if($namelength <= 255){
            if($email==$email2){
                if(filter_var($email,FILTER_VALIDATE_EMAIL)){
                   // $verifmail=$pdo->prepare("SELECT*FROM user WHERE email=?");
                   // $verifmail->execute(array($email));
                   // $verifmail->execute(array($name));
                   // $mailexist=$verifmail->rowCount();
                    //if($mailexist==0){
                
                     if($password==$password2){
                            $insertmbr = $pdo->prepare ("INSERT INTO user (name,email,password) VALUES (?,?,?)");
                            $insertmbr->execute (array($name,$email,$password));
                            $erreur="Votre compte a bien été cré <a href=\"../../admin.php\"> Admin</a>";
                            //$_SESSION['comptecree']="Votre compte a bien était créer";
                           // header('Location:index.php');
                        }else{
                         $erreur="les mots de passes sont différents";
                                }
                            
                           // }else { 
                   // $erreur="Adresse mail existe déjà";
                      //  }
                    }
                 else{
                    $erreur="Votre adresse mail n'est pas valide";
                        }
            }else{
                $erreur="Vos adresses mail sont différentes";
            }
        }else{
            $erreur="votre pseudo est trop grand";
        }
       
    }else{
        $erreur= "Tous les champs doivent être remplis";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    </style>
</head>
<body>
    <header>
        
    </header>
    <main>
        <h2> Inscription</h2>
        <form method="POST" action="">
            <input type="text" name="name" placeholder="entrez votre name" >
            <input type="email" name="email" placeholder="entrez votre email">
            <input type="email" name="email2" placeholder="confirmez votre email">
            <input type="password" name="password" placeholder="entrez votre password">
            <input type="password" name="password2" placeholder="confirmez votre password">
            <input type="submit" name="confirmation" value="envoyer">
        </form>
        <?php
            if(isset($erreur))
            {
                echo $erreur;
            }
        ?>
    </main>
    <footer>
        <p>tous droits réservés</p>
    </footer>

</body>

</html>