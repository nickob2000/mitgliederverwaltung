<?php
/**
 * Created by Nathan Scharnagl.
 * Date: 10.04.18
 */


class ContentService
{
    private static $contentService;
    public $membersattr = array("ID", "Firstname", "Lastname", "E-Mail", "Phone", "Birthdate", "MemberNr");
    public $members = array(
        1 => array(
            "id" => 1,
            "firstname" => "Nathan",
            "lastname" => "Scharnagl",
            "email" => "nathan.scharnagl@gmail.com",
            "phone" => "07878983020",
            "birthdate" => "22.01.2000",
            "memberNr" => "107567823146"
        )
    );
    public $users = array(
        1 => array(
            "id" => 1,
            "firstname" => "Nathan",
            "lastname" => "Scharnagl",
            "email" => "nathan.scharnagl@gmail.com",
            "role" => "Admin",
        ),
        2 => array(
            "id" => 1,
            "firstname" => "Sandro",
            "lastname" => "Werth",
            "email" => "sandro.werth@gmail.com",
            "role" => "Reader",
        ),
        3 => array(
            "id" => 1,
            "firstname" => "Sandro",
            "lastname" => "Werth",
            "email" => "sandro.werth@gmail.com",
            "role" => "Reader",
        ),
        4 => array(
            "id" => 1,
            "firstname" => "Nathan",
            "lastname" => "Scharnagl",
            "email" => "nathan.scharnagl@gmail.com",
            "role" => "Admin",
        ),
        5 => array(
            "id" => 1,
            "firstname" => "Sandro",
            "lastname" => "Werth",
            "email" => "sandro.werth@gmail.com",
            "role" => "Reader",
        ),
        6 => array(
            "id" => 1,
            "firstname" => "Sandro",
            "lastname" => "Werth",
            "email" => "sandro.werth@gmail.com",
            "role" => "Reader",
        )
    );
    public $userrequests = array(
        1 => array(
            "id" => 1,
            "firstname" => "Nathan",
            "lastname" => "Scharnagl",
            "email" => "nathan.scharnagl@gmail.com",
            "role" => "Admin",
        ),
        2 => array(
            "id" => 1,
            "firstname" => "Sandro",
            "lastname" => "Werth",
            "email" => "sandro.werth@gmail.com",
            "role" => "Reader",
        )
    );

    private function __construct()
    {
    }

    public function showContent($template) {
        if ($this->isLoggedIn()){
            switch ($template){
                case 'useradministration':
                    include_once "components/users.php";
                    break;
                case 'memberlist':
                    include "components/members.php";
                    break;
                default:
                    echo "kein template gefunden";

            }
        }else{
            if($template != "register"){
                include_once "components/login.php";
            }else{
                include_once "components/register.php";

            }
        }

    }
    public function logout(){
        $_SESSION['loggedIn'] = false;
        unset($_SESSION['user']);
        header("Location: ?page=login");
    }
    public function isLoggedIn(){
        return $_SESSION["loggedIn"];
    }

    public static function getSerivce(): ContentService
    {
        if (ContentService::$contentService == null) {
            ContentService::$contentService = new ContentService();
        }
        return ContentService::$contentService;
    }

    public function showNavigation(){
        include_once "navigation/navigation.php";
    }
}