<?php

// id_film  film_title  film_date   film_length film_note   film_synopsis   film_poster

class Film
{
    private $_id_film;
    private $_film_title;
    private $_film_date;
    private $_film_length;
    private $_film_note;
    private $_film_synopsis;
    private $_film_poster;

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

    public function getId_film()
    {
            return $this->_id_film;
    }
    public function getFilm_title()
    {
            return $this->_film_title;
    }
    public function getFilm_date()
    {
            return $this->_film_date;
    }
    public function getFilm_length()
    {
            return $this->_film_length;
    }
    public function getFilm_note()
    {
            return $this->_film_note;
    }
    public function getFilm_synopsis()
    {
            return $this->_film_synopsis;
    }
    public function getFilm_poster()
    {
            return $this->_film_poster;
    }

    // Setters

    public function setId_film($t)
    {   
        // echo '<br>\n '.$t.' !!!';
        if(is_string($t))
            $this->_id_film = $t;
    }
    public function setFilm_title($t)
    {   
        // echo '<br>\n '.$t.' !!!';
        if(is_string($t))
            $this->_film_title = $t;
    }
    public function setFilm_date($t)
    {   
        // echo '<br>\n '.$t.' !!!';
        if(is_string($t))
            $this->_film_date = $t;
    }
    public function setFilm_length($t)
    {   
        // echo '<br>\n '.$t.' !!!';
        if(is_string($t))
            $this->_film_length = $t;
    }
    public function setFilm_note($t)
    {   
        // echo '<br>\n '.$t.' !!!';
        if(is_string($t))
            $this->_film_note = $t;
    }
    public function setFilm_synopsis($t)
    {   
        // echo '<br>\n '.$t.' !!!';
        if(is_string($t))
            $this->_film_synopsis = $t;
    }
    public function setFilm_poster($t)
    {   
        // echo '<br>\n '.$t.' !!!';
        if(is_string($t))
            $this->_film_poster = $t;
    }

}