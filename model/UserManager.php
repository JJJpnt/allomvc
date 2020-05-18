<?php

class UserManager extends Model
{
    public function getUser()
    {
        $this->getBdd();
        return $this->getAll('users','User');
    }
}

?>