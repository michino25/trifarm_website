<?php

class Controller
{
    public $model;
    protected $controller = 'home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
    }

    public function invoke()
    {

        // header("Location: $index");
        // http://www.example.com/[detail/product/id=5]
        // http://www.example.com/[search/product/name=nho~category=1~location=vietnam~price=100-300~star=4~option=new]

        $url = [];

        $this->params = [[
            "imgLink" => json_decode(file_get_contents($_SERVER["DOCUMENT_ROOT"] . '/assets/json/data.json'), true),
            "index" => $this->getURL(1)
        ]];

        // Xử lý URL
        if (isset($_GET["url"])) {
            $urlString = trim($_GET["url"]);
            $urlString = filter_var($urlString, FILTER_SANITIZE_URL);

            $urlParts = explode("/", $urlString);
            $page = $urlParts[0];
            $url[] = $page;

            if (isset($urlParts[1])) {
                $method = $urlParts[1];
                $url[] = $method;
            }

            if (isset($urlParts[2])) {
                $param = $urlParts[2];
                $url[] = $param;
            }
        } else {
            // Nếu không có URL, chuyển hướng đến một vị trí cụ thể
            header('Location: ' . $this->params[0]['index'] . '/home');
        }


        // ngoại lệ url
        if ($url[0] == 'home' && !isset($url[1]))
            $url = ['home', 'index'];

        // xử lý ngoại lệ url khi là API
        if ($url[0] == 'api') {
            $this->controller = $url[0];
            require_once "./controllers/" . $this->controller . ".php";
            $this->controller = new $this->controller;

            $this->method = $url[1];
            $this->params = [
                'endpoint' => $url[2]
            ];
            call_user_func_array([$this->controller, $this->method], [$this->params]);
        } else
            // xử lý controller không tìm thấy trang + gọi hàm kiểm tra url
            if (!$this->checkValidController($url)) {
                $imglink = $this->params[0]['imgLink'];
                $index = $this->getURL(1);
                $error_log = "controller - error url";
                include "views/notfound/notfound.php";
            } else {
                // gọi hàm dẫn đến controller phụ (home, detail, search) 
                call_user_func_array([$this->controller, $this->method], $this->params);
            }
    }

    // kiểm tra url có hướng đến controller nào không
    public function checkValidController($url)
    {
        if (isset($url[0]) && file_exists("./controllers/" . $url[0] . ".php")) {
            $this->controller = $url[0];

            require_once "./controllers/" . $this->controller . ".php";
            $this->controller = new $this->controller;

            // Method
            if (isset($url[1]) && method_exists($this->controller, $url[1])) {
                $this->method = $url[1];

                // Params
                if (isset($url[2])) {
                    if ($this->getParams($url[2]))
                        $this->params = [$this->getParams($url[2])];
                    else return false;
                };
            } else return false;
        } else return false;

        return true;
    }

    // lấy data params
    public function getParams($rawString)
    {
        $params = [
            "id" => "",
            "keyword" => "",
            "category" => "",
            "location" => "",
            "price" => "",
            "star" => "",
            "sort" => "",
            "page" => "",
            "imgLink" => json_decode(file_get_contents($_SERVER["DOCUMENT_ROOT"] . '/assets/json/data.json'), true),
            "index" => $this->getURL(1)
        ];

        $rawArr = explode("~", $rawString);
        foreach ($rawArr as $element) {
            $temp = explode("=", $element);
            if (array_key_exists($temp[0], $params)) {
                if ($temp[0] == 'keyword' || $temp[0] == 'location') {
                    // keyword và location được mã hoá do có tiếng Việt
                    if ($temp[1] != "") {
                        // Decode Base64
                        $decodeBase64 = base64_decode(strstr($element, $temp[1]));
                        // Decode URI
                        $decodeURI = urldecode($decodeBase64);
                    } else {
                        $decodeURI = $temp[1];
                    }
                } else {
                    $decodeURI = $temp[1];
                }
                $params[$temp[0]] = $decodeURI;
            } else {
                return false;
            }
        }

        return $params;
    }

    public function getURL($option)
    {
        $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $url = explode('/', $url);
        if ($option == 0)
            $url = $url[0] . '//' . $url[2] . '/' . $url[3];
        else
            $url = $url[0] . '//' . $url[2];
        return $url;
    }
}
