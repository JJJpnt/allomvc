<?php

class FilmManager extends Model
{
    public function getFilm()
    {
        $this->getBdd();
        return $this->getAll('films','Film');
    }
}

?>