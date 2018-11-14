<?php /** @var \App\Data\EditDTO $data */ ?>

<h1>Edit task "<?= $data->getTask()->getTitle(); ?>"</h1>

<form method="post">

    <div>
        <label>
            Title:
            <input value="<?= $data->getTask()->getTitle(); ?>" type="text" name="title" minlength="3" maxlength="50"/>
        </label>
    </div>

    <div>
        <label>
            Category:
            <select name="category_id">
                <?php foreach ($data->getCategories() as $category): ?>
                    <?php if ($data->getTask()->getCategory()->getId() === $category->getId()) : ?>
                        <option selected="selected"
                                value="<?= $category->getId(); ?>"><?= $category->getName(); ?></option>
                    <?php else: ?>
                        <option value="<?= $category->getId(); ?>"><?= $category->getName(); ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
        </label>
    </div>

    <div>
        <label>
            Description:
            <input value="<?= $data->getTask()->getDescription(); ?>" type="text" name="description" minlength="10"
                   maxlength="10000"/>
        </label>
    </div>

    <div>
        <label>
            Location:
            <input value="<?= $data->getTask()->getLocation(); ?>" type="text" name="location" minlength="3"
                   maxlength="100"/>
        </label>
    </div>

    <div>
        <label>
            Started On: <input value="<?= $data->getTask()->getStartedOn(); ?>" type="text" name="started_on"/>
        </label>
    </div>

    <div>
        <label>
            Due Date: <input value="<?= $data->getTask()->getDueDate(); ?>" type="text" name="due_date"/>
        </label>
    </div>

    <div>
        <label>
            <input type="submit" name="save" value="Save"/>
        </label>
    </div>

</form>

<a href="dashboard.php">List</a>