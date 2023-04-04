<?php
    session_start(); 
    var_dump($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace privé pour les membres connectés</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php if(isset($_SESSION) && !empty($_SESSION)):?>
    <div id="private-space-container" class="container col-md">
        <h1>Bonjour <?=$_SESSION['username'];?></h1>
        <p> Bienvenue, vous êtes connecté et dans votre espace privé</p>
        <img src="assets/chien-licorne.jpg">
        <div>
            <a href="deconnexionController.php" class="btn btn-dark mt-3">Se déconnecter</a>
        </div>
    </div>
    <?php else :?>
    <h1> Vous n'êtes pas autorisé à voir le contenu de cette page</h1>
    <?php endif;?>



  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>