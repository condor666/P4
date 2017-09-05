<?php
include_once('../Model/connexion_sql.php');
include_once ('../Model/User.php');

$login = htmlspecialchars($_POST['login']);
$psw = htmlspecialchars($_POST['psw']);
$pswCheck = htmlspecialchars($_POST['psw_check']);
$mail = htmlspecialchars($_POST['mail']);
$data = array();

array_push($data, $login, $psw, $mail, $db);
var_dump($data);
$user_test = new User($data);

// Check form values then add user to db.
if(!($user_test->user_exist())) {

    if($psw == $pswCheck) {

        if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $mail)) {

            $user_test->add_user();
            echo '<a href="../View/member_area.php">Accéder à l\'espace membres</a>';
        } else {
            echo 'Merci de rentrer un mail valide';
        }
    } else {
        echo 'Vos mots de passe ne sont pas identiques';
    }
} else {
    echo 'Le nom d\'utilisateur est déjà pris.';
}