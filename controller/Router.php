<?php

class Router {

    private $_ctrl;
    private $_view;

    public function routerRequire()
    {
        try
        {
            spl_autoload_register(function($class){
                // echo("class : ".$class."\n");
                require_once('model/'.$class.'.php');
            });
            
            $url = '';
            
            if(isset($_GET['url']))
            {
                $url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));
                // echo("url : ".$url[0]."\n");
                
                $controller = ucfirst(strtolower($url[0]));
                $controllerClass = "Controller".$controller;
                $controllerFile = "controller/".$controllerClass.".php";
                // echo("controllerFile : ".$controllerFile."\n");

                if(file_exists($controllerFile))
                {
                    // echo "exists\n<br>";
                    require_once($controllerFile);
                    $this->_ctrl = new $controllerClass($url);
                }
                else
                {
                    // echo "EEEEEEXCEPTION route";
                    throw new Exception('Page introuvable ('.$controllerFile.')');
                }                
            }
            else
            {
                require_once('controller/ControllerHome.php');
                $this->_ctrl = new ControllerHome($url);
            }
        }
        catch(Exception $e)
        {
            $errorMsg = $e->getMessage();
            require_once('view/viewError.php');
        }
    }






}