<?php
/**
 * Created by Nathan Scharnagl.
 * Date: 10.04.18
 */


class ContentService
{
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
    public function showContent($template) {
        switch ($template){
            case 'login':
                if(!$this->isLoggedIn()) {
                    include_once "components/login.php";
                }else {
                    $this->showContent("memberlist");
                }

                break;
            case 'register':
                include_once "components/register.php";

                break;
            case 'useradministration':
                include_once "components/users.php";

                break;
            case 'memberlist':

                include "components/members.php";
                break;
            default:
                echo "kein template gefunden";

        }
    }
    public function isLoggedIn(){
        return true;
    }
    public function showNavigation(){
        include_once "navigation/navigation.html";
    }
}