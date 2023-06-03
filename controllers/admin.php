<?php

class admin
{

    function __construct()
    {
    }


    function getEndpoint($data)
    {
        // $data['endpoint'] = getproduct?id=3
        $dataParts = explode('?', $data['endpoint']);
        $endpoint = strtolower($dataParts[0]);

        switch ($endpoint) {
            case 'check':
            case 'package':
            case 'delivery':
            case 'done':
                $endpoint = 'order';
                break;
            case '':
                $endpoint = 'dashboard';
        }

        return $endpoint;
    }

    public function default($data)
    {
        if (isset($data['index'])) {
            $endpoint = $this->getEndpoint($data);
            $index = $data['index'];
            include "views/admin/basepage-admin.php";
        } else {
            $error_log = "detail - unset data";
            include "views/notfound/notfound.php";
        }
    }
}
