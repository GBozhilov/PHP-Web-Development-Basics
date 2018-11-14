<?php /** @var \App\Data\EditDTO $data */ ?>

<h1>Add new Task</h1>

<form method="post">
    <div>
        <label>
            Title:
            <input type="text" name="title" minlength="3" maxlength="50"/>
        </label>
    </div>

    <div>
        <label>
            Category:
            <select name="category_id">
                <?php foreach ($data->getCategories() as $category): ?>
                    <option value="<?= $category->getId(); ?>"><?= $category->getName(); ?></option>
                <?php endforeach; ?>
            </select>
        </label>
    </div>

    <div>
        <label>
            Description:
            <input type="text" name="description" minlength="10" maxlength="10000"/>
        </label>
    </div>

    <div>
        <label>
            Location:
            <input type="text" name="location" minlength="3" maxlength="100"/>
        </label>
    </div>

    <div>
        <label>
            Started On: <input type="date" name="started_on"/><br/>
        </label>
    </div>

    <div>
        <label>
            Due Date: <input type="date" name="due_date"/><br/>
        </label>
    </div>

    <input type="submit" name="save" value="Save"/><br/>
</form>

<a href="dashboard.php">List</a>