<?php

/**
 * Class Factory
 */
class Factory
{
    /**
     * @param $writerName
     * @return WriterInterface
     * @throws Exception
     */
    public static function getWriter($writerName): WriterInterface
    {
        if (!class_exists($writerName)) {
            throw new Exception('Non valid writer');
        }

        return new $writerName();
    }
}