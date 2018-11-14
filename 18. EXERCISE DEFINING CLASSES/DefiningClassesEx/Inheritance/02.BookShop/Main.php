<?php
require_once 'Book.php';
require_once 'GoldenEditionBook.php';

$author = readline();
$title = readline();
$price = (float)readline();
$type = readline();

if ($type === 'STANDARD') {
    $book = new Book($author, $title, $price);
} elseif ($type === 'GOLD') {
    $book = new GoldenEditionBook($author, $title, $price);
} else {
    exit('Type is not valid!');
}

echo $book;