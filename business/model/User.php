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
    private $permission;

    /**
     * @return mixed
     */
    public function getPermission()
    {
        return $this->permission;
    }

    /**
     * @param mixed $permission
     */
    public function setPermission($permission)
    {
        $this->permission = $permission;
    }


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