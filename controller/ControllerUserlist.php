<?php
require_once('view/View.php');

class ControllerUserlist
{
    private $_userManager;
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
            $this->user();
        }
    }

    private function user()
    {
        $this->_userManager = new UserManager;
        // $users = $this->_userManager->loginUser("jjj", "jjj");
        $users = $this->_userManager->getConnectedUser();
        

        $this->_view = new View('UserList', 'Liste utilisateurs');
        // $this->_view->assign('nav');
        $this->_view->assign('users', $users);
        $this->_view->render();
    }

}

?>