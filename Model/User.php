<?php
class User {

    private $_db;
    private $_login;
    private $_psw;
    private $_pswHashed;
    private $_mail;

    public function __construct($data) {
        $this->hydrate($data);
    }

    public function hydrate($data) {

        foreach ($data as $key => $value) {

            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    // Adds a user to db.
    public function add_user() {

        $req = $this->db()->prepare('INSERT INTO users(pseudo, pass, email) VALUES (:login, :psw, :mail)');
        $req->execute(array(
            'login' => $this->login(),
            'psw' => $this->pswHashed(),
            'mail' => $this->mail()
        ));
    }

    // Returns a password hash from db.
    public function password_check($login) {

        $req = $this->db()->prepare('SELECT pass FROM users WHERE pseudo=:pseudo');
        $req->bindParam(':pseudo', $this->login(), PDO::PARAM_STR);
        $req->execute();
        $dbPsw = $req->fetchAll();

        return $dbPsw[0][0];
    }

    // Returns true if a user already exists.
    public function user_exist() {

        $req = $this->db()->prepare('SELECT pseudo FROM users WHERE pseudo=:pseudo');
        $req->bindParam(':pseudo', $this->login(), PDO::PARAM_STR);
        $req->execute();
        $pseudo = $req->fetchAll();

        if (!empty($pseudo)) {
            return true;
        } else {
            return false;
        }
    }

    // --- GETTERS ---

    public function login() {
        return $this->_login;
    }

    public function psw() {
        return $this->_psw;
    }

    public function pswHashed() {
        return $this->_pswHashed;
    }

    public function mail() {
        return $this->_mail;
    }

    public function db() {
        return $this->_db;
    }

    // --- SETTERS ---

    public function setLogin($login) {
        $this->_login = $login;
    }

    public function setPsw($psw) {
        $this->_psw = $psw;
    }

    public function setPswHashed($psw) {
        $this->_pswHashed = password_hash($psw, PASSWORD_DEFAULT);
    }

    public function setMail($mail) {
        $this->_mail = $mail;
    }

    public function setDb(PDO $db) {
        $this->_db = $db;
    }
}