<?php
require_once "models/category.php";
require_once "modules/db_module.php";

class ModelCategory
{
    public function getCategoryList()
    {
        $result = executeQuery("SELECT * FROM tb_category");
        $data = array();
        while ($rows = mysqli_fetch_assoc($result)) {
            $category = new Category($rows["id"], $rows["name"], $rows["img"]);
            array_push($data, $category);
        }
        return $data;
    }

    public function getCategory($id)
    {
        $allCategory = $this->getCategoryList();
        foreach ($allCategory as $category)
            if ($category->getId() === $id)
                return $category;

        return null;
    }


    /*     function Add($name, $ordering, $active, $selectLevel)
    {
        $qr = "INSERT INTO Category VALUES(
            null, '$name',$ordering ,$active, $selectLevel
        )";
        return mysqli_query($this->conn, $qr);
    }

    function Detail($id)
    {
        $qr = "SELECT * FROM Category
        WHERE id=$id";
        return mysqli_query($this->conn, $qr);
    }

    function Update($id, $name, $ordering, $active, $selectLevel)
    {
        $qr = "UPDATE Category SET
            name='$name',
            ordering='$ordering',
            active='$active',
            level='$selectLevel'
            WHERE id='$id'
        ";
        return mysqli_query($this->conn, $qr);
    }

    function Delete($id)
    {
        $qr = "DELETE FROM Category WHERE id='$id'";
        return mysqli_query($this->conn, $qr);
    } */
}
