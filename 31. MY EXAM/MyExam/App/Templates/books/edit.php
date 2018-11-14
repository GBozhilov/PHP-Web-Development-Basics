<?php /** @var \App\Data\EditDTO $data */ ?>

<h1>EDIT BOOK</h1>

<a href="profile.php">My Profile</a><br>

<form method="post">

    <div>
        <label>
            Book Title:
            <input value="<?= $data->getBook()->getTitle(); ?>" type="text" name="title" minlength="3" maxlength="255"/>
        </label>
    </div>

    <div>
        <label>
            Book Author:
            <input value="<?= $data->getBook()->getAuthor() ?>" type="text" name="author" minlength="5"
                   maxlength="255"/>
        </label>
    </div>

    <div>
        <label>
            Description:
            <textarea name="description" minlength="10"
                      maxlength="10000"> <?= $data->getBook()->getDescription() ?></textarea>
        </label>
    </div>

    <div>
        <label>
            Genre:
            <select name="genre_id">
                <?php foreach ($data->getGenres() as $genre): ?>
                    <?php if ($data->getBook()->getGenre()->getId() === $genre->getId()) : ?>
                        <option selected="selected"
                                value="<?= $genre->getId(); ?>"><?= $genre->getName(); ?></option>
                    <?php else: ?>
                        <option value="<?= $genre->getId(); ?>"><?= $genre->getName(); ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
        </label>
    </div>

    <div>
        <label>
            Image URL:
            <input value="<?= $data->getBook()->getImage() ?>" type="text" name="image" minlength="5"
                   maxlength="10000"/>
        </label>
    </div>

    <div>
        <label>
            <input type="submit" name="save" value="Edit"/>
        </label>
    </div>
</form>

<a href="all_books.php">All books</a>