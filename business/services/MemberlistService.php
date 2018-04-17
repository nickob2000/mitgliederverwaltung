<?php

/**
 * Created by PhpStorm.
 * User: nico
 * Date: 17.04.2018
 * Time: 10:25
 */
class MemberlistService
{
    private static $memberlistService;
    private $memberDao;


    private function __construct()
    {
        $this->memberDao = new MemberDao();
    }

    public function getAllMembers(): array {
        return $this->memberDao->selectAll();
    }


    public static function getSerivce(): MemberlistService
    {
        if (MemberlistService::$memberlistService == null) {
            MemberlistService::$memberlistService = new MemberlistService();
        }
        return MemberlistService::$memberlistService;
    }

}