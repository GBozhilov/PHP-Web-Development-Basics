<?php
/**
 * Created by PhpStorm.
 * User: Bozhilov
 * Date: 19-Oct-18
 * Time: 12:35
 */

class Person
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var int
     */
    public $age;

    const limit = 13;

    public function getName(): string {
        if (self::limit ) {

        }
    }

    public static function sum($a, $b) {
        return $a + $b;
    }
}