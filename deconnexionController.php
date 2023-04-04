<?php

session_start();
if(isset($_SESSION) && !empty($_SESSION)){
    unset($_SESSION['username']);
    unset($_SESSION['email']);
    session_destroy();
    header('Location: connexion.php');
}

;?>