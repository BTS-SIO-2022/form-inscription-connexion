<?php

// Afin de faciliter la manipulation de la connexion à ma base de données dans les différents composants de mon code, je vais utiliser la programmation orientée objet et donc créer une classe qui sera en "charge" d'établir la connexion à la BDD

class DB {

    private $pdo;

    public function __construct()
    {    
    $dbname = "book";
    $dsn = "mysql:host=localhost;dbname=".$dbname;
    $username = "book";
    $password = "book";

        try 
        {
            $pdoConnexion = new PDO($dsn, $username, $password);
        } catch (PDOException $exception){
            echo 'Connexion échouée :'.$exception->getMessage();
        }

        $this->pdo = $pdoConnexion;
    }

    public function getPDO(){
        return $this->pdo;
    }
}