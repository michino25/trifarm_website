<?php
function getFilterSearch($jsonData)
{
    // Decode the JSON data into an array
    $array = json_decode($jsonData, true);

    // Get unique categories
    $categories = array_unique(array_column($array, 'id_category'));

    // Get unique locations
    $locations = array_unique(array_column($array, 'location'));

    // Get the minimum and maximum prices
    $prices = array_column($array, 'price');
    $prices = array_map('intval', $prices); // Convert prices to integers
    $minPrice = min($prices);
    $maxPrice = max($prices);

    // Return the results as an associative array
    return array(
        'categories' => $categories,
        'locations' => $locations,
        'minPrice' => $minPrice,
        'maxPrice' => $maxPrice
    );
}
