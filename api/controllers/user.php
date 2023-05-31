<?php
require_once "./api/models/_modelUser.php";

function getData($array, $key, $defaultValue = '')
{
    return isset($array[$key]) ? $array[$key] : $defaultValue;
}

function echoJson($data)
{
    // Set the response header to JSON
    header('Content-Type: application/json');

    // Return the categories as JSON
    echo json_encode($data);
}

if ($endpoint === 'existsusername') {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        // Get the username from the request parameters
        $username = $_GET['username'];

        // Check if the username exists
        $exists = existsUsername($username);

        echoJson($exists);
    }
}

if ($endpoint === 'signup') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Get the username and password and fullname from the request parameters
        $username = $_POST['username'];
        $password = $_POST['password'];
        $fullname = $_POST['fullname'];

        // Sign up the user
        SignUp($username, $password, $fullname);

        // Return success response
        echoJson(['message' => 'User signed up successfully']);
    }
}

if ($endpoint === 'signin') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Get the username and password from the request parameters
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Sign in the user
        $account = SignIn($username, $password);

        // Return the account information or false if sign-in failed
        echoJson($account);
    }
}
