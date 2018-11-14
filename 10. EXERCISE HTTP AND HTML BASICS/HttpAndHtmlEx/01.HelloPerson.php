<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hello</title>
</head>
<body>
<form>
    Name: <input name="person"/>
    <input type="submit" name="button"/>
</form>
<?php
if (isset($_GET['person'])) {
    $name = htmlspecialchars($_GET['person']);
    echo "<div>Hello, $name!</div" . PHP_EOL;
}
?>
</body>
</html>