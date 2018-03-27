<?php

/**
 * Created by PhpStorm.
 * User: nico
 * Date: 27.03.2018
 * Time: 10:20
 */
class User extends Person
{
    private $password;

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }


}