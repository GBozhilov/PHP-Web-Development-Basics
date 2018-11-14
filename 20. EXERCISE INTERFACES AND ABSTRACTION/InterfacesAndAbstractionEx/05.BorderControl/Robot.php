<?php

/**
 * Class Robot
 */
class Robot implements Identity
{
    /**
     * @var string
     */
    private $model;

    /**
     * @var string
     */
    private $id;

    /**
     * Robot constructor.
     * @param string $model
     * @param string $id
     */
    public function __construct(string $model, string $id)
    {
        $this->setModel($model);
        $this->setId($id);
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @param string $model
     */
    private function setModel(string $model): void
    {
        $this->model = $model;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    private function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @param string $needle
     * @return bool
     */
    public function hasFakeId(string $needle): bool
    {
        $length = strlen($needle);

        if ($length == 0) {
            return true;
        }

        return substr($this->getId(), -$length) === $needle;
    }
}