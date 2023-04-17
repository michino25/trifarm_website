<?php

require_once "models/_modelProduct.php";
require_once "models/_modelCategory.php";

class detail
{

    public $ModelProduct;
    public $ModelCategory;

    function __construct()
    {
        $this->ModelProduct = new ModelProduct();
        $this->ModelCategory = new ModelCategory();
    }

    public function product($data)
    {
        if (isset($data['index']) && isset($data['id'])) {
            $index = $data['index'];
            $id = $data['id'];
            $imglink = $data['imgLink'];

            $cart = json_decode($_COOKIE['cart'], true);
            $product = $this->ModelProduct->getProduct($id);

            if ($product == null) {
                $error_log = "detail - product null";
                include "views/notfound/notfound.php";
            } else {
                $category = $this->ModelCategory->getCategory($product->getIdCategory());
                $info = ['detail', 'product'];

                include "views/basepage.php";
            }
        } else {
            $error_log = "detail - unset data";
            include "views/notfound/notfound.php";
        }
    }
}
