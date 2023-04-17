<?php

require_once "models/_modelProduct.php";
require_once "models/_modelCategory.php";
require_once "models/_modelCart.php";

class home
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

    public function index($data)
    {
        if (isset($data['index'])) {
            $index = $data['index'];
            $imglink = $data['imgLink'];


            if (!isset($_COOKIE['cart'])) {
                $this->ModelCart->setCookie('cart', json_encode([]));
                $cart = [];
            } else
                $cart = json_decode($_COOKIE['cart'], true);

            $categories = $this->ModelCategory->getCategoryList();
            $recommends = $this->ModelProduct->searchProduct("", "", [""], ["", ""], "", "default", 1, 18);
            $hotsale = $this->ModelProduct->searchProduct("", "", [""], ["", ""], "", "biggest_discount", 1, 6);
            $info = ['home', 'index'];

            include "views/basepage.php";
        } else {
            $error_log = "home - unset data";
            include "views/notfound/notfound.php";
        }
    }

    public function load_recommend($data)
    {
        if (isset($data['page'])) {
            $index = $data['index'];
            $page = $data['page'];
            $productAddPerTime = 18;

            $addRecommends = $this->ModelProduct->searchProduct("", "", [""], ["", ""], "", "default", $page, $productAddPerTime);

            foreach ($addRecommends as $product) {
                echo "
            <div class='col-6 col-md-4 col-lg-3 col-xl-2'>
                <a href='" . $index . "/detail/product/id=" . $product->getId() . "' class='card'>
                    <div style='background: center / contain no-repeat url(" . $product->getImg() . ");' class='card-img-top'></div>
                    <div class='card-body'>
                        <h5 class='product__name'>" . $product->getName() . "</h5>
    
                        <div class='product__rating'>";
                $storeStar = $product->getStar() * 10;
                for ($i = 0; $i < 5; $i++) {
                    if ($storeStar >= 100) {
                        echo "<i class='product__rating-yellow ri-star-fill'></i>";
                        $storeStar -= 100;
                    } else {
                        echo "<i class='product__rating-yellow ri-star-fill' style='--star-percent: " . $storeStar . "%;'></i>";
                        $storeStar = 0;
                    }
                };
                echo "</div>
                        <div class='product__price'>
                            <p class='product__price-old'>" . $product->getOldPrice() . "</p>
                            <p class='product__price-new'>" . $product->getPrice() . "</p>
                        </div>
                        <p class='product__sold'>Đã bán " . $product->getSold() . "</p>
                    </div>
                </a>
            </div>
            <script src='" . $index . "/assets/js/formatPrice.js'></script>";
            }
        }
    }
}
