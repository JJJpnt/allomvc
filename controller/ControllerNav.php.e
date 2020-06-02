<?php

require_once('view/View.php');

class ControllerNav
{
    private $_userManager;
    private $_user;

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
            $this->nav();
        }
    }

    private function nav()
    {
        // $this->_userManager = new UserManager;
        // $user = $this->_userManager->getUser();

        $this->_view = new View('Nav');
        $this->_view->assign('nav');
        $this->_view->render();
    }

}

?>