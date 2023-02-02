<?php

class Factory
{
    public static function build($type)
    {
        $class = "Format" . $type;
        if (!class_exists($class)) {
            throw new Exception("Missing format class.");
        }
        return new $class;
    }
}

interface FormatInterface
{
}

class FormatString implements FormatInterface
{
}

class FormatNumber implements FormatInterface
{
}

try {
    $string = Factory::build("String");
} catch (Exception $e) {
    echo $e->getMessage();
}

try {
    $number = Factory::build("Number");
} catch (Exception $e) {
    echo $e->getMessage();
}