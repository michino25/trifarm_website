<?php
require_once "models/user.php";
require_once "modules/db_module.php";

class ModelUser
{

    function SignUp($username, $password, $fullname)
    {
        executeQuery(
            "INSERT INTO tb_user VALUES( NULL,
            '" . stringSQL($username) . "',
            '" . md5($password) . "',
            '" . stringSQL($fullname) . "',
            '" . stringSQL($password) . "',
            '" . stringSQL("user") . "'
            )"
        );
    }

    function SignIn($username, $password)
    {
        $account = "";
        $result = executeQuery("SELECT * FROM tb_user WHERE 
            username='" . stringSQL($username) . "' AND password='" . md5($password) . "'");
        $row = mysqli_fetch_row($result);
        mysqli_free_result($result);

        if ($row != NULL) {
            $account = array(
                "id" => $row[0],
                "username" => $row[1],
                "fullname" => $row[3],
                "role" => $row[5],
            );
            $_SESSION['account'] = $account;
            return true;
        } else
            return false;
    }

    function SignOut()
    {
        if (isset($_SESSION['account'])) {
            unset($_SESSION['account']);
            return true;
        } else
            return false;
    }

    public function existsUsername($username)
    {
        $result = executeQuery("SELECT count(*) FROM tb_user WHERE username='" . $username . "'");
        $row = mysqli_fetch_row($result);
        mysqli_free_result($result);
        return $row[0] > 0;
    }
}
