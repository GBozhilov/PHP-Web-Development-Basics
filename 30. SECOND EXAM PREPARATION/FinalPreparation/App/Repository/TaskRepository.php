<?php

namespace App\Repository;


use App\Data\CategoryDTO;
use App\Data\TaskDTO;
use App\Data\UserDTO;
use Core\DataBinderInterface;
use Database\DatabaseInterface;

class TaskRepository implements TaskRepositoryInterface
{
    /**
     * @var DatabaseInterface
     */
    private $db;

    /**
     * @var DataBinderInterface
     */
    private $dataBinder;

    public function __construct(DatabaseInterface $db, DataBinderInterface $dataBinder)
    {
        $this->db = $db;
        $this->dataBinder = $dataBinder;
    }

    /**
     * @return \Generator|TaskDTO[]
     */
    public function findAll(): \Generator
    {
        $query = '
            SELECT 
              tasks.id AS task_id, 
              title, 
              description, 
              location,
              users.id AS author_id,
              users.username,
              users.password,
              users.first_name,
              users.last_name,
              categories.id AS category_id,
              categories.name,
              started_on, 
              due_date
            FROM tasks
            INNER JOIN users users ON tasks.user_id = users.id
            INNER JOIN categories categories ON tasks.category_id = categories.id
            ORDER BY tasks.due_date DESC, tasks.id ASC
        ';

        $lazyTaskResult = $this->db
            ->query($query)
            ->execute()
            ->fetch();

        foreach ($lazyTaskResult as $row) {
            /** @var TaskDTO $task */
            $task = $this->dataBinder->bind($row, TaskDTO::class);
            /** @var UserDTO $author */
            $author = $this->dataBinder->bind($row, UserDTO::class);
            /** @var CategoryDTO $category */
            $category = $this->dataBinder->bind($row, CategoryDTO::class);

            $task->setId($row['task_id']);
            $author->setId($row['author_id']);
            $category->setId($row['category_id']);

            $task->setAuthor($author);
            $task->setCategory($category);

            yield $task;
        }
    }

    public function findOne(int $id): TaskDTO
    {
        $query = '
            SELECT 
              tasks.id AS task_id, 
              title, 
              description, 
              location,
              users.id AS author_id,
              users.username,
              users.password,
              users.first_name,
              users.last_name,
              categories.id AS category_id,
              categories.name,
              started_on, 
              due_date
            FROM tasks
            INNER JOIN users users ON tasks.user_id = users.id
            INNER JOIN categories categories ON tasks.category_id = categories.id
            WHERE tasks.id = ?
            ORDER BY tasks.due_date DESC, tasks.id ASC;
        ';

        $row = $this->db
            ->query($query)
            ->execute([$id])
            ->fetch()
            ->current();

        /** @var TaskDTO $task */
        $task = $this->dataBinder->bind($row, TaskDTO::class);
        /** @var UserDTO $author */
        $author = $this->dataBinder->bind($row, UserDTO::class);
        /** @var CategoryDTO $category */
        $category = $this->dataBinder->bind($row, CategoryDTO::class);

        $task->setId($row['task_id']);
        $author->setId($row['author_id']);
        $category->setId($row['category_id']);

        $task->setAuthor($author);
        $task->setCategory($category);

        return $task;
    }

    public function insert(TaskDTO $taskDTO): bool
    {
        $query = '
            INSERT INTO tasks(
                title, 
                description, 
                location, 
                user_id, 
                category_id, 
                started_on, 
                due_date
            ) 
            VALUES(?, ?, ?, ?, ?, ?, ?);
        ';

        $this->db
            ->query($query)
            ->execute([
                $taskDTO->getTitle(),
                $taskDTO->getDescription(),
                $taskDTO->getLocation(),
                $taskDTO->getAuthor()->getId(),
                $taskDTO->getCategory()->getId(),
                $taskDTO->getStartedOn(),
                $taskDTO->getDueDate()
            ]);

        return true;
    }

    public function update(TaskDTO $taskDTO, int $id): bool
    {
        $query = '
            UPDATE tasks
            SET 
                title = ?,
                description = ?,
                location = ?,
                user_id = ?,
                category_id = ?,
                started_on = ?,
                due_date = ?
            WHERE id = ?  
        ';

        $this->db
            ->query($query)
            ->execute([
                $taskDTO->getTitle(),
                $taskDTO->getDescription(),
                $taskDTO->getLocation(),
                $taskDTO->getAuthor()->getId(),
                $taskDTO->getCategory()->getId(),
                $taskDTO->getStartedOn(),
                $taskDTO->getDueDate(),
                $id
            ]);

        return true;
    }

    public function remove(int $id): bool
    {
        $query = 'DELETE FROM tasks WHERE id = ?;';

        $this->db
            ->query($query)
            ->execute([$id]);

        return true;
    }
}