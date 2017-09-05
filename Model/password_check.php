<?php
function password_check($login) {
    global $bdd;
    $login = (string) $login;

    $req = $bdd->prepare('SELECT pass FROM users WHERE pseudo=:pseudo');
    $req->bindParam(':pseudo', $login, PDO::PARAM_STR);
    $req->execute();
    $dbPsw = $req->fetchAll();

    //var_dump($dbPsw[0][0]);
    return $dbPsw[0][0];
}