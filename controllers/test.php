<?php

// require_once "models/_modelProduct.php";
// require_once "models/_modelCategory.php";
// require_once "models/_modelCart.php";

class test
{
    // public $ModelProduct;
    // public $ModelCategory;
    // public $ModelCart;

    function __construct()
    {
        // $this->ModelProduct = new ModelProduct();
        // $this->ModelCategory = new ModelCategory();
        // $this->ModelCart = new ModelCart();
    }

    public function test_js($data)
    {
        include 'test/test_js.php';
    }

    public function test_php($data)
    {
        include 'test/test_php.php';
    }

    public function test_user_js($data)
    {
        include 'test/test_user_js.php';
    }

    public function test_user_php($data)
    {
        include 'test/test_user_php.php';
    }

    public function test_admin_js($data)
    {
        include 'test/test_admin_js.php';
    }
}
