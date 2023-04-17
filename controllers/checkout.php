<?php

require_once "models/product.php";
require_once "models/_modelProduct.php";
require_once "models/_modelCategory.php";
require_once "models/_modelCart.php";

class checkout
{

    public $ModelProduct;
    public $ModelCategory;
    public $ModelCart;

    function __construct()
    {
        $this->ModelProduct = new ModelProduct();
        $this->ModelCategory = new ModelCategory();
        $this->ModelCart = new ModelCart();
    }

    public function cart($data)
    {
        if (isset($data['index'])) {
            $index = $data['index'];
            $imglink = $data['imgLink'];

            $total = 0;
            $cart = json_decode($_COOKIE['cart'], true);
            $products = [];

            foreach ($cart as $id => $quantity) {
                $product = $this->ModelProduct->getProduct($id);
                array_push($products, $product);
                $total += $quantity * $product->getPrice();
            }

            $info = ['cart', 'checkout'];

            include "views/basepage.php";
        } else {
            $error_log = "detail - unset data";
            include "views/notfound/notfound.php";
        }
    }

    public function modifycart($data)
    {
        if (isset($_POST['action'])) {
            switch ($_POST['action']) {

                case "addtocart":
                    $this->ModelCart->add($_POST['id'], $_POST['quantity']);
                    header("Location: cart");
                    break;

                case "updatecart":
                    if ($_POST['quantity'] != 0)
                        $this->ModelCart->update($_POST['id'], $_POST['quantity']);
                    else
                        $this->ModelCart->remove($_POST['id']);

                    header("Location: cart");
                    break;

                case "removeformcart":
                    $this->ModelCart->remove($_POST['id']);
                    header("Location: cart");
                    break;

                default:
                    header("Location: index.php");
                    break;
            }
        } else
            header("Location: index.php");
    }
}
