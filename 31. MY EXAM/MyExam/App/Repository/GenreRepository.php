<?php

namespace App\Repository;


use App\Data\GenreDTO;
use Database\DatabaseInterface;

class GenreRepository implements GenreRepositoryInterface
{
    /**
     * @var DatabaseInterface
     */
    private $db;

    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }

    public function findAll(): \Generator
    {
        $query = '
            SELECT id, name 
            FROM genres;
        ';

        return $this->db
            ->query($query)
            ->execute()
            ->fetch(GenreDTO::class);
    }

    public function findOne(int $id): GenreDTO
    {
        $query = '
            SELECT id, name 
            FROM genres
            WHERE id = ?;
        ';

        return $this->db
            ->query($query)
            ->execute([$id])
            ->fetch(GenreDTO::class)
            ->current();
    }
}