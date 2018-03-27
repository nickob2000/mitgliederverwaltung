<?php

/**
 * Created by PhpStorm.
 * User: nico
 * Date: 27.03.2018
 * Time: 10:26
 */
class UserDao
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "membermanagement";
    private $conn;

    public function __construct()
    {

        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }

    }

    /**
     * @return Article[]
     */

    public function selectAll(): array
    {
        $sql = "select p.id as id, u.password as password, p.firstname as firstname, p.lastname as lastname, p.email as email, per.name as permission
from user u
join person p on u.fk_person=p.id
join permission per on per.id = u.fk_permission";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $stmt->bind_result($id, $password, $firstname, $lastname, $email, $permission);
        $users = array();
        while ($stmt->fetch()) {
            $user = new User();
            $user->setId($id);
            $user->setPassword($password);
            $user->setFirstname($firstname);
            $user->setLastname($lastname);
            $user->setEmail($email);
            $user->setPermission($permission);
            $users[] = $user;
        }
        return $users;
    }

}