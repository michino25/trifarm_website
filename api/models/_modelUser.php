<?php
require_once './api/modules/db_module.php';

$table = 'tb_user';

function existsUsername($username)
{
    $table = 'tb_user';
    $params = array('username' => $username);
    $result = genAndExecQuery($table, $params, null, null, 'COUNT(*)');

    $count = mysqli_fetch_row($result)[0];
    return $count > 0;
}

function checkRoleShop($id, $username)
{
    $table = 'tb_user';
    $params = array(
        'id' => $id,
        'username' => $username,
        'role' => 'shop'
    );
    $result = genAndExecQuery($table, $params, null, null, 'COUNT(*)');

    $count = mysqli_fetch_row($result)[0];
    return $count > 0;
}

function SignUp($username, $password, $fullname)
{
    $table = 'tb_user';
    $params = array(
        'username' => $username,
        'password' => md5($password),
        'fullname' => $fullname,
        'note' => $password,
        'role' => 'user'
    );

    $result = genAndExecQuery($table, $params, null, 'insert');
    return $result;
}

function SignIn($username, $password)
{
    $table = 'tb_user';
    $params = array(
        'username' => $username,
        'password' => md5($password)
    );
    $result = genAndExecQuery($table, $params, null, null, 'id, username, fullname, role');

    return convertResultToArray($result);
}
