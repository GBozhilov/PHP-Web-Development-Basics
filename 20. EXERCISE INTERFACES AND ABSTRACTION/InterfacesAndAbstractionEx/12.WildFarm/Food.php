<?php

abstract class Food
{
    /**
     * @var int
     */
    private $quantity;

    /**
     * Food constructor.
     * @param int $quantity
     */
    public function __construct($quantity)
    {
        $this->setQuantity($quantity);
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    private function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }
}