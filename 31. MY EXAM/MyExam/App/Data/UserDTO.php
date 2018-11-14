<?php

namespace App\Data;


class UserDTO
{
    private const MAX_FIELD_LENGTH = 255;

    private const USERNAME_MIN_LENGTH = 4;
    private const PASSWORD_MIN_LENGTH = 4;
    private const FULL_NAME_MIN_LENGTH = 5;
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $fullName;

    /**
     * @var string
     */
    private $bornOn;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $errorMessage = 'Username must be between '
            . self::USERNAME_MIN_LENGTH
            . ' and '
            . self::MAX_FIELD_LENGTH
            . ' characters!';

        ValidatorDTO::validate(
            self::USERNAME_MIN_LENGTH,
            self::MAX_FIELD_LENGTH,
            $username,
            $errorMessage
        );

        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $errorMessage = 'Password must be between '
            . self::PASSWORD_MIN_LENGTH
            . ' and '
            . self::MAX_FIELD_LENGTH
            . ' characters!';

        ValidatorDTO::validate(
            self::PASSWORD_MIN_LENGTH,
            self::MAX_FIELD_LENGTH,
            $password,
            $errorMessage
        );

        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getFullName(): string
    {
        return $this->fullName;
    }

    /**
     * @param string $fullName
     */
    public function setFullName(string $fullName): void
    {
        $errorMessage = 'Full name must be between '
            . self::FULL_NAME_MIN_LENGTH
            . ' and '
            . self::MAX_FIELD_LENGTH
            . ' characters!';

        ValidatorDTO::validate(
            self::FULL_NAME_MIN_LENGTH,
            self::MAX_FIELD_LENGTH,
            $fullName,
            $errorMessage
        );

        $this->fullName = $fullName;
    }

    /**
     * @return string
     */
    public function getBornOn(): string
    {
        return $this->bornOn;
    }

    /**
     * @param string $bornOn
     */
    public function setBornOn(string $bornOn): void
    {
        $this->bornOn = $bornOn;
    }
}