<?php /** @var \App\Data\BookDTO[] $data */ ?>

<h1>My books</h1>

<a href="add_book.php">Add new book</a> |
<a href="profile.php">My Profile</a> |
<a href="all_books.php">All Books</a> |
<a href="logout.php">logout</a><br/>


<table border="1">
    <thead>
    <tr>
        <th>Title</th>
        <th>Author</th>
        <th>Genre</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>

    <tbody>
    <?php foreach ($data as $book): ?>
        <tr>
            <td><?= $book->getTitle() ?></td>
            <td><?= $book->getAuthor() ?></td>
            <td><?= $book->getGenre()->getName() ?></td>
            <td><a href="edit_book.php?id=<?= $book->getId(); ?>">edit book</a></td>
            <td><a href="delete_book.php?id=<?= $book->getId(); ?>">delete book</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
