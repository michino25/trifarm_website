<?php
require_once "./api/models/_modelProduct.php";
require_once "./api/models/_modelUser.php";

function getData($array, $key, $defaultValue = '')
{
    return isset($array[$key]) ? $array[$key] : $defaultValue;
}

function echoJson($data)
{
    header("Access-Control-Allow-Origin: *");

    // Set the response header to JSON
    header('Content-Type: application/json');

    // Return the products as JSON
    echo json_encode($data);
}

if ($endpoint === 'getallproduct') {

    // Get all products
    $products = getAllProducts();

    echoJson($products);
}


if ($endpoint === 'getproduct') {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        // Get the product ID from the request parameters
        $id = $_GET['id'];

        // Get the product by ID
        $product = getProduct($id);

        echoJson($product);
    }
}

if ($endpoint === 'getproductlistlimit') {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        // Get the limit and page from the request parameters
        $limit = $_GET['limit'];
        $page = $_GET['page'];

        // Get the product list with limit
        $productList = getProductListLimit($limit, $page);

        echoJson($productList);
    }
}

if ($endpoint === 'getproductlistbycategory') {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        // Get the category ID from the request parameters
        $categoryId = $_GET['category_id'];

        // Get the product list by category
        $productList = getProductListByCategory($categoryId);

        echoJson($productList);
    }
}

if ($endpoint === 'searchproduct') {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        // Get the search parameters from the request parameters
        $name = getData($_GET, 'name');
        $category = getData($_GET, 'category');
        $location = getData($_GET, 'location', []);
        $price = getData($_GET, 'price', []);
        $star = getData($_GET, 'star');
        $sort = getData($_GET, 'sort');
        $page = getData($_GET, 'page', []);

        // Perform the product search
        $searchResult = searchProduct($name, $category, $location, $price, $star, $sort, $page);

        echoJson($searchResult);
    }
}

// CRUD

if ($endpoint === 'addproduct') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Extract the values from $_POST
        $username = $_POST['username'];
        $iduser = $_POST['iduser'];

        // Check if the role is 'shop'
        if (checkRoleShop($iduser, $username)) {

            $name = $_POST['name'];
            $desc = $_POST['desc'];
            $img = $_POST['img'];
            $price = $_POST['price'];
            $location = $_POST['location'];
            $star = $_POST['star'];
            $review = $_POST['review'];
            $sold = $_POST['sold'];
            $unit = $_POST['unit'];
            $old_price = $_POST['old_price'];
            $id_category = $_POST['id_category'];

            // Perform the add product action
            $addedProduct = addProduct($name, $desc, $img, $price, $location, $star, $review, $sold, $unit, $old_price, $id_category);

            // Return the added product or false if add failed
            echoJson($addedProduct);
        } else {
            // Role is not 'shop', return an error message
            echoJson("Unauthorized action. Only users with 'shop' role can add products.");
        }
    } else
        echoJson("Can't use method GET in this API endpoint");
}

if ($endpoint === 'updateproduct') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Extract the values from $_POST

        $username = $_POST['username'];
        $iduser = $_POST['iduser'];

        // Check if the role is 'shop'
        if (checkRoleShop($iduser, $username)) {

            $id = $_POST['id'];
            $name = $_POST['name'];
            $desc = $_POST['desc'];
            $img = $_POST['img'];
            $price = $_POST['price'];
            $location = $_POST['location'];
            $star = $_POST['star'];
            $review = $_POST['review'];
            $sold = $_POST['sold'];
            $unit = $_POST['unit'];
            $old_price = $_POST['old_price'];
            $id_category = $_POST['id_category'];

            // Perform the update product action
            $updatedProduct = updateProduct($id, $name, $desc, $img, $price, $location, $star, $review, $sold, $unit, $old_price, $id_category);

            // Return the updated product or false if update failed
            echoJson($updatedProduct);
        } else {
            // Role is not 'shop', return an error message
            echoJson("Unauthorized action. Only users with 'shop' role can update products.");
        }
    } else
        echoJson("Can't use method GET in this API endpoint");
}

if ($endpoint === 'deleteproduct') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Extract the product ID from $_POST

        $username = $_POST['username'];
        $iduser = $_POST['iduser'];

        // Check if the role is 'shop'
        if (checkRoleShop($iduser, $username)) {

            $id = $_POST['id'];

            // Perform the delete product action
            $deleteStatus = deleteProduct($id);

            // Return the delete status (true or false)
            echoJson($deleteStatus);
        } else {
            // Role is not 'shop', return an error message
            echoJson("Unauthorized action. Only users with 'shop' role can delete products.");
        }
    } else
        echoJson("Can't use method GET in this API endpoint");
}
