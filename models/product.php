<?php
class Product
{
    private $id;
    private $name;
    private $img;
    private $desc;
    private $price;
    private $old_price;
    private $location;
    private $star;
    private $review;
    private $sold;
    private $unit;
    private $id_category;

    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getImg()
    {
        return $this->img;
    }
    public function getDesc()
    {
        return $this->desc;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function getOldPrice()
    {
        return $this->old_price;
    }
    public function getLocation()
    {
        return $this->location;
    }
    public function getStar()
    {
        return $this->star;
    }
    public function getReview()
    {
        return $this->review;
    }
    public function getSold()
    {
        return $this->sold;
    }
    public function getUnit()
    {
        return $this->unit;
    }
    public function getIdCategory()
    {
        return $this->id_category;
    }

    public function __construct($id, $name, $img, $desc, $price, $old_price, $location, $star, $review, $sold, $unit, $id_category)
    {
        $this->id = $id;
        $this->name = $name;
        $this->img = $img;
        $this->desc = $desc;
        $this->price = $price;
        $this->old_price = $old_price;
        $this->location = $location;
        $this->star = $star;
        $this->review = $review;
        $this->sold = $sold;
        $this->unit = $unit;
        $this->id_category = $id_category;
    }

    public function __toString()
    {
        return "Product($this->name, $this->desc, $this->price)";
    }
}
