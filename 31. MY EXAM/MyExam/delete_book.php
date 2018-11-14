<?php

require_once 'common.php';

$taskService = new \App\Service\BookService(new \App\Repository\BookRepository($db, new \Core\DataBinder()));

$bookHttpHandler = new \App\Http\BookHttpHandler($template, new \Core\DataBinder());
$bookHttpHandler->delete($taskService, $_GET);