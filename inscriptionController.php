<?php

require __DIR__.'/inc/DB.php';
//require 'const.php';

var_dump($_POST);

/* Objectif final = ajouter mon utilisateur à la base de données

Etape 1 : vérifier que je recois bien l'ensemble des données dont j'ai besoin (c'est à dire non vide)
Etape 2 : je vérifie que les deux mots sont identiques
Etape 3 : sécuriser les données recues de mon utilisateur afin d'éviter toute cyber attaque et risque d'injection SQL sur ma base de données
Etape 4 : ajouter mon utilisateur à ma base de données
Etape 5 : rediriger l'internaute vers un fichier qui lui dit que tout s'est bien passé
*/

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password-verif']))
{
    if($_POST['password'] === $_POST['password-verif'])
    {
        $db = new DB;
        $pdo= $db->getPDO();

        $newUserName = $_POST['name'];
        $newUserEmail = $_POST['email'];

        //$newUserPass = $_POST['password'];
        /* Une clé de salage est déjà intégré à la fonction password_hash. Néanmoins, il est tout à fait possible de 1 definir sa propre clé de salage dans les paramètres de la fonction password_hash ou bien je peux aussi rajouter une clé de salage que j'aurai déterminée via par exemple des Constantes comme le fait Wordpress (cf fichier const.php)*/
        $newUserPass = $_POST['password'];

        // Attention je ne stocke pas mes mots de passe en clair dans ma base de données, j'utilise une fonction de hachage comme par exemple : password_hash : https://www.php.net/manual/fr/function.password-hash.php#:~:text=La%20fonction%20password_hash()%20cr%C3%A9e,depuis%20PHP%205.5.0).
        $newUserPassSecured = password_hash($newUserPass, PASSWORD_DEFAULT);
        var_dump($newUserPassSecured);

        /* Je suis maintenant à l'étape 4, soit l'ajout des données de mon utilisateur dans ma base de données. J'utilise les REQUETES PREPAREES car je vais injecter en base de données des données reçues de mon utilisateur. 
        LES REQUETES PREPAREES PERMETTENT DE "NETTOYER" LES DONNEES avant leur ajout en base de données */

        $pdoStatement = $pdo->prepare('INSERT INTO utilisateurs (username, password, email) VALUES (:name, :password, :email)');
        $pdoStatement->bindParam(':name', $newUserName); 
        $pdoStatement->bindParam(':email', $newUserEmail); 
        $pdoStatement->bindParam(':password', $newUserPassSecured); 
        $result = $pdoStatement->execute();
        
        var_dump($result);
    }
}
