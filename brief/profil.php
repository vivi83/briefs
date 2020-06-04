<?php
session_start();

$pdo=new PDO ("mysql:host=localhost;dbname=brief;charset=utf8;","root","");

if(isset($_GET['id'])AND $_GET['id']>0){

    $getid=intval($_GET['id']);
    
    $requser= $pdo->prepare("SELECT*FROM user WHERE id=? ");
    $requser->execute(array($getid));
    $userinfo=$requser->fetch();
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
        <h2> Profil de <?php echo $userinfo["name"]; ?></h2>
        <h4>Pseudo: <?php echo $userinfo['name'];?> </h4>
        <h4>Mail:<?php echo $userinfo['email'];?></h4>
    <?php
    if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id'])
    {
<<<CODEHTML
//lien ne s'affiche pas
        <a href="#">Editer mon profil</a>
        <a href="deconnection.php">Se déconnecter</a>
CODEHTML;
       
    }
          ?>
    </main>
    <footer>
        <p>tous droits réservés</p>
    </footer>

</body>

</html>
<?php
}
?>