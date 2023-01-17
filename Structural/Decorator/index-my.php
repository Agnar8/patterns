<?php

interface AutoBase
{
    public function getPrice(): float;
}

abstract class Auto implements AutoBase
{
    public $price;

    public function getPrice(): float
    {
        return $this->price;
    }
}

class Bmw extends Auto
{
    public function __construct()
    {
        $this->price = 30000;
    }
}

class Audi extends Auto
{
    public function __construct()
    {
        $this->price = 25000;
    }
}

class Decorator implements AutoBase
{
    private $auto;

    public function __construct(AutoBase $auto)
    {
        $this->auto = $auto;
    }

    public function getPrice(): float
    {
        return $this->auto->getPrice();
    }
}

// парктроник
class DecoratorParkingSensor extends Decorator
{
    public function getPrice(): float
    {
        return parent::getPrice() + 1500;
    }
}

// подогрев сидений
class DecoratorHeatedSeats extends Decorator
{
    public function getPrice(): float
    {
        return parent::getPrice() + 800;
    }
}

$carBmw = new DecoratorParkingSensor(new DecoratorHeatedSeats(new Bmw()));
echo $carBmw->getPrice() . "\n"; // 32300

$carAudi = new DecoratorParkingSensor(new Audi());
echo $carAudi->getPrice() . "\n"; // 26500



