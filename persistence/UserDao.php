<?php

/**
 * Created by PhpStorm.
 * User: nico
 * Date: 27.03.2018
 * Time: 10:26
 */
class UserDao
{
    private $conn ;
    private $permissionDao;
    public function __construct()
    {

        $this->conn = Connection::getConnection();
        $this->permissionDao = new PermissionDao();
    }

    /**
     * @return User[]
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
    public function selectOne($email)
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

    public function add(User $user){
        $lastname = $user->getLastname();
        $password = $user->getPassword();
        $email = $user->getEmail();
        $firstname = $user->getFirstname();
        $permission = $user->getPermission();

        $sql = "insert into person(firstname, lastname, email) values (?, ?, ?) ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sss", $firstname, $lastname, $email);
        $stmt->execute();

        $personId = $this->selectOne($email);
        $permissionId = $this->permissionDao->selectByName($permission);

        $sql = "insert into user(fk_person, password, fk_permission) values (, $password, ?) ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("isi", $personId, $password, $permissionId);
        $stmt->execute();
    }

}