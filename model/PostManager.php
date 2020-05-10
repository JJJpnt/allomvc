<?php

class PostManager extends Model
{
    public function getPost()
    {
        $this->getBdd();
        return $this->getAll('t_article','Post');
    }
}

?>