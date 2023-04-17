<?php
require_once "modules/db_module.php";

class ModelCart
{
    function modifyCookie($name, $value)
    {
        // setcookie($name, '', time() - 1);
        setcookie($name, '', time() - 1, '/', '.x10.mx', false);
        setcookie($name, $value, time() + 86400, '/home', '.x10.mx', false);
        setcookie($name, $value, time() + 86400, '/detail', '.x10.mx', false);
        setcookie($name, $value, time() + 86400, '/search', '.x10.mx', false);
        setcookie($name, $value, time() + 86400, '/checkout', '.x10.mx', false);

        return;
    }

    function add($id, $quantity)
    {
        if (isset($_COOKIE['cart'])) {
            $cart = json_decode($_COOKIE['cart'], true);
            if (!isset($cart[$id])) {
                $cart[$id] = $quantity;
            } else {
                $cart[$id] += $quantity;
            }

            $this->modifyCookie('cart', json_encode($cart));
        }
    }

    function remove($id)
    {
        if (isset($_COOKIE['cart'])) {
            $cart = json_decode($_COOKIE['cart'], true);

            unset($cart[$id]);

            $this->modifyCookie('cart', json_encode($cart));
        }
    }

    function update($id, $quantity)
    {
        if (isset($_COOKIE['cart'])) {
            $cart = json_decode($_COOKIE['cart'], true);

            $cart[$id] = $quantity;

            $this->modifyCookie('cart', json_encode($cart));
        }
    }
}
