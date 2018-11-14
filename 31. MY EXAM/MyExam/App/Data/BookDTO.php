<?php

namespace App\Data;


class BookDTO
{
    private const TITLE_MIN_LENGTH = 3;
    private const TITLE_MAX_LENGTH = 50;

    private const AUTHOR_MIN_LENGTH = 3;
    private const AUTHOR_MAX_LENGTH = 50;

    private const DESCRIPTION_MIN_LENGTH = 10;
    private const DESCRIPTION_MAX_LENGTH = 10000;

    private const IMAGE_MIN_LENGTH = 3;
    private const IMAGE_MAX_LENGTH = 1000;

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $author;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $image;

    /**
     * @var GenreDTO
     */
    private $genre;

    /**
     * @var UserDTO
     */
    private $user;

    /**
     * @var string
     */
    private $addedOn;

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
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $errorMessage = 'Title must be between '
            . self::TITLE_MIN_LENGTH
            . ' and '
            . self::TITLE_MAX_LENGTH
            . ' characters!';

        ValidatorDTO::validate(
            self::TITLE_MIN_LENGTH,
            self::TITLE_MAX_LENGTH,
            $title,
            $errorMessage
        );

        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @param string $author
     */
    public function setAuthor(string $author): void
    {
        $errorMessage = 'Author name must be between '
            . self::AUTHOR_MIN_LENGTH
            . ' and '
            . self::AUTHOR_MAX_LENGTH
            . ' characters!';

        ValidatorDTO::validate(
            self::AUTHOR_MIN_LENGTH,
            self::AUTHOR_MAX_LENGTH,
            $author,
            $errorMessage
        );

        $this->author = $author;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $errorMessage = 'Description must be between '
            . self::DESCRIPTION_MIN_LENGTH
            . ' and '
            . self::DESCRIPTION_MAX_LENGTH
            . ' characters!';

        ValidatorDTO::validate(
            self::DESCRIPTION_MIN_LENGTH,
            self::DESCRIPTION_MAX_LENGTH,
            $description,
            $errorMessage
        );

        $this->description = $description;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image): void
    {
//        $errorMessage = 'Image url must be between '
//            . self::IMAGE_MIN_LENGTH
//            . ' and '
//            . self::IMAGE_MAX_LENGTH
//            . ' characters!';
//
//        ValidatorDTO::validate(
//            self::IMAGE_MIN_LENGTH,
//            self::IMAGE_MAX_LENGTH,
//            $image,
//            $errorMessage
//        );

        $this->image = $image;
    }

    /**
     * @return GenreDTO
     */
    public function getGenre(): GenreDTO
    {
        return $this->genre;
    }

    /**
     * @param GenreDTO $genre
     */
    public function setGenre(GenreDTO $genre): void
    {
        $this->genre = $genre;
    }

    /**
     * @return UserDTO
     */
    public function getUser(): UserDTO
    {
        return $this->user;
    }

    /**
     * @param UserDTO $user
     */
    public function setUser(UserDTO $user): void
    {
        $this->user = $user;
    }

    public function getAddedOn()
    {
        return $this->addedOn;
    }

    /**
     * @param string $addedOn
     */
    public function setAddedOn(string $addedOn): void
    {
        $this->addedOn = $addedOn;
    }
}