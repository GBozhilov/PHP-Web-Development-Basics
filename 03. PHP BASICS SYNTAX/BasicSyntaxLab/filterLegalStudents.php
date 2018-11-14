<?php
if (isset($_GET['delimiter'], $_GET['names'], $_GET['ages'])) {
    $delimiter = $_GET['delimiter'];
    $names = explode($delimiter, $_GET['names']);
    $ages = explode($delimiter, $_GET['ages']);
    $students = [];

    for ($i = 0; $i < sizeof($names); $i++) {
        $student = (object)[];
        $student->name = $names[$i];
        $student->age = $ages[$i];

        if ($student->age >= 18) {
            array_push($students, $student);
        }
    }
}

if (isset($students)): ?>
    <table border="1" cellpadding="0">
        <thead>
        <tr>
            <th>Name</th>
            <th>Age</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($students as $student): ?>
            <tr>
                <td><?= $student->name ?></td>
                <td><?= $student->age ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php endif;