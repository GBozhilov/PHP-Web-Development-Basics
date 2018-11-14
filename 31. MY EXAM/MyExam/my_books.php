<?php

require_once 'common.php';

$bookHttpHandler = new \App\Http\BookHttpHandler($template, new \Core\DataBinder());
$bookService = new \App\Service\BookService(new \App\Repository\BookRepository($db, new \Core\DataBinder()));
$bookHttpHandler->myBooks($bookService);