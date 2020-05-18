<?php
require_once('view/View.php');

class ControllerUserpanel
{
    private $_filmManager;
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
        $this->_userManager = new FilmManager;
        $films = $this->_userManager->getFilm();

        $this->_view = new View('UserPanel', 'Panneau Utilisateur');
        $this->_view->assign('nav');
        $this->_view->assign('films', $films);
        $this->_view->render();
    }

}

?>