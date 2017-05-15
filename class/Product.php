<?php
require_once '/class/DefinedProduct.interface.php';

class Product implements DefinedProduct
{
    use WorkWithPrice;
    protected $category;
    protected $name;
    protected $weight;
    protected $delivery = 250;

    public function __construct($category, $name, $weight, $price)
    {
        $this->category = $category;
        $this->name = $name;
        $this->weight = $weight;
        $this->price = $price;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this->name;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory($category)
    {
        $this->category = $category;
        return $this->category;
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    public function getDelivery()
    {
        return $this->delivery;
    }

    public function setDelivery($delivery)
    {
        $this->delivery = $delivery;
    }

    public function getDiscountedPrice()
    {
        if ($this->getDiscount() != 0) {
            $this->setDelivery(300);
            return $this->price * (1 - $this->getDiscount()/100) + $this->getDelivery();
        }
        return $this->price + $this->getDelivery();
    }

    public function showInformation()
    {
        echo 'Категория: ' . $this->getCategory() . '<br/>Наименование: ' . $this->getName() . '<br/>Скидка: ' . $this->getDiscount() . '<br/>Вес: ' . $this->getWeight() . '<br/>Цена с учетом скидки: ' . $this->getDiscountedPrice(), PHP_EOL;
    }
}

trait WorkWithPrice
{
    protected $price;
    protected $discount = 0;

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    public function getDiscount()
    {
        return $this->discount;
    }

    public function setDiscount($discount)
    {
        $this->discount = $discount;
        return $this;
    }
}

