<?php
/**
 * Сначала у нас есть интерфейс Door и несколько его реализаций
 */
interface Door
{
    public function getDescription();
}

class WoodenDoor implements Door
{
    public function getDescription()
    {
        echo "Я деревянная дверь\n";
    }
}

class IronDoor implements Door
{
    public function getDescription()
    {
        echo "Я железная дверь\n";
    }
}

/**
 * Затем у нас есть несколько DoorFittingExpert для каждого типа дверей
 */
interface DoorFittingExpert
{
    public function getDescription();
}

class Welder implements DoorFittingExpert
{
    public function getDescription()
    {
        echo "Я работаю только с железными дверьми\n";
    }
}

class Carpenter implements DoorFittingExpert
{
    public function getDescription()
    {
        echo "Я работаю только с деревянными дверьми\n";
    }
}

/**
 * Теперь у нас есть DoorFactory, которая позволит нам создать семейство связанных объектов.
 * То есть фабрика деревянных дверей предоставит нам деревянную дверь и эксперта по деревянным дверям.
 * Аналогично для железных дверей
 */
interface DoorFactory
{
    public function makeDoor(): Door;
    public function makeFittingExpert(): DoorFittingExpert;
}

/**
 * Деревянная фабрика вернет деревянную дверь и столяра
 */
class WoodenDoorFactory implements DoorFactory
{
    public function makeDoor(): Door
    {
        return new WoodenDoor();
    }

    public function makeFittingExpert(): DoorFittingExpert
    {
        return new Carpenter();
    }
}

/**
 * Железная фабрика вернет железную дверь и сварщика
 */
class IronDoorFactory implements DoorFactory
{
    public function makeDoor(): Door
    {
        return new IronDoor();
    }

    public function makeFittingExpert(): DoorFittingExpert
    {
        return new Welder();
    }
}


$woodenFactory = new WoodenDoorFactory();

$door = $woodenFactory->makeDoor();
$expert = $woodenFactory->makeFittingExpert();

$door->getDescription();  // Вывод: Я деревянная дверь
$expert->getDescription(); // Вывод: Я работаю только с деревянными дверями

// Аналогично для железной двери
$ironFactory = new IronDoorFactory();

$door = $ironFactory->makeDoor();
$expert = $ironFactory->makeFittingExpert();

$door->getDescription();  // Вывод: Я железная дверь
$expert->getDescription(); // Вывод: Я работаю только с железными дверями