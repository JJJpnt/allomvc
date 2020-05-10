<?php

class ArtistManager extends Model
{
    public function getArtist()
    {
        $this->getBdd();
        return $this->getAll('artists','Artist');
    }
}

?>