<?php
/**
 * Created by PhpStorm.
 * User: francois.mathieu
 * Date: 15/01/2018
 * Time: 15:06
 */

use Utils\Session;
use Utils\Users;

require_once(__DIR__ . "/../config/config.php");
Session::session_start();

if (isset($_POST['username'])) {
    if (Users::isUsernamePasswordValid($_POST['username'], $_POST['password'])) {
        Session::setAuth($_POST['username']);
        Session::addFlash('success', 'Vous êtes maintenant connectés');
        Session::redirecting('content.php');
    }else {
        Session::addFlash('danger', 'Vos identifiants sont invalides');
        Session::redirecting('login.php');
    }
}
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Titre</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
<div class="container">
    <h1>Inscription</h1>
    <?php Session::getFlashBag() ?>
    <form action="login.php" method="POST">
        <div class="form-group">
            <label for="username">Pseudo</label>
            <input class="form-control" type="text" name="username" id="username">
        </div>
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input class="form-control" type="password" name="password" id="password">
        </div>
        <div class="form-group">
            <input class="btn btn-default" type="submit" value="Se connecter">
        </div>
    </form>
</div>
</body>
</html>
