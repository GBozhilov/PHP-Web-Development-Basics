<?php

try {
    $db = new PDO(
        'mysql:host=localhost;dbname=php-course;charset=utf8',
        'root',
        ''
    );
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $studentId = (int)readline();

    $db_stm = $db->prepare(
        "DELETE FROM students
        WHERE student_id = :student_id;"
    );
    $db_stm->bindParam('student_id', $studentId);
    $db_stm->execute();
} catch (PDOException $e) {
    die($e->getMessage());
}

$db = null;