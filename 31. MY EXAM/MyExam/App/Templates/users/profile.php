<?php /** @var \App\Data\UserDTO $data */ ?>

<h1>Hello, <?= $data->getFullName() ?></h1>

<a href="add_book.php">Add new book</a> |
<a href="logout.php">logout</a>
<br/>

<a href="my_books.php">My Books</a>
<br/>
<a href="all_books.php">All Books</a>