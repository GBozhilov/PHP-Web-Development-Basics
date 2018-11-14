<?php

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