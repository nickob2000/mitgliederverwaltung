<?php

/**
 * Created by PhpStorm.
 * User: nico
 * Date: 27.03.2018
 * Time: 10:19
 */
class Member extends Person implements \JsonSerializable
{
    private $phone;
    private $memberNr;
    private $birthdate;

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getMemberNr()
    {
        return $this->memberNr;
    }

    /**
     * @param mixed $memberNr
     */
    public function setMemberNr($memberNr)
    {
        $this->memberNr = $memberNr;
    }

    /**
     * @return mixed
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * @param mixed $birthdate
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;
    }

    function jsonSerialize()
    {
        $vars = get_object_vars($this);

        return $vars;
    }
}