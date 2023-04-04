<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Inscription</h1>

    <?php
//    var_dump($_POST);
//    var_dump($_GET);
  if(isset($_GET['erreur']))
  {
    $erreur = $_GET['erreur'];
    switch($erreur)
    {
      case 1 :
        echo "<p style='color:red;'>Une erreur est survenue, nous n'avons pas inscrire, merci de reessayer plus tard</p>";
        break;
      case 2 : 
        echo "<p style='color:red;'>Les mots de passe ne sont pas identiques</p>";
        break;
      case 3 :
        echo "<p style='color:red;'>Merci de remplir toutes les informations</p>";
        break;
    }
  }
    ;?>

<form action="inscriptionController.php" method="POST">
    <div class="mb-3">
    <label for="exampleInputName" class="form-label">Renseigner votre nom</label>
    <input type="text" class="form-control" id="exampleInputName" name="name">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Renseigner votre Email</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="email">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
  </div>
  <div class="mb-3">
    <label for="exampleInputPasswordVerif" class="form-label">Vérifier mot de passe</label>
    <input type="password" class="form-control" id="exampleInputPasswordVerif" name="password-verif">
  </div>

  <button type="submit" class="btn btn-primary">M'inscrire</button>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>