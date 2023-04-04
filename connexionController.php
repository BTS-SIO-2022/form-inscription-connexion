<?php

require __DIR__.'/inc/DB.php';

session_start();

if(isset($_POST['name']) && isset($_POST['password'])){
    $db = new DB;
    $pdo= $db->getPDO();

    $userName = $_POST['name'];
    $userPass = $_POST['password'];

    $pdoStatement = $pdo->prepare('SELECT * FROM utilisateurs WHERE username = :name');
    $pdoStatement->bindParam(':name', $userName);
    $pdoStatement->execute();
    $result = $pdoStatement->fetch(PDO::FETCH_ASSOC);
    var_dump($result);

    /* Je vérifie bien que le mot de passe transmis par l'utilisateur à la connexion correspond bien au mot de passe stocké en base de donnée. Pour cela j'utilise la fonction password_verify https://www.php.net/manual/en/function.password-verify.php
    Si le retour de cette fonction est true c'est que le mot de passe correspond au hash. Si c'est false, c'est pas bon, c'est différent.
        */
    
    $isPasswordSame = password_verify($userPass, $result['password']);

    if($result!=0 && $isPasswordSame!=0){
        $_SESSION['username'] = $result['username'];
        $_SESSION['email'] = $result['email'];
        var_dump($_SESSION);
        //die();
        header('Location: private.php');
    }else{
        header('Location: connexion.php?erreur=1');
        // mot de passe ou nom d'utilisateur incorrecte;
    }

}else {
    header('Location: connexion.php?erreur=2');
    // Les infos sont vides
}

?>