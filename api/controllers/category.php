<?php
require_once "./api/models/_modelCategory.php";

function getData($array, $key, $defaultValue = '')
{
    return isset($array[$key]) ? $array[$key] : $defaultValue;
}

function echoJson($data)
{
    // Set the response header to JSON
    header('Content-Type: application/json');

    // Return the categories as JSON
    echo json_encode($data);
}

if ($endpoint === 'getallcategories') {

    // Get all categories
    $categories = getAllCategories();

    echoJson($categories);
}


if ($endpoint === 'getcategory') {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        // Get the category ID from the request parameters
        $id = $_GET['id'];

        // Get the category by ID
        $category = getCategory($id);

        echoJson($category);
    }
}
