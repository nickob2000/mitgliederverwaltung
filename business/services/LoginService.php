<?php


/**
 * Created by PhpStorm.
 * User: nico
 * Date: 27.03.2018
 * Time: 11:05
 */
class LoginService
{
    private $userDao;
    private $requestDao;
    private static $loginService;

    private function __construct()
    {
        $this->requestDao = new RequestDao();
        $this->userDao = new UserDao();
    }

    function checkUserCredentials($email, $password)
    {
        $user =  $this->userDao->selectOne($email);
        if ($user != null){
            if ($user->getPassword() === $password){
                return $user;
            }
        }
        return false;
    }

    function userRequest($email, $firstname, $lastname, $password){
        $request = new Request();
        $request->setEmail($email);
        $request->setLastname($lastname);
        $request->setFirstname($firstname);
        $request->setPassword($password);
        $request->setAccepted(null);
        $this->requestDao->add($request);
        return true;
    }

    public static function getSerivce(): LoginService
    {
        if (LoginService::$loginService == null) {
            LoginService::$loginService = new LoginService();
        }
        return LoginService::$loginService;
    }
}