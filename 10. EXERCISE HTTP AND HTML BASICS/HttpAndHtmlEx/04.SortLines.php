<?php
$output = null;
if (isset($_GET['lines'])) {
    $lines = explode("\n", $_GET['lines']);
    asort($lines);
    $output = implode(PHP_EOL, $lines);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sort Lines</title>
</head>
<body>
<form>
    <textarea rows="10" name="lines"><?= $output; ?></textarea> <br>
    <input type="submit" value="Sort">
</form>
</body>
</html>