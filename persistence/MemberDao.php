<?php

/**
 * Created by PhpStorm.
 * User: nico
 * Date: 17.04.2018
 * Time: 10:19
 */
class MemberDao
{
    private $conn;

    public function __construct()
    {

        $this->conn = Connection::getConnection();

    }

    public function selectAll(): array
    {
        $sql = "select p.id as id, p.firstname as firstname, p.lastname as lastname, p.email as email, m.birthdate as birthdate, m.memberNr as memberNr, m.phone as phone
from member m
join person p on m.fk_person=p.id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $stmt->bind_result($id, $firstname, $lastname, $email, $birthdate, $memberNr, $phone);
        $members = array();
        while ($stmt->fetch()) {
            $member = new Member();
            $member->setFirstname($firstname);
            $member->setLastname($lastname);
            $member->setEmail($email);
            $member->setId($id);
            $member->setMemberNr($memberNr);
            $member->setPhone($phone);
            $member->setBirthdate(date("d.m.Y", $birthdate));
            $members[] = $member;
        }
        return $members;
    }


}