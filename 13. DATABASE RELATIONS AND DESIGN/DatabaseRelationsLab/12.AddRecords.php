<?php
$db = new PDO(
    'mysql:host=localhost;dbname=php-course;charset=utf8',
    'root',
    '',
    Array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
);

$n = (int)readline();

while ($n > 0) {
    $input = explode(' ', readline());
    list($firstName, $lastName, $studentNumber) = $input;
    $phone = null;

    if (isset($input[3])) {
        $phone = $input[3];
    }

    $db_stm = $db->prepare(
        'INSERT INTO students (first_name, last_name, student_number,phone)
        VALUES (:first_name, :last_name, :student_number, :phone)'
    );
    $db_stm->bindParam('first_name', $firstName);
    $db_stm->bindParam('last_name', $lastName);
    $db_stm->bindParam('student_number', $studentNumber);
    $db_stm->bindParam('phone', $phone);
    $db_stm->execute();

    $n--;
}

