<?php

class Human
{
    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    protected $lastName;

    /**
     * Human constructor.
     * @param string $firstName
     * @param string $lastName
     */
    public function __construct(string $firstName, string $lastName)
    {
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @throws Exception
     */
    private function setFirstName(string $firstName): void
    {
        if (!$this->isCorrectName($firstName)) {
            throw new Exception('Expected upper case letter!Argument: firstName');
        }

        if (strlen($firstName) < 4) {
            throw new Exception('Expected length at least 4 symbols!Argument: firstName');
        }

        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @throws Exception
     */
    private function setLastName(string $lastName): void
    {
        if (!$this->isCorrectName($lastName)) {
            throw new Exception('Expected upper case letter!Argument: lastName');
        }

        if (strlen($lastName) < 3) {
            throw new Exception('Expected length at least 3 symbols!Argument: lastName');
        }

        $this->lastName = $lastName;
    }

    /**
     * @param string $name
     * @return bool
     */
    private function isCorrectName(string $name): bool
    {
        $firstLetter = $name[0];
        return $firstLetter === strtoupper($firstLetter);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $output = 'First Name: ' . $this->getFirstName() . PHP_EOL;
        $output .= 'Last Name: ' . $this->getLastName() . PHP_EOL;

        return $output;
    }
}