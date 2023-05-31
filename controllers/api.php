<?php

class api
{

    function __construct()
    {
    }

    function getEndpoint($data)
    {
        // $data['endpoint'] = getproduct?id=3
        $dataParts = explode('?', $data['endpoint']);
        $endpoint = strtolower($dataParts[0]);

        return $endpoint;
    }

    public function product($data)
    {
        $endpoint = $this->getEndpoint($data);
        include 'api/controllers/product.php';
    }

    public function category($data)
    {
        $endpoint = $this->getEndpoint($data);
        include 'api/controllers/category.php';
    }

    public function user($data)
    {
        $endpoint = $this->getEndpoint($data);
        include 'api/controllers/user.php';
    }
}
