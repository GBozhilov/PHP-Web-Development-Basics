<?php

/**
 * Class Book
 */
class Book
{
    /**
     * @var string
     */
    private $author;

    /**
     * @var string
     */
    private $title;

    /**
     * @var float
     */
    private $price;

    /**
     * Book constructor.
     * @param string $title
     * @param string $author
     * @param float $price
     */
    public function __construct(string $author, string $title, float $price)
    {
        $this->setAuthor($author);
        $this->setTitle($title);
        $this->setPrice($price);
    }

    /**
     * @param string $author
     */
    private function setAuthor(string $author): void
    {
        [$firstName, $lastName] = explode(' ', $author);

        if ($lastName && is_numeric($lastName[0])) {
            exit('Author not valid!');
        }

        $this->author = $author;
    }

    /**
     * @param string $title
     */
    private function setTitle(string $title): void
    {
        if (strlen($title) < 3) {
            exit('Title not valid!');
        }

        $this->title = $title;
    }

    /**
     * @param float $price
     */
    private function setPrice(float $price): void
    {
        if ($price <= 0) {
            exit('Price not valid!');
        }

        $this->price = $price;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return 'OK' . PHP_EOL . $this->price;
    }
}