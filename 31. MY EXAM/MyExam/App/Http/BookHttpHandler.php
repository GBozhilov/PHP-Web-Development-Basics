<?php

namespace App\Http;


use App\Data\BookDTO;
use App\Data\EditDTO;
use App\Service\BookService;
use App\Service\BookServiceInterface;
use App\Service\GenreService;
use App\Service\GenreServiceInterface;
use App\Service\UserService;
use App\Service\UserServiceInterface;

class BookHttpHandler extends UserHttpHandlerAbstract
{
    public function details(BookServiceInterface $bookService, array $getData = []): void
    {
        $book = $bookService->getOne((int)$getData['id']);

        $editDTO = new EditDTO();
        $editDTO->setBook($book);

        $this->render('books/view', $editDTO);
    }

    public function myBooks(BookServiceInterface $bookService): void
    {
        if (!isset($_SESSION['id'])) {
            $this->redirect('login.php');
        }

        $myBooks = $bookService->getMyBooks($_SESSION['id']);

        $this->render('books/my_books', $myBooks);
    }

    /**
     * @param BookServiceInterface $bookService
     * @param UserServiceInterface $userService
     * @param GenreServiceInterface $genreService
     * @param array $formData
     * @throws \Exception
     */
    public function add(BookServiceInterface $bookService,
                        UserServiceInterface $userService,
                        GenreServiceInterface $genreService,
                        array $formData = []): void
    {
        /** @var BookDTO $book */
        $book = $this->dataBinder->bind($formData, BookDTO::class);
        $editDTO = new EditDTO();
        $editDTO->setBook($book);
        $editDTO->setGenres($genreService->getAll());

        if (isset($formData['save'])) {
            $this->handleInsertProcess($bookService, $userService, $genreService, $formData);
        } else {
            $this->render('books/add', $editDTO);
        }
    }

    public function edit(BookServiceInterface $bookService,
                         UserServiceInterface $userService,
                         GenreServiceInterface $genreService,
                         array $formData = [], array $getData = []): void
    {
        $book = $bookService->getOne((int)$getData['id']);

        $editDTO = new EditDTO();
        $editDTO->setBook($book);
        $editDTO->setGenres($genreService->getAll());

        if (isset($formData['save'])) {
            $this->handleEditProcess($bookService, $userService, $genreService, $formData, $getData);
        } else {
            $this->render('books/edit', $editDTO);
        }
    }

    public function delete(BookServiceInterface $bookService, array $getData = []): void
    {
        if (!isset($getData['id'])) {
            $this->redirect('my_books.php');
        }

        $bookService->delete((int)$getData['id']);
        $this->redirect('my_books.php');
    }

    /**
     * @param $bookService
     * @param $userService
     * @param $genreService
     * @param $formData
     * @throws \Exception
     */
    private function handleInsertProcess($bookService, $userService, $genreService, $formData): void
    {
        /** @var BookDTO $book */
        $book = $this->dataBinder->bind($formData, BookDTO::class);
        /** @var UserService $userService */
        $user = $userService->currentUser();
        /** @var GenreService $genreService */
        $genre = $genreService->getOne((int)$formData['genre_id']);
        $book->setUser($user);
        $book->setGenre($genre);

        /** @var BookService $bookService */
        $bookService->add($book);
        $this->redirect('my_books.php');
    }

    private function handleEditProcess($bookService, $userService, $genreService, $formData, $getData): void
    {
        try {
            /** @var BookDTO $book */
            $book = $this->dataBinder->bind($formData, BookDTO::class);
            /** @var UserService $userService */
            $author = $userService->currentUser();
            /** @var GenreService $genreService */
            $genre = $genreService->getOne((int)$formData['genre_id']);
            $book->setUser($author);
            $book->setGenre($genre);
            $book->setId($getData['id']);

            /** @var BookService $bookService */
            $bookService->edit($book, (int)$getData['id']);
            $this->redirect('my_books.php');
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }
    }
}