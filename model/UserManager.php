<?php

require_once("Model.php");

class UserManager extends Model
{

    private $_connectedUser;

    public function __construct()
    {
        // echo "<h1 style='color:yellow'>CONTRUCT</h1>";
        session_start();
        if( isset($_SESSION['id_user']) )
        {
            // echo "<h1 style='color:yellow'>Session : ".$_SESSION['user_pseudo']."</h1>";
            $this->_connectedUser = $this->getUser($_SESSION['user_pseudo']);
        }
    }

    public function getConnectedUser()
    {
        if(isset($this->_connectedUser))
        {
            return $this->_connectedUser;
        } else {
            return NULL;
        }
            
    }

    public function getAllUsers()
    {
        $this->getBdd();
        return $this->getAll('users','User');
    }
    
    public function getUser($pseudo)
    {
        $this->getBdd();
        $user = $this->getSome('users','User','user_pseudo',$pseudo);
        if(count($user)!=0) return $user[0];
    }

    public function loginUser($pseudo, $pass)
    {
        // echo "<h1 style='color:green'>".(isset($this->_connectedUser)?"Utilisateur connecté":"Utilisateur non connecté")."</h1>";
        
        $user = $this->getUser($pseudo);
        // var_dump($user);
        if(count($user) != 1)
        {
            echo "<h1>Utilisateur inconnu</h1>";
        } else {
            $login_attempt = $user[0]->login($pass);
            echo "<h1 style='color:red'>$pseudo : $pass : $login_attempt</h1>";
            if($login_attempt=="login_success")
            {
                $this->_connectedUser = $user[0];
                var_dump($this->_connectedUser);
                session_destroy();
                session_start();
                $_SESSION['id_user']        =   $this->_connectedUser->getId_user();
                $_SESSION['user_pseudo']    =   $this->_connectedUser->getUser_pseudo();
                $_SESSION['user_firstname'] =   $this->_connectedUser->getUser_firstname();
                $_SESSION['user_lastname']  =   $this->_connectedUser->getUser_lastname();
                echo "<h1 style='color: blue'>Login Success</h1>";
                echo "<h1 style='color:yellow'>Session : id ".$_SESSION['id_user']."</h1>";
                echo "<h1 style='color:yellow'>Session : pseudo ".$_SESSION['user_pseudo']."</h1>";
                return $this->_connectedUser;
            }
            else if ($login_attempt=="need_mail_verification")
            {
                echo "<h1>Need mail verification</h1>";
            }
            else
            {
                echo "<h1>Login failed : $login_attempt</h1>";
            }
        }
    }

}

?>