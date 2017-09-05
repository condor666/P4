<?php

include_once('../Model/connexion_sql.php');
include_once ('../Model/user_exist.php');
include_once ('../Model/password_check.php');

$login = htmlspecialchars($_POST['login']);
$psw = htmlspecialchars($_POST['psw']);


// Check form values then show members area.
if(user_exist($login)) {

    $dbPsw = password_check($login);

    if(password_verify($psw, $dbPsw)) {
        include_once('../View/member_area.php');
    } else {
        echo '<p>Votre mot de passe ou votre email semble erroné.</p><p><a href="../View/login.php">Retour à la page de connexion</a></p>';
    }

} else {
    echo '<p>Votre mot de passe ou votre email semble erroné.</p><p><a href="../View/login.php">Retour à la page de connexion</a></p>';
}