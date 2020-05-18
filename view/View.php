<?php

class View
{
    private $_file;
    private $_templateFile;
    private $_data;
    private $_t;

    public function __construct($action, $title)
    {
        $this->_templateFile = 'view/'.$action.'Template.php';
        $this->_data['t'] = $title;
    }
    
    // Assigne des éléments
    public function assign($variable , $value=[])
    {
        $this->_file[$variable] = 'view/view'.ucfirst($variable).'.php';
        // Coeur de la vue pour l'élément
        $this->_data[$variable] = $this->generateFile($this->_file[$variable], array($variable=>$value));
        // var_dump($this->_data);
        // echo "blah";
        // var_dump($this->$value);
        // if($variable=="nav") var_dump($this->_data[$variable]);
    }

    // Génère et affiche la vue
    // public function generate($data)
    public function render()
    {
        // echo "<br>-----------------------<br>VIEW : ".$this->_file;
        // var_dump($data);
        // echo "<br>-----------------------<br>";

        // Coeur de la vue
        // $content = $this->generateFile($this->_file);

        // Template de la vue
        // $view = $this->generateFile($this->_templateFile, array('t' => $this->_t, 'content' => $content));
        $view = $this->generateFile($this->_templateFile, $this->_data);

        echo $view;
        // echo "<br>-----------------------<br>VIEW : ".$view."<br>-----------------------<br>";
    }

    // Génère le fichier de la vue
    // private function generateFile($file, $data)
    private function generateFile($file, $data)
    {
        // $data = $this->_data;
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