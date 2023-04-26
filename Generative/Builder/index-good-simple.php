<?php

class Product
{
    private $name;
    private $price;

    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }
}

class ProductBuilder
{
    private $name;
    private $price;

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    public function build()
    {
        return new Product($this->name, $this->price);
    }
}

$builder = new ProductBuilder();
$product = $builder->setName("Product 1")->setPrice(10)->build();

echo "Name: " . $product->getName() . "\n";
echo "Price: " . $product->getPrice() . "\n";