<?php

namespace App\Http;


use App\Service\BookServiceInterface;
use App\Service\UserServiceInterface;

class HomeHttpHandler extends UserHttpHandlerAbstract
{
    public function index(UserServiceInterface $userService): void
    {
        if ($userService->isLogged()) {
            $this->render('books/all');
        } else {
            $this->render('home/index');
        }
    }

    public function dashboard(BookServiceInterface $bookService): void
    {
        if (!isset($_SESSION['id'])) {
            $this->redirect('login.php');
        }

        $allBooks = $bookService->getAll();

        $this->render('books/all', $allBooks);
    }
}