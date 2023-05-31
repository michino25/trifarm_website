<?php

require_once "models/product.php";
require_once "models/_modelProduct.php";
require_once "models/_modelCategory.php";
require_once "models/_modelCart.php";
session_start();

class checkout
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

    public function cart($data)
    {
        if (isset($data['index'])) {
            $index = $data['index'];
            $imglink = $data['imgLink'];

            $total = 0;
            $cart = json_decode($_COOKIE['cart'], true);
            $products = [];

            foreach ($cart as $id => $quantity) {
                $product = $this->ModelProduct->getProduct($id);
                array_push($products, $product);
                $total += $quantity * $product->getPrice();
            }

            $info = ['cart', 'checkout'];

            include "views/basepage.php";
        } else {
            $error_log = "detail - unset data";
            include "views/notfound/notfound.php";
        }
    }

    public function modifycart($data)
    {
        if (isset($_POST['action'])) {
            switch ($_POST['action']) {

                case "addtocart":
                    $this->ModelCart->add($_POST['id'], $_POST['quantity']);
                    header("Location: cart");
                    break;

                case "updatecart":
                    if ($_POST['quantity'] != 0)
                        $this->ModelCart->update($_POST['id'], $_POST['quantity']);
                    else
                        $this->ModelCart->remove($_POST['id']);

                    header("Location: cart");
                    break;

                case "removeformcart":
                    $this->ModelCart->remove($_POST['id']);
                    header("Location: cart");
                    break;

                default:
                    header("Location: index.php");
                    break;
            }
        } else
            header("Location: index.php");
    }

    public function momopayment($data)
    {
        if (isset($_POST['momo'])) {

            $index = $data['index'];

            // Phần tùy chỉnh
            $orderInfo = "Thanh toán đơn hàng Trifarm";
            $total = $_POST['total'];
            $redirectUrl = $index;
            $ipnUrl = $redirectUrl;

            $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
            $data = $this->dataToCallAPI($orderInfo, $total, $redirectUrl, $ipnUrl);

            $result = $this->execPostRequest($endpoint, json_encode($data));
            $jsonResult = json_decode($result, true);  // decode json

            // Dẫn đến trang thanh toán Momo
            header('Location: ' . $jsonResult['payUrl']);
        } else {

            echo "Đã có lỗi xảy ra";
        }
    }

    function readKeyAndDecrypt()
    {

        $encryptionKey = "myEncryptionKey";

        // Read the JSON file
        $encryptedData = [
            'encryptedText' => 'SGhkZmpSNU01TzVBNDhvSUMvVW96R0RabnBBTW1TK3ZpaUE0RlRUbWN5OGRheUFKOVVVT3BQcXdxVWxYaHc1NE9KUDhQWXVJdUFVTUhqdjlwZ283Ymc9PQ==',
            'iv' => 'P9YGe2\/JzikoOJ1CDsXBLg==',
        ];

        // Retrieve the encrypted text and initialization vector
        $encryptedText = base64_decode($encryptedData['encryptedText']);
        $iv = base64_decode($encryptedData['iv']);

        // Decrypt the text using AES-256-CBC
        $decryptedJson = openssl_decrypt($encryptedText, 'AES-256-CBC', $encryptionKey, 0, $iv);

        // Convert the decrypted JSON back to an array
        $data = json_decode($decryptedJson, true);

        return $data['secretKey'];
    }

    function dataToCallAPI($orderInfo, $amount, $redirectUrl, $ipnUrl)
    {
        // Mặc định Momo
        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = $this->readKeyAndDecrypt();
        $orderId = time() . ""; // Mã đơn hàng
        $requestId = time() . "";
        $extraData = "";
        $requestType = "captureWallet";

        //before sign HMAC SHA256 signature
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);

        $data = array(
            'partnerCode' => $partnerCode,
            'partnerName' => "Test",
            "storeId" => "MomoTestStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature
        );
        return $data;
    }

    function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            )
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }
}
