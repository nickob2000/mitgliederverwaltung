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
            echo "<br><pre>";
            print_r($user);
            echo "</pre>";
            echo $password;
            if (password_verify($password, $user->getPassword())){

                print_r($user);
                return $user;
            }else {
                return false;
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