<form>
    <textarea cols="50" rows="10" name="input"></textarea><br/>
    <input type="submit" value="Color text"/>
</form>

<?php
if (isset($_GET['input'])) {
    $text = $_GET['input'];

    for ($i = 0; $i < strlen($text); $i++) {
        $char = $text[$i];
        $code = ord($char);

        if ($char == ' ') {
            continue;
        }

        if ($code % 2 != 0) {
            echo "<span style='color: blue'>$char </span>";
        } else {
            echo "<span style='color: red'>$char </span>";
        }
    }
}