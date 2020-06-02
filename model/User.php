<?php

define("JJJ",           666);
define("ADMIN",         100);
define("MODERATOR",      50);
define("USER_PREMIUM",   40);
define("USER_REGULAR",   30);
define("USER_FREE",      20);
define("USER_LIMITED",   10);
define("DEACTIVATED",    20);

class User
{
    private $_db;
 
    private $_id_user;
    private $_user_pseudo; 
    private $_user_firstname; 
    private $_user_lastname; 
    private $_user_password;
    private $_user_mail;
    private $_user_avatar;
    private $_user_status;
    private $_user_level;
    private $_user_mail_token;
 
    private $error;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    // public function __construct(array $data)
    // {
    //     $this->hydrate($data);
    // }

    public function hydrate(array $data)
    {
        foreach($data as $key => $value)
        {
            $method = 'set'.ucfirst($key);
            if(method_exists($this, $method))
                $this->$method($value);
        }
    }

    public function getId_user() {
        return $this->_id_user;
    }

    public function getUser_pseudo() {
        return $this->_user_pseudo;
    }

    public function getUser_firstname() {
        return $this->_user_firstname;
    }

    public function getUser_lastname() {
        return $this->_user_lastname;
    }

    public function getUser_password() {
        return $this->_user_password;
    }

    public function getUser_mail() {
        return $this->_user_mail;
    }

    public function getUser_avatar() {
        return $this->_user_avatar;
    }

    public function getUser_level() {
        return $this->_user_level;
    }

    public function getUser_status() {
        return $this->_user_status;
    }

    public function setId_user($t) {
        $this->_id_user = $t;
    }

    public function setUser_pseudo($t) {
        $this->_user_pseudo = $t;
    }

    public function setUser_firstname($t) {
        $this->_user_firstname = $t;
    }

    public function setUser_lastname($t) {
        $this->_user_lastname = $t;
    }

    public function setUser_password($t) {
        $this->_user_password = $t;
    }

    public function setUser_mail($t) {
        $this->_user_mail = $t;
    }

    public function setUser_avatar($t) {
        $this->_user_avatar = $t;
    }

    public function setUser_level($t) {
        $this->_user_level = $t;
    }

    public function setUser_status($t) {
        $this->_user_status = $t;
    }

    private function generate_token($lenght=12)
    {
        $alphabet = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
        return substr(str_shuffle(str_repeat($alphabet, $lenght)), 0, $lenght);
    }

    public function signup($login, $pass, $mail, $level=30) 
    {
        $new_token = $this->generate_token();
        $stmt = $this->_db->prepare('INSERT INTO users (user_pseudo, user_password, user_mail, user_level, user_mail_token, user_status) VALUES (:user_pseudo, :user_password, :user_mail, :user_level, :user_mail_token, :user_status)');
        if(
            $stmt->execute(array(
                'user_pseudo' => $login,
                'user_password' => $pass,
                'user_mail' => $mail,
                'user_level' => $level,
                'user_mail_token' => $new_token,
                'user_status' => 0
            ))
        ) {
            // echo 'Create user SUCCESS';

            //verif token
            $myfile = fopen("token.html", "w") or die("Unable to open file!");
            fwrite($myfile, $new_token);
            fclose($myfile);
            // header('Location: ' . $_SERVER['HTTP_REFERER']);
            return true;
        }else{
            // echo 'Create user FAIL';
            return false;
        }
    }

    public function verify_mail($token) {
        $stmt = $this->_db->prepare('SELECT * FROM users WHERE user_mail_token=:token');
        // echo "rowCount : $count\n<br>";
        $results = $stmt->execute(array('token' => $token));
        $count = $stmt->rowCount(); // Compter les rows retournés.
        if($count>0) {
            // echo 'blah';
            $stmt_val = $this->_db->prepare('UPDATE users SET user_status=:user_status WHERE user_mail_token=:token');
            if($stmt_val->execute(array(
                'token' => $token,
                'user_status' => 1
            ))) {
                // echo 'Mail verify SUCCESS';
                return true;
            } else {
                //echo 'Mail verify FAIL';
                return false;
            }
        }else{
            //echo 'Mail verify FAIL';
            return false;
        }
    }

    public function login($pass)
    {
        if($this->_user_password == $pass) 
        {
            if($this->_user_status==0) {
                return "need_mail_verification";
            } else {
                return "login_success";
            }
        } else {
            return "login_failed";
        }

    }

    public function connect($login, $pass, $session=true) {
        $stmt = $this->_db->prepare('SELECT * FROM users WHERE user_pseudo=:user_pseudo AND user_password=:user_password');
        $stmt->execute(array(
            'user_pseudo' => $login,
            'user_password' => $pass
        ));

        // Méthode sans fetch !!!
        $count = $stmt->rowCount(); // Compter les rows retournés.
        // echo "rowCount : $count\n<br>";
        if($count>0) {
            $results = $stmt->fetch(PDO::FETCH_OBJ);
            // echo 'Login SUCCESS';
            $this->_id_user = $results->id_user;
            $this->_user_pseudo = $results->user_pseudo;
            $this->_user_firstname = $results->user_firstname;
            $this->_user_lastname = $results->user_lastname;
            $this->_user_password = $results->user_password;
            $this->_user_mail = $results->user_mail;
            $this->_user_avatar = $results->user_avatar;
            $this->_user_level = $results->user_level;
            $this->_user_status = $results->user_status;
            if($this->_user_status==0) {
                return "need_mail_verification";
            }
            // echo "Session : user_pseudo : ".$_SESSION['user_pseudo'];
            if($session) {
                session_destroy();
                session_start();
                $_SESSION['id_user'] = $results->id_user;
                $_SESSION['user_pseudo'] = $results->user_pseudo;
                $_SESSION['user_firstname'] = $results->user_firstname;
                $_SESSION['user_lastname'] = $results->user_lastname;
            }
            // header('Location: ' . $_SERVER['HTTP_REFERER']);
            return "success";
        }else{
            // echo 'Login FAIL';
            return "failed";
        }
    }

}

?>