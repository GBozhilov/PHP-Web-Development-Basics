<?php

class Pokemon
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $element;

    /**
     * @var float
     */
    private $health;

    /**
     * Pokemon constructor.
     * @param $name
     * @param $element
     * @param $health
     */
    public function __construct(string $name, string $element, float $health)
    {
        $this->name = $name;
        $this->element = $element;
        $this->health = $health;
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
     * @return string
     */
    public function getElement(): string
    {
        return $this->element;
    }

    /**
     * @param string $element
     */
    public function setElement(string $element)
    {
        $this->element = $element;
    }

    /**
     * @return float
     */
    public function getHealth(): float
    {
        return $this->health;
    }

    /**
     * @param float $health
     */
    public function setHealth(float $health)
    {
        $this->health = $health;
    }
}

class Trainer
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $badges;

    /**
     * @var Pokemon[]
     */
    private $pokemons;

    /**
     * Trainer constructor.
     * @param $name
     */
    public function __construct(string $name)
    {
        $this->setName($name);
        $this->setBadges(0);
        $this->pokemons = [];
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
    public function getBadges(): int
    {
        return $this->badges;
    }

    /**
     * @param int $badges
     */
    public function setBadges(int $badges)
    {
        $this->badges = $badges;
    }

    /**
     * @return array
     */
    public function getPokemons(): array
    {
        return $this->pokemons;
    }

    /**
     * @param array $pokemons
     */
    public function setPokemons(array $pokemons)
    {
        $this->pokemons = $pokemons;
    }

    public function addPokemon(Pokemon $pokemon)
    {
        $this->pokemons[] = $pokemon;
    }

    public function increaseBadges()
    {
        $this->setBadges($this->getBadges() + 1);
    }
}

$trainers = [];

while ('Tournament' != $command = readline()) {
    $tokens = explode(' ', $command);
    $trainerName = $tokens[0];
    $pokemonName = $tokens[1];
    $element = $tokens[2];
    $health = (float)$tokens[3];
    $newPokemon = new Pokemon($pokemonName, $element, $health);

    if (!array_key_exists($trainerName, $trainers)) {
        $trainers[$trainerName] = new Trainer($trainerName);
    }

    $trainers[$trainerName]->addPokemon($newPokemon);
}

while ('End' != $searchedElement = readline()) {
    foreach ($trainers as $name => $trainer) {
        $pokemons = $trainer->getPokemons();
        $searchedPokemons = array_filter($pokemons, function (Pokemon $p) use ($searchedElement) {
            return $p->getElement() === $searchedElement;
        });

        if (count($searchedPokemons) > 0) {
            $trainer->increaseBadges();
        } else {
            foreach ($trainer->getPokemons() as $pokemon) {
                $pokemon->setHealth($pokemon->getHealth() - 10);
            }
        }
    }
}

usort($trainers, function (Trainer $t1, Trainer $t2) {
    return $t2->getBadges() - $t1->getBadges();
});

foreach ($trainers as $trainer) {
    $pokemons = $trainer->getPokemons();
    $alivePokemons = array_filter($pokemons, function (Pokemon $p) {
        return $p->getHealth() > 0;
    });
    $trainer->setPokemons($alivePokemons);
    $count = count($alivePokemons);
    echo $trainer->getName() . ' ' . $trainer->getBadges() . ' ' . $count . PHP_EOL;
}