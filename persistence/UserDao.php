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
    private $conn ;

    public function __construct()
    {

        $this->conn = Connection::getConnection();

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

    /**
     * @param $email
     * @return User
     */
    public function selectOne($email): User
    {
        $sql = "select p.id as id, u.password as password, p.firstname as firstname, p.lastname as lastname, p.email as email, per.name as permission
from user u
join person p on u.fk_person=p.id
join permission per on per.id = u.fk_permission
where p.email=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $email);
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
        if (empty($users)) {
            return null;
        }
        return array_values($users)[0];
    }

}