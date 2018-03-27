<?php
include "../../persistence/UserDao.php";

/**
 * Created by PhpStorm.
 * User: nico
 * Date: 27.03.2018
 * Time: 11:05
 */
class LoginService
{
    private $userDao;

    function __construct()
    {
        $this->userDao = new UserDao();
    }

    function checkUserCredentials($username, $password){
        return $this->userDao->selectAll();

    }
}