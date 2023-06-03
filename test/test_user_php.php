<!DOCTYPE html>
<html>

<head>
    <title>User API Test</title>
</head>

<body>
    <h1>User API Test</h1>
    <form method="POST" action="">
        <h2>SignUp</h2>
        <label>Username:</label>
        <input type="text" name="signup_username" required><br>
        <label>Password:</label>
        <input type="password" name="signup_password" required><br>
        <label>Full Name:</label>
        <input type="text" name="signup_fullname" required><br>
        <input type="submit" value="SignUp">
    </form>

    <hr>

    <form method="POST" action="">
        <h2>SignIn</h2>
        <label>Username:</label>
        <input type="text" name="signin_username" required><br>
        <label>Password:</label>
        <input type="password" name="signin_password" required><br>
        <input type="submit" value="SignIn">
    </form>

    <hr>

    <form method="POST" action="">
        <h2>Check existsUsername</h2>
        <label>Username:</label>
        <input type="text" name="check_username" required><br>
        <input type="submit" value="Check">
    </form>
</body>

</html>

<?php

// Function to fetch data from a URL using fetch with GET parameters
function fetchDataGET($url, $params = array())
{
    $query = http_build_query($params);
    $urlWithParams = $url . '?' . $query;
    $response = file_get_contents($urlWithParams);
    return $response;
}

// Function to fetch data from a URL using fetch with POST parameters
function fetchDataPOST($url, $params = array())
{
    $postData = http_build_query($params);

    $options = array(
        'http' => array(
            'method' => 'POST',
            'header' => 'Content-Type: application/x-www-form-urlencoded',
            'content' => $postData
        )
    );

    $context = stream_context_create($options);
    $response = file_get_contents($url, false, $context);
    return $response;
}

// API URLs
$signupUrl = 'http://localhost/API-backend-database/api/user/signup';
$signinUrl = 'http://localhost/API-backend-database/api/user/signin';
$existsUsernameUrl = 'http://localhost/API-backend-database/api/user/existsusername';

// Check if SignUp form submitted
if (isset($_POST['signup_username'], $_POST['signup_password'], $_POST['signup_fullname'])) {
    $signupParams = array(
        'username' => $_POST['signup_username'],
        'password' => $_POST['signup_password'],
        'fullname' => $_POST['signup_fullname']
    );
    $signupResponse = fetchDataPOST($signupUrl, $signupParams);
    echo 'SignUp Response: ' . $signupResponse . '<br>';
}

// Check if SignIn form submitted
if (isset($_POST['signin_username'], $_POST['signin_password'])) {
    $signinParams = array(
        'username' => $_POST['signin_username'],
        'password' => $_POST['signin_password']
    );
    $signinResponse = fetchDataPOST($signinUrl, $signinParams);
    echo 'SignIn Response: ' . $signinResponse . '<br>';
}

// Check if Check existsUsername form submitted
if (isset($_POST['check_username'])) {
    $existsUsernameParams = array(
        'username' => $_POST['check_username']
    );
    $existsUsernameResponse = fetchDataGET($existsUsernameUrl, $existsUsernameParams);
    echo 'existsUsername Response: ' . $existsUsernameResponse . '<br>';
}
