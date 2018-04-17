<?php

/**
 * Created by PhpStorm.
 * User: nico
 * Date: 17.04.2018
 * Time: 10:48
 */
class PermissionDao
{
    private $conn;

    public function __construct()
    {
        $this->conn = Connection::getConnection();
    }

    public function selectByName($name): int
    {
        $sql = "select p.id
from permission p
where p.name = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $name);
        $stmt->execute();
        $stmt->bind_result($id);
        $permissions = array();
        while ($stmt->fetch()) {
            $permissions[] = $id;
        }
        return $permissions[0];
    }
}