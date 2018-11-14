<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HTML Table</title>
</head>
<body>
<form>
    Name: <input name="name"/><br/>
    Phone: <input name="phone"/><br/>
    Age: <input name="age"/><br/>
    Address: <input name="address"/><br/>
    <input type="submit" value="Generate"/>
</form>
</body>
</html>

<?php
if (isset($_GET['name']) && isset($_GET['phone']) &&
    isset($_GET['age']) && isset($_GET['address'])) {
    echo "<table border='2'>\n";
    echo "\t<tr>\n";
    echo "\t\t<td style='background-color: orange'>Name</td>\n";
    echo "\t\t<td>{$_GET['name']}</td>\n";
    echo "\t</tr>\n";
    echo "\t<tr>\n";
    echo "\t\t<td style='background-color: orange'>Phone number</td>\n";
    echo "\t\t<td>{$_GET['phone']}</td>\n";
    echo "\t</tr>\n";
    echo "\t<tr>\n";
    echo "\t\t<td style='background-color: orange'>Age</td>\n";
    echo "\t\t<td>{$_GET['age']}</td>\n";
    echo "\t</tr>\n";
    echo "\t<tr>\n";
    echo "\t\t<td style='background-color: orange'>Address</td>\n";
    echo "\t\t<td>{$_GET['address']}</td>\n";
    echo "\t</tr>\n";
    echo "<table/>";
}
