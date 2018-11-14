<?php

namespace App\Repository;


use App\Data\CategoryDTO;
use Database\DatabaseInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    /**
     * @var DatabaseInterface
     */
    private $db;

    /**
     * CategoryRepository constructor.
     * @param DatabaseInterface $db
     */
    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }

    public function findAll(): \Generator
    {
        $query = '
            SELECT id, name 
            FROM categories;
        ';

        return $this->db
            ->query($query)
            ->execute()
            ->fetch(CategoryDTO::class);
    }

    public function findOne(int $id): CategoryDTO
    {
        $query = '
            SELECT id, name 
            FROM categories
            WHERE id = ?;
        ';

        return $this->db
            ->query($query)
            ->execute([$id])
            ->fetch(CategoryDTO::class)
            ->current();
    }
}