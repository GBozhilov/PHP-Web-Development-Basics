<h1>REGISTER NEW USER</h1>

<form method="post">
    <div>
        <label>
            Username:
            <input type="text" name="username" minlength="4" maxlength="255"/>
        </label>
    </div>

    <div>
        <label>
            Password:
            <input type="password" name="password" minlength="4" maxlength="255"/>
        </label>
    </div>

    <div>
        <label>
            Confirm Password:
            <input type="password" name="confirm_password" minlength="4" maxlength="255"/>
        </label>
    </div>

    <div>
        <label>
            Full Name:
            <input type="text" name="fullName" minlength="5" maxlength="255"/>
        </label>
    </div>

    <div>
        <label>
            Born On:
            <input type="date" name="bornOn"/>
        </label>
    </div>

    <div>
        <input type="submit" name="register" value="Register!"/>
    </div>
</form>

<a href="index.php">Home</a>