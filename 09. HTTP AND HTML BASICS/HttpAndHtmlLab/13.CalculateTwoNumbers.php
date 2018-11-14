<form>
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
        First number
        <input name="number_one"/>
    </div>
    <div>
        Second number
        <input name="number_two"/>
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
    switch ($operation) {
        case 'sum':
            echo ' == ' . ($firstNum + $secondNum);
            break;
        case 'subtract':
            echo ' == ' . ($firstNum - $secondNum);
            break;
        case 'multiply':
            echo ' == ' . ($firstNum * $secondNum);
            break;
        case 'divide':
            if ($secondNum != 0) {
                echo ' == ' . ($firstNum / $secondNum);
            } else {
                echo 'Cannot divide by zero';
            }
            break;
        default:
            echo 'Invalid operation supplied';
            break;
    }
}