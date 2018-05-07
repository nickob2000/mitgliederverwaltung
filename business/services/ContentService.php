<?php
/**
 * Created by Nathan Scharnagl.
 * Date: 10.04.18
 */


class ContentService
{
    private static $contentService;
    public $membersattr = array("ID", "Firstname", "Lastname", "E-Mail", "Phone", "Birthdate", "MemberNr");











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

                    if ($this->isAdmin()){
                        include_once "components/users.php";
                    }else{
                        header("Location: ?page=memberlist");
                    }
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

    public function isAdmin(){
        if ($_SESSION["loggedIn"]){
            $user = unserialize($_SESSION["user"]);
            if ($user->getPermission()=="admin"){
                return true;
            }
            return false;
        }
        return false;
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