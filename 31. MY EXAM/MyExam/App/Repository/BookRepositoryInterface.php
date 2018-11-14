<?php

namespace App\Repository;


use App\Data\BookDTO;

interface BookRepositoryInterface
{
    /**
     * @return \Generator|BookDTO[]
     */
    public function findAll(): \Generator;

    /**
     * @param int $id
     * @return \Generator
     */
    public function findMyBooks(int $id): \Generator;

    public function findOne(int $id): BookDTO;

    public function insert(BookDTO $bookDTO): bool;

    public function update(BookDTO $bookDTO, int $id): bool;

    public function remove(int $id): bool;
}