<?php
require_once "./api/modules/db_module.php";

$table = "tb_product";

// Function to get a product by ID
function getProduct($id)
{
    $table = "tb_product";
    $params = array("id" => $id);
    $result = genAndExecQuery($table, $params);

    return convertResultToArray($result);
}

// Function to get all products
function getAllProducts()
{
    $table = "tb_product";
    $result = genAndExecQuery($table, array());

    return convertResultToArray($result);
}

// Function to get a limited number of products with pagination
function getProductListLimit($num, $page)
{
    $table = "tb_product";
    $params = array();
    $page = ($page - 1) * $num;
    $limit = $page . ", " . $num;
    $result = genAndExecQuery($table, $params, $limit);

    return convertResultToArray($result);
}

// Function to get products by category
function getProductListByCategory($id_cate)
{
    $table = "tb_product";
    $params = array("id_category" => $id_cate);
    $result = genAndExecQuery($table, $params);

    return convertResultToArray($result);
}

// Function to get products by category
function searchProduct($name, $category, $location, $price, $star, $sort, $page)
{
    $params = [
        'name' => $name,
        'category' => $category,
        'location' => $location,
        'price' => $price,
        'star' => $star,
        'sort' => $sort,
        'page' => $page
    ];

    $result = genAndExecQuery('tb_product', $params, '', 'search');
    return convertResultToArray($result);
}

// CRUD
function addProduct($name, $desc, $img, $price, $location, $star, $review, $sold, $unit, $old_price, $id_category)
{
    $table = "tb_product";
    $params = array(
        "name" => $name,
        "desc" => $desc,
        "img" => $img,
        "price" => $price,
        "location" => $location,
        "star" => $star,
        "review" => $review,
        "sold" => $sold,
        "unit" => $unit,
        "old_price" => $old_price,
        "id_category" => $id_category
    );
    $result = genAndExecQuery($table, $params, null, 'insert');

    return $result;
}

function updateProduct($id, $name, $desc, $img, $price, $location, $star, $review, $sold, $unit, $old_price, $id_category)
{
    $table = "tb_product";
    $params = [
        'updates' => [
            "name" => $name,
            "desc" => $desc,
            "img" => $img,
            "price" => $price,
            "location" => $location,
            "star" => $star,
            "review" => $review,
            "sold" => $sold,
            "unit" => $unit,
            "old_price" => $old_price,
            "id_category" => $id_category
        ],
        'where' => ["id" => $id]
    ];
    $result = genAndExecQuery($table, $params, null, 'update');

    return $result;
}

function deleteProduct($id)
{
    $table = "tb_product";
    $conditions = array("id" => $id);
    $result = genAndExecQuery($table, $conditions, null, 'delete');

    return $result;
}
