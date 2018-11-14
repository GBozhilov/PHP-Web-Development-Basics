<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Data</title>
</head>
<body>
<form>
    <input name="name" placeholder="Name.."/><br/>
    <input name="age" placeholder="Age.."/><br/>
    <input type="radio" name="gender" value="male">Male<br/>
    <input type="radio" name="gender" value="female">Female<br/>
    <input type="submit"/>
</form>
</body>
</html>

<?php
if (isset($_GET['name']) && isset($_GET['age']) && isset($_GET['gender'])) {
    $name = $_GET['name'];
    $age = $_GET['age'];
    $gender = $_GET['gender'];
    echo "<p>My name is $name. I am $age years old. I am $gender.</p>";
}