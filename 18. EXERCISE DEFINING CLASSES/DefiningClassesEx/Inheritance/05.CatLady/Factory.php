<?php

/**
 * Class Factory
 */
class Factory
{
    /**
     * @param array $data
     * @return Cat
     * @throws Exception
     */
    public static function createCat(array $data): Cat
    {
        [$breed, $name, $param] = $data;

        if (!class_exists($breed)) {
            throw new Exception('Non existing breed');
        }

        return new $breed($breed, $name, $param);
    }
}