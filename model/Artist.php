<?php

// id_artist	artist_name	artist_photo	artist_birth	artist_country

class Artist 
{
    private $_id_artist;
    private $_artist_name;
    private $_artist_photo;
    private $_artist_birth;
    private $_artist_photo;

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

    public function getId_artist()
    {
            return $this->_id_artist;
    }
    public function getArtist_name()
    {
            return $this->_artist_name;
    }
    public function getArtist_birth()
    {
            return $this->_artist_birth;
    }
    public function getArtist_photo()
    {
            return $this->_artist_photo;
    }

    // Setters

    public function setId_artist($t)
    {   
        // echo '<br>\n '.$t.' !!!';
        if(is_string($t))
            $this->_id_artist = $t;
    }
    public function setArtist_name($t)
    {   
        // echo '<br>\n '.$t.' !!!';
        if(is_string($t))
            $this->_artist_name = $t;
    }
    public function setArtist_birth($t)
    {
        // echo '<br>\n '.$t.' !!!';
        if(is_string($t))
            $this->_artist_birth = $t;
    }
    public function setArtist_photo($t)
    {
        // echo '<br>\n '.$t.' !!!';
        if(is_string($t))
            $this->_artist_photo = $t;
    }

}