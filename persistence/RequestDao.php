<?php

/**
 * Created by PhpStorm.
 * User: nico
 * Date: 03.04.2018
 * Time: 09:30
 */
class RequestDao
{

    private $conn ;

    public function __construct()
    {

        $this->conn = Connection::getConnection();

    }

    public function add(Request $request){
        $firstname = $request->getFirstname();
        $email = $request->getEmail();
        $password = $request->getPassword();
        $lastname = $request->getLastname();

        $sql = "insert into request(firstname, email, password, lastname) values (?, ?, ?, ?) ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssss", $firstname, $email, $password, $lastname);
        $stmt->execute();
    }

    public function selectAll(): array
    {
        $sql = "select r.email as email, r.id as id, r.firstname as firstname, r.lastname as lastname, r.password as password, r.accepted as accepted
from request r";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $stmt->bind_result($email, $id, $firstname, $lastname, $password, $accepted);
        $requests = array();
        while ($stmt->fetch()) {
            $request = new Request();
            $request->setId($id);
            $request->setEmail($email);
            $request->setLastname($lastname);
            $request->setFirstname($firstname);
            $request->setAccepted($accepted);
            $request->setPassword($password);

            $requests[] = $request;
        }
        return $requests;
    }

    public function selectOne($id): Request
    {
        $sql = "select r.email as email, r.id as id, r.firstname as firstname, r.lastname as lastname, r.password as password, r.accepted as accepted
from request r
where r.id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result($email, $id, $firstname, $lastname, $password, $accepted);
        $requests = array();
        while ($stmt->fetch()) {
            $request = new Request();
            $request->setEmail($email);
            $request->setLastname($lastname);
            $request->setFirstname($firstname);
            $request->setAccepted($accepted);
            $request->setPassword($password);
            $requests[] = $request;
        }
        return $requests[0];
    }

    public function insertFlag($id, $flag){

        $sql = "update request set accepted=? where id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $flag, $id);
        $stmt->execute();
    }
}