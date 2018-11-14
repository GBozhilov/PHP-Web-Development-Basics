<?php
$output = null;
if (isset($_GET['text'])) {
    $words = preg_split('/\W+/', $_GET['text']);

    $capitalCaseWords = array_filter($words, function ($word) {
        return $word === strtoupper($word);
    });

    $output = implode(', ', $capitalCaseWords);
} ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Extract Words</title>
</head>
<body>
<form>
    <textarea rows="10" name="text"><?= $output; ?></textarea><br/>
    <input type="submit" value="Extract">
</form>
</body>
</html>
