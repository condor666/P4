<?php
function add_user($login, $psw, $mail) {

    global $bdd;
    $login = (string) $login;
    $pswHashed = password_hash($psw, PASSWORD_DEFAULT);
    $mail = (string) $mail;

    $req = $bdd->prepare('INSERT INTO users(pseudo, pass, email) VALUES (:login, :psw, :mail)');
    $req->execute(array(
        'login' => $login,
        'psw' => $pswHashed,
        'mail' => $mail
    ));
}