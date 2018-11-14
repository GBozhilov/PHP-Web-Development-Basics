<?php

class Person
{
    private $name;
    private $age;

    /**
     * Person constructor.
     * @param $name
     * @param $age
     */
    public function __construct(string $name, int $age)
    {
        $this->setName($name);
        $this->setAge($age);
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
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    public function setAge(int $age)
    {
        $this->age = $age;
    }

    public function __toString()
    {
        return $this->getName() . ' ' . $this->getAge();
    }
}

class Family
{
    private $people;

    /**
     * Family constructor.
     */
    public function __construct()
    {
        $this->people = [];
    }

    /**
     * @return array
     */
    public function getPeople(): array
    {
        return $this->people;
    }

    /**
     * @param array $people
     */
    public function setPeople(array $people)
    {
        $this->people = $people;
    }

    public function addMember(Person $person)
    {
        $members = $this->getPeople();
        $members[] = $person;
        $this->setPeople($members);
    }

    public function getOldestMember()
    {
        $members = $this->getPeople();
        usort($members, function (Person $m1, Person $m2) {
            return $m2->getAge() - $m1->getAge();
        });

        return $members ? $members[0] : 'No members';
    }
}

$n = (int)readline();

$family = new Family();

for ($i = 0; $i < $n; $i++) {
    $personParams = explode(' ', readline());
    $name = $personParams[0];
    $age = (int)$personParams[1];
    $person = new Person($name, $age);
    $family->addMember($person);
}

echo $family->getOldestMember();