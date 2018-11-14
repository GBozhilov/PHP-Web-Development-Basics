<?php

namespace App\Service;


use App\Data\GenreDTO;
use App\Repository\GenreRepositoryInterface;

class GenreService implements GenreServiceInterface
{
    /**
     * @var GenreRepositoryInterface
     */
    private $genreRepository;

    public function __construct(GenreRepositoryInterface $genreRepository)
    {
        $this->genreRepository = $genreRepository;
    }

    public function getAll(): \Generator
    {
        return $this->genreRepository->findAll();
    }

    /**
     * @param int $id
     * @return GenreDTO
     * @throws \Exception
     */
    public function getOne(int $id): GenreDTO
    {
        $genre = $this->genreRepository->findOne($id);

        if($genre === null){
            throw new \Exception('Missing genre');
        }

        return $this->genreRepository->findOne($id);
    }
}