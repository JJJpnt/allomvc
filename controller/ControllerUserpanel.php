<?php
require_once('view/View.php');

class ControllerUserpanel
{
    private $_filmManager;
    private $_userManager;
    private $_navManager;
    private $_view;


    public function __construct($url)
    {
        if(isset($url) && count($url)>1)
        {
            // echo "exeption dans controllerhome";
            throw new Exception('Page introuvable');
        }
        else
        {
            // echo "loading posts<br>";
            $this->film();
        }
    }

    private function film()
    {
        $this->_userManager = new UserManager;
        // $users = $this->_userManager->loginUser("jjj", "jjj");
        $user = $this->_userManager->getConnectedUser();

        // $this->_navManager = new NavManager;
        // $nav = $this->_navManager->setUser($user);

        $this->_filmManager = new FilmManager;
        $films = $this->_filmManager->getFilm();

        $this->_view = new View('UserPanel', 'Panneau Utilisateur');
        $this->_view->assign('nav', $user);
        $this->_view->assign('films', $films);
        $this->_view->render();
    }

}

?>