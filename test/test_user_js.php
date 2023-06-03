<!DOCTYPE html>
<html>

<head>
    <title>User API Test</title>
</head>

<body>
    <h1>User API Test</h1>
    <form method="POST" action="signup">
        <h2>SignUp</h2>
        <label>Username:</label>
        <input type="text" name="username" required><br>
        <label>Password:</label>
        <input type="password" name="password" required><br>
        <label>Full Name:</label>
        <input type="text" name="fullname" required><br>
        <input type="submit" value="SignUp">
    </form>

    <hr>

    <form method="POST" action="signin">
        <h2>SignIn</h2>
        <label>Username:</label>
        <input type="text" name="username" required><br>
        <label>Password:</label>
        <input type="password" name="password" required><br>
        <input type="submit" value="SignIn">
    </form>

    <hr>

    <form method="GET" action="existsusername">
        <h2>Check existsUsername</h2>
        <label>Username:</label>
        <input type="text" name="username" required><br>
        <input type="submit" value="Check">
    </form>

    <span>See result in console</span>

    <script src="http://localhost/API-backend-database/assets/utilities.js"></script>
    <script>
        // // Function to fetch data and print the response
        async function fetchDataAndPrint(endpoint, params = '', method = 'GET') {
            var link = 'http://localhost/API-backend-database/api/user/' + endpoint;
            var responseText = await ajaxQuery(method, link, params);

            // console.log(responseText);
            var responseObject = JSON.parse(responseText);
            console.log(responseObject);
        }

        document.querySelectorAll('form').forEach(function(form) {
            form.addEventListener('submit', async function(event) {
                event.preventDefault(); // Prevent the form from submitting normally

                // Get the form attributes
                var endpoint = form.getAttribute('action');
                var method = form.getAttribute('method');

                // Create FormData object from the form data
                var formData = new FormData(form);

                // Convert FormData to URL-encoded string
                var params = new URLSearchParams(formData).toString();

                // Call the fetchDataAndPrint function to handle the form submission
                await fetchDataAndPrint(endpoint, params, method);
            });
        });
    </script>
</body>

</html>