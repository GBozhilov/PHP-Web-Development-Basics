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

class GoldenEditionBook extends Book
{
    private const PRICE_FACTOR = 1.3;

    /**
     * Book constructor.
     * @param string $title
     * @param string $author
     * @param float $price
     */
    public function __construct(string $title, string $author, float $price)
    {
        parent::__construct($title, $author, self::PRICE_FACTOR * $price);
    }
}

$author = readline();
$title = readline();
$price = (float)readline();
$type = readline();

if ($type === 'STANDARD') {
    $book = new Book($author, $title, $price);
} elseif ($type === 'GOLD') {
    $book = new GoldenEditionBook($author, $title, $price);
} else {
    exit('Type is not valid!');
}

echo $book;