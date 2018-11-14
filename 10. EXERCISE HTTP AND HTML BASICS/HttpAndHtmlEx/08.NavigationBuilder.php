<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Navigation Builder</title>
</head>
<body>
<form>
    Categories: <input name="categories"/><br/>
    Tags: <input name="tags"/><br/>
    Months: <input name="months"/><br/>
    <input type="submit" value="Generate"/>
</form>
</body>
</html>

<?php
if (isset($_GET['categories']) && isset($_GET['tags']) && isset($_GET['months'])) {
    $categories = explode(', ', $_GET['categories']);
    $tags = explode(', ', $_GET['tags']);
    $months = explode(', ', $_GET['months']);

    echo "<h2>Categories</h2>\n";
    printList($categories);
    echo "<h2>Tags</h2>\n";
    printList($tags);
    echo "<h2>Months</h2>\n";
    printList($months);
}

function printList($arr)
{
    echo "<ul>\n";
    foreach ($arr as $item) {
        echo "\t<li>$item</li>\n";
    }
    echo "</ul>\n";
}