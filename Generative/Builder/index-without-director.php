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
        $this->constructPizza();
    }

    protected $_pizza;

    public function getPizza()
    {
        return $this->_pizza;
    }

    private function constructPizza()
    {
        $this->buildPastry();
        $this->buildSauce();
        $this->buildGarniture();
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

$builderPizzaHawaii = new BuilderPizzaHawaii();
$pizza = $builderPizzaHawaii->getPizza();

print_r($pizza);

$builderPizzaPiquante = new BuilderPizzaSpicy();
$pizza = $builderPizzaPiquante->getPizza();

print_r($pizza);
