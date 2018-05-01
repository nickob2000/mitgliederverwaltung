<?php

/**
 * Created by PhpStorm.
 * User: nico
 * Date: 17.04.2018
 * Time: 10:34
 */
class RequestService
{
    private static $requestService;
    private $requestDao;
    private $userDao;

    private function __construct()
    {
        $this->requestDao = new RequestDao();
        $this->userDao = new UserDao();
    }

    public function getAllRequests(): array
    {
        return $this->requestDao->selectAll();
    }

    public function acceptRequestById($id)
    {
        $this->requestDao->insertFlag($id, 1);

        $request = $this->requestDao->selectOne($id);
        $user = new User();
        $user->setPassword($request->getPassword());
        $user->setFirstname($request->getFirstname());
        $user->setLastname($request->getLastname());
        $user->setEmail($request->getEmail());
        $user->setPermission("read");
        $this->userDao->add($user);
        return true;
    }

    public function declineRequestById($id)
    {
        $this->requestDao->insertFlag($id, 0);
    }


    public static function getSerivce(): RequestService
    {
        if (RequestService::$requestService == null) {
            RequestService::$requestService = new RequestService();
        }
        return RequestService::$requestService;
    }
}