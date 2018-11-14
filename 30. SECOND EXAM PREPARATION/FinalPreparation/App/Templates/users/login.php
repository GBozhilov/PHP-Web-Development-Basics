<?php /** @var \App\Data\UserDTO|null $data */ ?>

<?php foreach ($errors as $error): ?>
    <p style="color: red"><?= $error ?></p>
<?php endforeach; ?>

<h1>USER LOGIN</h1>

<form method="post">
    <div>
        <label>
            Username:
            <input type="text" <input value="<?= $data !== null ? $data->getUsername() : '' ?>" name="username"/>
        </label>
    </div>

    <div>
        <label>
            Password:
            <input type="password" <input value="<?= $data !== null ? $data->getPassword() : '' ?>" name="password"/>
        </label>
    </div>

    <div>
        <input type="submit" name="login" value="Login"/>
    </div>
</form>