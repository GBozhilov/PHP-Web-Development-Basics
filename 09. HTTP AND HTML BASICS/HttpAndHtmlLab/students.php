<?php
include 'students_frontend.php';

if (isset($_GET['filter'])):
    $delimiter = $_GET['delimiter'];
    $names = explode($delimiter, $_GET['names']);
    $ages = explode($delimiter, $_GET['ages']); ?>
    <table border="1" cellpadding="0">
        <thead>
        <th>Name</th>
        <th>Age</th>
        </thead>
        <tbody>
        <?php for ($i = 0; $i < count($names); $i++): ?>
            <tr>
                <td> <?= $names[$i]; ?> </td>
                <td> <?= $ages[$i]; ?> </td>
            </tr>
        <?php endfor; ?>
        </tbody>
    </table>
<?php endif;

