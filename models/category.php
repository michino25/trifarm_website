<?php
class Category
{
    private $id;
    private $name;

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

    public function __construct($id, $name, $img)
    {
        $this->id = $id;
        $this->name = $name;
        $this->img = $img;
    }

    public function __toString()
    {
        return "Category($this->name)";
    }
}
