<form method="get">
    <div>
        Operation:
        <select name="operation">
            <option value="sum">Sum</option>
            <option value="subtract">Subtract</option>
            <option value="multiply">Multiply</option>
            <option value="divide">Divide</option>
        </select>
    </div>
    <div>
        Number 1:
        <input type="text" name="number_one"/>
    </div>
    <div>
        Number 2:
        <input type="text" name="number_two"/>
    </div>
    <div>
        <input type="submit" name="calculate" value="Calculate"/>
    </div>
</form>

<?php
if (isset($_GET['calculate'])) {
    $operation = $_GET['operation'];
    $firstNum = $_GET['number_one'];
    $secondNum = $_GET['number_two'];

    echo "<ul>";
    switch ($operation) {
        case 'sum':
            echo "<li style='color: red'>" . ($firstNum + $secondNum) . "</li>";
            break;
        case 'subtract':
            echo "<li style='color: red'>" . ($firstNum - $secondNum) . "</li>";
            break;
        case 'multiply':
            echo "<li style='color: red'>" . ($firstNum * $secondNum) . "</li>";
            break;
        case 'divide':
            echo "<li style='color: red'>" . ($firstNum / $secondNum) . "</li>";
            break;
    }
    echo "</ul>";
}