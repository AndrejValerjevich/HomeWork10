<?php

final class Phone extends Product
{
    protected $discount = 10;
    private $diagonal;
    private $camera;

    public function __construct($category, $name, $weight, $price, $diagonal, $camera)
    {
        parent::__construct($category, $name, $weight, $price);
        $this->diagonal = $diagonal;
        $this->camera = $camera;
    }

    public function getCamera()
    {
        return $this->camera;
    }

    public function setCamera($camera)
    {
        $this->camera = $camera;
    }

    public function getDiagonal()
    {
        return $this->diagonal;
    }

    public function setDiagonal($diagonal)
    {
        $this->diagonal = $diagonal;
    }

    public function showInformation()
    {
        parent::showInformation();
        echo '<br/>Диагональ экрана: ' . $this->getCategory() . '<br/>Камера: ' . $this->getName(), PHP_EOL;
    }
}