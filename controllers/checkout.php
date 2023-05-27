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

    public function paymentMomo()
    {
        if (isset($_POST['momo'])) {
            // echo "HEEELEEEEEEEEEEEEEEEEEEEEEEEEEEEE";
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


            $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";


            $partnerCode = 'MOMOBKUN20180529';
            $accessKey = 'klm05TvNBzhg7h7j';
            $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
            $orderInfo = "Thanh toán Trifarm";
            $amount = "10000";
            $orderId = time() . "";
            $redirectUrl = "https://trifarm.x10.mx/";
            $ipnUrl = "https://trifarm.x10.mx/";
            $extraData = "";


            if (!empty($_POST)) {
                $partnerCode = $partnerCode;
                $accessKey = $accessKey;
                $serectkey = $secretKey;
                $orderId = $orderId; // Mã đơn hàng
                $orderInfo = "Thanh toan Trifarm";
                $amount = $amount;
                $ipnUrl = $ipnUrl;
                $redirectUrl = $redirectUrl;
                $extraData = $extraData;

                $requestId = time() . "";
                $requestType = "captureWallet";
                $extraData = ($extraData ? $extraData : "");
                //before sign HMAC SHA256 signature
                $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
                $signature = hash_hmac("sha256", $rawHash, $serectkey);
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
                $result = execPostRequest($endpoint, json_encode($data));
                $jsonResult = json_decode($result, true);  // decode json

                //Just a example, please check more in there

                header('Location: ' . $jsonResult['payUrl']);
            }
        } else {
        }
    }
}
