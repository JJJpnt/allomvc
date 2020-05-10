<?php
require_once('view/View.php');

class ControllerHome
{
    private $_postManager;
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
            $this->posts();            
        }
    }

    private function posts()
    {
        $this->_postManager = new PostManager;
        $posts = $this->_postManager->getPost();

        $this->_view = new View('Home');
        $this->_view->generate(array('posts'=>$posts));
    }

}

?>