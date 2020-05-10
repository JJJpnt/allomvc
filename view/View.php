<?php

class View
{
    private $_file;
    private $_t;

    public function __construct($action)
    {
        $this->_file = 'view/view'.$action.'.php';
    }

    // Génère et affiche la vue
    public function generate($data)
    {
        // echo "<br>-----------------------<br>VIEW : ".$this->_file;
        // var_dump($data);
        // echo "<br>-----------------------<br>";

        // Coeur de la vue
        $content = $this->generateFile($this->_file, $data);

        // Template de la vue
        $view = $this->generateFile('view/blogTemplate.php', array('t' => $this->_t, 'content' => $content));

        echo $view;
        // echo "<br>-----------------------<br>VIEW : ".$view."<br>-----------------------<br>";
    }

    // Génère le fichier de la vue
    private function generateFile($file, $data)
    {
        if(file_exists($file))
        {
            // echo "<br> generateFile exists $file <br>";
            extract($data);
            ob_start();
            // echo "ob_start :::::::::::::::::::::::::::::::::::::::::::::::::<br>";
            require($file);
            return ob_get_clean();
        }
        else
        {
            throw new Exception('Fichier '.$file.' introuvable.');
        }
    }

}

?>