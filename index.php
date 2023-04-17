<?php
require_once "controllers/controller.php";

if (!isset($_COOKIE['cart']))
    setcookie('cart', json_encode([]), time() + 86400); // cookie sống được 1 ngày thì bị huỷ

$controller = new Controller();
$controller->invoke();
