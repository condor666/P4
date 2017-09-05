<?php
include_once('../Model/connexion_sql.php');
include_once ('../Model/user_exist.php');
include_once ('../Model/add_user.php');

$login = htmlspecialchars($_POST['login']);
$psw = htmlspecialchars($_POST['psw']);
$pswCheck = htmlspecialchars($_POST['psw_check']);
$mail = htmlspecialchars($_POST['mail']);

// Check form values then add user to db.
if(!user_exist($login)) {
    echo 'user don\'t exist';
    if($psw == $pswCheck) {
        echo 'psw match';
        if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $mail)) {
            echo 'mail ok';
            add_user($login, $psw, $mail);
            echo '<a href="../View/member_area.php">Accéder à l\'espace membres</a>';
        } else {
            // mail not valid
        }
    } else {
        // pswd dont match
    }
} else {
    // user already exists
    echo 'user already exists';
}