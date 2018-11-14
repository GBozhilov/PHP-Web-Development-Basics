<?php /** @var \App\Data\BookDTO[] $data */ ?>

<h1>All Books</h1>

<a href="add_book.php">Add new book</a> |
<a href="profile.php">My Profile</a> |
<a href="logout.php">logout</a> <br/><br/>

<table border="1">
    <thead>
    <tr>
        <th>Title</th>
        <th>Author</th>
        <th>Genre</th>
        <th>Added by User</th>
        <th>Details</th>
    </tr>
    </thead>

    <tbody>
    <?php foreach ($data as $book): ?>
        <tr>
            <td><?= $book->getTitle() ?></td>
            <td><?= $book->getAuthor(); ?></td>
            <td><?= $book->getGenre()->getName() ?></td>
            <td><?= $book->getUser()->getUsername() ?></td>
            <td><a href="view.php?id=<?= $book->getId(); ?>">Details</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>