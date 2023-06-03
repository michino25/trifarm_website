<?php
require_once 'assets/utilities.php';

// Function to fetch data from a URL using fetch with GET parameters
function fetchDataGET($url, $params = array())
{
    $query = http_build_query($params);
    $urlWithParams = $url . '?' . $query;
    $response = file_get_contents($urlWithParams);
    return $response;
}

// Function to fetch data from a URL using fetch with POST parameters
function fetchDataPOST($url, $params = array())
{
    $postData = http_build_query($params);

    $options = array(
        'http' => array(
            'method' => 'POST',
            'header' => 'Content-Type: application/x-www-form-urlencoded',
            'content' => $postData
        )
    );

    $context = stream_context_create($options);
    $response = file_get_contents($url, false, $context);
    return $response;
}

// Example usage
// $endpoint = 'getallproduct';
// $params = array(
//     'key1' => 'value1',
//     'key2' => 'value2'
// );


// Get all product
// $endpoint = 'getallproduct';
// $params = [];


// Get a list of products with id 4
// $endpoint = 'getproduct';
// $params = array(
//     'id' => '4',
// );


// Get a list of products with limit 10 and page 1
$endpoint = 'getproductlistlimit';
$params = array(
    'limit' => '10',
    'page' => '1'
);

// Get a list of products by Search
// $endpoint = 'searchproduct';
// $params = array(
//     'name' => 'sữa',
//     'category' => '9',
//     'location' => ['Úc'],
//     'price' => [100000, 300000],
//     'star' => '4',
//     'sort' => 'price_asc',
//     'page' => [1, 20]
// );


// Get all category
// $endpoint = 'getallcategories';
// $params = [];


// Get category with id 9
// $endpoint = 'getcategory';
// $params = array(
//     'id' => '9',
// );


$url = 'http://localhost/API-backend-database/api/product/' . $endpoint;
// $url = 'http://localhost/API-backend-database/api/category/' . $endpoint;
$response = fetchDataGET($url, $params);
echo $response;

// print_r(getFilterSearch($response));
