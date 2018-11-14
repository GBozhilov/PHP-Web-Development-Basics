<?php

/**
 * Class Pet
 */
class Pet implements Birthday
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var DateTime
     */
    private $birthdate;

    /**
     * Pet constructor.
     * @param array $params
     */
    public function __construct(array $params)
    {
        [$name, $birthdateStr] = $params;
        $birthdate = DateTime::createFromFormat('d/m/Y', $birthdateStr);
        $this->setName($name);
        $this->setBirthdate($birthdate);
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
    private function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getBirthdate(): string
    {
        return $this->birthdate->format('d/m/Y');
    }

    /**
     * @param DateTime $birthdate
     */
    private function setBirthdate(DateTime $birthdate): void
    {
        $this->birthdate = $birthdate;
    }

    /**
     * @return string
     */
    private function getYear(): string
    {
        return $this->birthdate->format('Y');
    }

    /**
     * @param string $year
     * @return bool
     */
    public function checkBirthdayYear(string $year): bool
    {
        return $this->getYear() === $year;
    }
}