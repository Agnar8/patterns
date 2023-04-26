<?php

/**
 * Pizza - Базовый объект строительства
 */
class Pizza
{
    private $pastry = "";
    private $sauce = "";
    private $filling = "";

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
        $this->constructPizza();
    }

    public function getPizza()
    {
        return $this->_pizza;
    }

    private function constructPizza()
    {
        $this->buildPastry();
        $this->buildSauce();
        $this->buildFilling();
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

$builderPizzaHawaii = new BuilderPizzaHawaii();
$pizza = $builderPizzaHawaii->getPizza();

print_r($pizza);

$builderPizzaPiquant = new BuilderPizzaSpicy();
$pizza = $builderPizzaPiquant->getPizza();

print_r($pizza);
