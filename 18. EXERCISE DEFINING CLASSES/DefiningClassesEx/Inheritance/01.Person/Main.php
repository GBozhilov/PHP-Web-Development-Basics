<?php
require_once 'Person.php';
require_once 'Child.php';

try {
    $person = new Person('George', 12);
    $child = new Child('George', 15);
} catch (Exception $ex) {
    echo $ex->getMessage();
}
