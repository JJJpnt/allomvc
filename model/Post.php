<?php

class Post 
{
    private $_id_article;
    private $_article_category;
    private $_article_content_title;
    private $_article_text;
    private $_article_content_img;
    private $_article_content_date;
    private $_article_date;
    private $_article_title;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data)
    {
        foreach($data as $key => $value)
        {
            $method = 'set'.ucfirst($key);
            if(method_exists($this, $method))
                $this->$method($value);
        }
    }

    public function getId_article()
    {
            return $this->_article_title;
    }
    public function getArticle_title()
    {
            return $this->_article_title;
    }
    public function getArticle_text()
    {
            return $this->_article_text;
    }
    public function getArticle_date()
    {
            return $this->_article_date;
    }





    // Setters

    public function setId_article($t)
    {   
        // echo '<br>\n '.$t.' !!!';
        if(is_string($t))
            $this->_id_article = $t;
    }
    public function setArticle_title($t)
    {   
        // echo '<br>\n '.$t.' !!!';
        if(is_string($t))
            $this->_article_title = $t;
    }
    public function setArticle_text($t)
    {
        // echo '<br>\n '.$t.' !!!';
        if(is_string($t))
            $this->_article_text = $t;
    }
    public function setArticle_date($t)
    {
        // echo '<br>\n '.$t.' !!!';
        if(is_string($t))
            $this->_article_date = $t;
    }

}