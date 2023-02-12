<?php

interface Door
{
    public function getWidth(): float;

    public function getHeight(): float;
}

class WoodenDoor implements Door
{
    protected $width;
    protected $height;

    public function __construct(float $width, float $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    public function getWidth(): float
    {
        return $this->width;
    }

    public function getHeight(): float
    {
        return $this->height;
    }
}

class DoorFactory
{
    public static function makeDoor($width, $height): Door
    {
        /**
         * тут еще должна быть какаято логика, чтобы оправдать создание фабрики
         * иначе в ней нет смысла.
         * Суть вынести повторяющийся код в отдельный класс
         */
        return new WoodenDoor($width, $height);
    }
}

$door = DoorFactory::makeDoor(100, 200);
echo 'Width: ' . $door->getWidth() . "\n";
echo 'Height: ' . $door->getHeight() . "\n";