<?php

namespace App\Data;


class GenreDTO
{
    private const NAME_MIN_LENGTH = 3;
    private const NAME_MAX_LENGTH = 50;

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $errorMessage = 'Genre name must be between '
            . self::NAME_MIN_LENGTH
            . ' and '
            . self::NAME_MAX_LENGTH
            . ' characters!';

        ValidatorDTO::validate(
            self::NAME_MIN_LENGTH,
            self::NAME_MAX_LENGTH,
            $name,
            $errorMessage
        );

        $this->name = $name;
    }
}