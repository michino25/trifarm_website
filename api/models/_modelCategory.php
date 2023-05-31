<?php
require_once "./api/modules/db_module.php";

$table = "tb_category";

// Function to get a product by ID
function getCategory($id)
{
    $table = "tb_category";
    $params = array("id" => $id);
    $result = genAndExecQuery($table, $params);

    return convertResultToArray($result);
}

// Function to get all products
function getAllCategories()
{
    $table = "tb_category";
    $result = genAndExecQuery($table, array());

    return convertResultToArray($result);
}
