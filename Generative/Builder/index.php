<?php

/**
 * Pizza - Базовый объект строительства
 */
class Pizza
{
    private $pastry;
    private $sauce;
    private $filling;

    public function setPastry($pastry)
    {
        $this->pastry = $pastry;
    }

    public function setSauce($sauce)
    {
        $this->sauce = $sauce;
    }

    public function setFilling($filling)
    {
        $this->filling = $filling;
    }
}

/**
 * Builder - Абстрактный строитель
 */
abstract class BuilderPizza
{
    protected $_pizza;

    public function __construct()
    {
        $this->_pizza = new Pizza ();
    }

    public function getPizza()
    {
        return $this->_pizza;
    }

    abstract public function buildPastry();

    abstract public function buildSauce();

    abstract public function buildFilling();

}

/**
 * BuilderConcret - Конкретный строитель 1
 */
class BuilderPizzaHawaii extends BuilderPizza
{
    public function buildPastry()
    {
        $this->_pizza->setPastry("normal");
    }

    public function buildSauce()
    {
        $this->_pizza->setSauce("soft");
    }

    public function buildFilling()
    {
        $this->_pizza->setFilling("jambon+ananas");
    }

}

/**
 * BuilderConcret - Конкретный строитель 2
 */
class BuilderPizzaSpicy extends BuilderPizza
{
    public function buildPastry()
    {
        $this->_pizza->setPastry("puff");
    }

    public function buildSauce()
    {
        $this->_pizza->setSauce("hot");
    }

    public function buildFilling()
    {
        $this->_pizza->setFilling("pepperoni+salami");
    }

}

/**
 * Director - Управляющий класс, запускающий строительство
 * PizzaBuilder - Реализация патерна Builder, показывающая делегирование процесса создания пиццы методу constructPizza
 */
class PizzaDirector
{
    private $_builderPizza;

    public function makePizza(BuilderPizza $builderPizza)
    {
        $this->_builderPizza = $builderPizza;
        $this->constructPizza();
    }

    public function getPizza()
    {
        return $this->_builderPizza->getPizza();
    }

    private function constructPizza()
    {
        $this->_builderPizza->buildPastry();
        $this->_builderPizza->buildSauce();
        $this->_builderPizza->buildFilling();
    }
}

$pizzaDirector = new PizzaDirector();

// Инициализация доступных продуктов
$builderPizzaHawaii = new BuilderPizzaHawaii();
$builderPizzaPiquant = new BuilderPizzaSpicy();

// Подготовка и получение продукта
$pizzaDirector->makePizza($builderPizzaHawaii);
$pizza = $pizzaDirector->getPizza();

print_r($pizza);


// Подготовка и получение продукта
$pizzaDirector->makePizza($builderPizzaPiquant);
$pizza = $pizzaDirector->getPizza();

print_r($pizza);
