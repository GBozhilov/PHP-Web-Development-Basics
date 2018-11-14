<form>
    <textarea cols="50" rows="10" name="input"></textarea><br/><br/>
    <input type="submit" value="Count words">
</form>

<?php
if (isset($_GET['input'])) {
    $text = strtolower($_GET['input']);
    $words = preg_split('/[^A-Za-z]+/', $text, -1, PREG_SPLIT_NO_EMPTY);

    $resultArr = [];
    foreach ($words as $word) {
        if (!array_key_exists($word, $resultArr)) {
            $resultArr[$word] = 0;
        }

        $resultArr[$word]++;
    }

    $output = "<table border='2'>";

    foreach ($resultArr as $word => $count) {
        $output .= "<tr><td>$word</td><td>$count</td></tr>";
    }

    $output .= "</table>";
    echo $output;
}
