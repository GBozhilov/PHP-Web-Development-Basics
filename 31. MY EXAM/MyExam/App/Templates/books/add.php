<?php /** @var \App\Data\EditDTO $data */ ?>

<h1>Add new Task</h1>

<form method="post">
    <div>
        <label>
            Book Title:
            <input type="text" name="title" minlength="3" maxlength="50"/>
        </label>
    </div>

    <div>
        <label>
            Book Author:
            <input type="text" name="author" minlength="3" maxlength="50"/>
        </label>
    </div>

    <div>
        <label>
            Description:
            <textarea name="description" minlength="10" maxlength="10000"></textarea>
        </label>
    </div>

    <div>
        <label>
            Image URL:
            <input type="text" name="image" minlength="3"/>
        </label>
    </div>

    <div>
        <label>
            Genre:
            <select name="genre_id">
                <?php foreach ($data->getGenres() as $genre): ?>
                    <option value="<?= $genre->getId(); ?>"><?= $genre->getName(); ?></option>
                <?php endforeach; ?>
            </select>
        </label>
    </div>

    <input type="submit" name="save" value="Add"/><br/>
</form>


