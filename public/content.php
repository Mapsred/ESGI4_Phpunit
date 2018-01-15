<?php

use Utils\Session;

require_once(__DIR__ . "/../config/config.php");

Session::logged_only();

$user = Session::getUser();
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contenu</title>
</head>
<body>
<ul>
    <li>Bonjour <?= $user['username'] ?></li>
    <li>Votre mot de passe est : <?= $user['password'] ?></li>
</ul>
</body>
</html>