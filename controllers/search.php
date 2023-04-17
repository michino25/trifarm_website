<?php

// require_once "models/product.php";
require_once "models/_modelProduct.php";
require_once "models/_modelCategory.php";

class search
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
        if (isset($data['index']) && isset($data['keyword'])) {

            // lấy data từ controller link 
            $index = $data['index'];
            $keyword = $data['keyword'];
            $category = $data['category'];
            $sort = $data['sort'];
            $location = $data['location'];
            $star = $data['star'];
            $price = $data['price'];
            $page = $data['page'] == "" ? 1 : $data['page'];
            $imglink = $data['imgLink'];
            $cart = json_decode($_COOKIE['cart'], true);

            // Xử lý data
            $locationArr = explode('-', $location);
            $priceArr = str_replace("_", "", $price);
            $priceArr = explode('-', $priceArr);

            // lấy điều kiện chạy filter
            $filter = $this->ModelProduct->searchFilter($keyword);

            $cateList = $filter['category'];
            $locaList = $filter['location'];
            $priceList = $filter['price'];
            $priceList['max'] = number_format($priceList['max'], 0, ',', '.');
            $priceList['min'] = number_format($priceList['min'], 0, ',', '.');

            // Xử lý chạy phân trang
            $productPerPage = 20;
            $totalProduct = count($this->ModelProduct->searchProduct($keyword, $category, $locationArr, $priceArr, $star, $sort, 0, 0));
            $totalPage = ceil($totalProduct / $productPerPage);

            // Lấy sản phẩm lọc
            $products = $this->ModelProduct->searchProduct($keyword, $category, $locationArr, $priceArr, $star, $sort, $page, $productPerPage);

            $info = ['search', 'product'];

            include "views/basepage.php";
        } else {
            $error_log = "search - unset data";
            include "views/notfound/notfound.php";
        }
    }
}
