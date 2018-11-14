<h1>USER REGISTRATION</h1>

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
            <input type="password" name="password" minlength="6" maxlength="255"/>
        </label>
    </div>

    <div>
        <label>
            Confirm Password:
            <input type="password" name="confirm_password" minlength="6" maxlength="255"/>
        </label>
    </div>

    <div>
        <label>
            First Name:
            <input type="text" name="firstName" minlength="3" maxlength="255"/>
        </label>
    </div>

    <div>
        <label>
            Last Name:
            <input type="text" name="lastName" minlength="3" maxlength="255"/>
        </label>
    </div>

    <div>
        <input type="submit" name="register" value="Register"/>
    </div>
</form>