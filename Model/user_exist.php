<?php
function user_exist($login) {
    global $bdd;
    $login = (string) $login;

    $req = $bdd->prepare('SELECT pseudo FROM users WHERE pseudo=:pseudo');
    $req->bindParam(':pseudo', $login, PDO::PARAM_STR);
    $req->execute();
    $pseudo = $req->fetchAll();

    if(!empty($pseudo)) {
        return true;
    } else {
        return false;
    }
}