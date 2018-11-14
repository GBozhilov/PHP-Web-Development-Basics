<?php

namespace Core;


class DataBinder implements DataBinderInterface
{
    public function bind(array $from, string $className)
    {
        $object = new $className;

        foreach ($from as $key => $value) {
            $methodName = 'set' . implode('',
                    array_map('ucfirst', explode('_', $key))
                );

            if (method_exists($object, $methodName)) {
                $object->$methodName($value);
            }
        }

        return $object;
    }
}