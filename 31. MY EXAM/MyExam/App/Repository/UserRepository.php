<?php

namespace App\Repository;


use App\Data\UserDTO;
use Database\DatabaseInterface;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @var DatabaseInterface
     */
    private $db;

    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }


    public function insert(UserDTO $userDTO): bool
    {
        $query = '
            INSERT INTO users(username, password, full_name, born_on) 
            VALUES (?, ?, ?, ?);
        ';

        $this->db
            ->query($query)
            ->execute([
                $userDTO->getUsername(),
                $userDTO->getPassword(),
                $userDTO->getFullName(),
                $userDTO->getBornOn(),
            ]);

        return true;
    }

    public function findOneByUsername(string $username): ?UserDTO
    {
        $query = '
            SELECT id, username, password, full_name AS fullName, born_on AS bornOn
            FROM users
            WHERE username = ?;
        ';

        return $this->db
            ->query($query)
            ->execute([$username])
            ->fetch(UserDTO::class)
            ->current();
    }

    public function findOneById(int $id): ?UserDTO
    {
        $query = '
            SELECT id, username, password, full_name AS fullName, born_on AS bornOn
            FROM users
            WHERE id = ?;
        ';

        return $this->db
            ->query($query)
            ->execute([$id])
            ->fetch(UserDTO::class)
            ->current();
    }

    public function update(int $id, UserDTO $userDTO): bool
    {
        $query = '
            UPDATE users
            SET 
                username = ?, 
                password = ?, 
                full_name = ?, 
                born_on = ?
            WHERE id = ?;
        ';

        $this->db
            ->query($query)
            ->execute([
                $userDTO->getUsername(),
                $userDTO->getPassword(),
                $userDTO->getFullName(),
                $userDTO->getBornOn(),
                $id
            ]);

        return true;
    }

    /**
     * @return \Generator|UserDTO[]
     */
    public function findAll(): \Generator
    {
        $query = '
        SELECT id, username, password, full_name AS fullName, born_on AS bornOn
        FROM users;
        ';

        return $this->db
            ->query($query)
            ->execute([])
            ->fetch(UserDTO::class);
    }
}