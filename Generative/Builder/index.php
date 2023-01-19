<?php

/**
 * Pizza - Базовый объект строительства
 */
class Pizza
{
    private $_pastry = "";
    private $_sauce = "";
    private $_garniture = "";

    public function setPastry($pastry)
    {
        $this->_pastry = $pastry;
    }

    public function setSauce($sauce)
    {
        $this->_sauce = $sauce;
    }

    public function setGarniture($garniture)
    {
        $this->_garniture = $garniture;
    }
}

/**
 * Builder - Абстрактный строитель
 */
abstract class BuilderPizza
{
    public function __construct()
    {
        $this->_pizza = new Pizza ();
    }

    protected $_pizza;

    public function getPizza()
    {
        return $this->_pizza;
    }

    abstract public function buildPastry();

    abstract public function buildSauce();

    abstract public function buildGarniture();

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

    public function buildGarniture()
    {
        $this->_pizza->setGarniture("jambon+ananas");
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

    public function buildGarniture()
    {
        $this->_pizza->setGarniture("pepperoni+salami");
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
        $this->_builderPizza->buildGarniture();
    }
}

$pizzaDirector = new PizzaDirector();

// Инициализация доступных продуктов
$builderPizzaHawaii = new BuilderPizzaHawaii();
$builderPizzaPiquante = new BuilderPizzaSpicy();

// Подготовка и получение продукта
$pizzaDirector->makePizza($builderPizzaHawaii);
$pizza = $pizzaDirector->getPizza();

print_r($pizza);


// Подготовка и получение продукта
$pizzaDirector->makePizza($builderPizzaPiquante);
$pizza = $pizzaDirector->getPizza();

print_r($pizza);
