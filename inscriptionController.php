<?php

require __DIR__.'/inc/DB.php';

var_dump($_POST);

$db = new DB;
//var_dump($db);

$pdo= $db->getPDO();
//var_dump($pdo);

