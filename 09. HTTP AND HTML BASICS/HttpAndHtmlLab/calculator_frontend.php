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
    <?php
    if (isset($output)): ?>
        <div>
            Result
            <input type="text" disabled="disabled" readonly="readonly" value="<?= $output; ?>"/>
        </div>
    <?php endif; ?>
    <div>
        <input type="submit" name="calculate" value="Calculate"/>
    </div>
</form>