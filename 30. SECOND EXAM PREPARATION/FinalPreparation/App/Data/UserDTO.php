<?php

namespace App\Data;


class UserDTO
{
    private const MAX_FIELD_LENGTH = 255;

    private const USERNAME_MIN_LENGTH = 3;
    private const PASSWORD_MIN_LENGTH = 6;
    private const FIRST_NAME_MIN_LENGTH = 3;
    private const LAST_NAME_MIN_LENGTH = 3;

    private $id;

    private $username;

    private $password;

    private $firstName;

    private $lastName;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): UserDTO
    {
        $this->id = $id;
        return $this;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username): UserDTO
    {
        ValidatorDTO::validate(
            self::USERNAME_MIN_LENGTH,
            self::MAX_FIELD_LENGTH,
            $username,
            'Username is out of range'
        );

        $this->username = $username;
        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password): UserDTO
    {
        ValidatorDTO::validate(
            self::PASSWORD_MIN_LENGTH,
            self::MAX_FIELD_LENGTH,
            $password,
            'Password is out of range'
        );

        $this->password = $password;
        return $this;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName): UserDTO
    {
        ValidatorDTO::validate(
            self::FIRST_NAME_MIN_LENGTH,
            self::MAX_FIELD_LENGTH,
            $firstName,
            'First name is out of range'
        );

        $this->firstName = $firstName;
        return $this;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName): UserDTO
    {
        ValidatorDTO::validate(
            self::LAST_NAME_MIN_LENGTH,
            self::MAX_FIELD_LENGTH,
            $lastName,
            'Last name is out of range'
        );

        $this->lastName = $lastName;
        return $this;
    }
}