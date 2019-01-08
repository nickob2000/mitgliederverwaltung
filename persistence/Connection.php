<?php

/**
 * Created by PhpStorm.
 * User: nico
 * Date: 03.04.2018
 * Time: 09:31
 */
class Connection
{
    private static $servername = "localhost";
    private static $username = "webuser";
    private static $password = 'Pa$$w0rd';
    private static $dbname = "membermanagement";
    protected static $conn = null;
    private static $connection;




    private function __construct() {
        //Connect to database
        self::$conn = $this::connection();
    }

    public static function &connection(){

        if(self::$conn==NULL){
            self::$conn = new mysqli(self::$servername, self::$username, self::$password, self::$dbname);
            if (self::$conn->connect_errno) {
                die("Failed to connect to MySQL: (" .
                    self::$conn->connect_errno . ") " .
                    self::$conn->connect_error);
            }
        }
        return self::$conn;
    }

    public static function getConnection()
    {
      if(self::$connection == null){
          self::$connection = new Connection();
      }
      return self::$connection->getConn();
    }

    /**
     * @return mysqli|null
     */
    public static function getConn()
    {
        return self::$conn;
    }



}