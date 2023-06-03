<!DOCTYPE html>
<html>

<head>
    <title>Product CRUD API Test</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        form {
            margin-bottom: 20px;
        }

        form h2 {
            margin-bottom: 10px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"] {
            width: 200px;
            padding: 5px;
            border-radius: 3px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            padding: 5px 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        span {
            display: block;
            text-align: center;
            margin-top: 20px;
            font-style: italic;
        }
    </style>

</head>

<body>
    <h1>Product CRUD API Test</h1>

    <form method="POST" action="addproduct">
        <h2>Add Product</h2>
        <label>Name:</label>
        <input type="text" name="name" value="Chuối demo" required><br>
        <label>Description:</label>
        <input type="text" name="desc" value="Miêu tả demo" required><br>
        <label>Image URL:</label>
        <input type="text" name="img" value="https://example.com/product-image.jpg" required><br>
        <label>Price:</label>
        <input type="text" name="price" value="10.99" required><br>
        <label>Location:</label>
        <input type="text" name="location" value="USA" required><br>
        <label>Star:</label>
        <input type="text" name="star" value="45" required><br>
        <label>Review:</label>
        <input type="text" name="review" value="100" required><br>
        <label>Sold:</label>
        <input type="text" name="sold" value="50" required><br>
        <label>Unit:</label>
        <input type="text" name="unit" value="Piece" required><br>
        <label>Old Price:</label>
        <input type="text" name="old_price" value="15.99" required><br>
        <label>Category ID:</label>
        <input type="text" name="id_category" value="1" required><br>
        <label>Username:</label>
        <input type="text" name="username" value="trifarmshop" required><br>
        <label>Id shop:</label>
        <input type="text" name="iduser" value="8" required><br>
        <input type="submit" value="Add Product">
    </form>

    <hr>

    <form method="POST" action="updateproduct">
        <h2>Update Product</h2>
        <label>Product ID:</label>
        <input type="text" name="id" id="productId" required><br>

        <label>Name:</label>
        <input type="text" name="name" required><br>
        <label>Description:</label>
        <textarea name="desc" required></textarea><br>
        <label>Image URL:</label>
        <input type="text" name="img" required><br>
        <label>Price:</label>
        <input type="text" name="price" required><br>
        <label>Location:</label>
        <input type="text" name="location" required><br>
        <label>Star:</label>
        <input type="text" name="star" required><br>
        <label>Review:</label>
        <input type="text" name="review" required><br>
        <label>Sold:</label>
        <input type="text" name="sold" required><br>
        <label>Unit:</label>
        <input type="text" name="unit" required><br>
        <label>Old Price:</label>
        <input type="text" name="old_price" required><br>
        <label>Category ID:</label>
        <input type="text" name="id_category" required><br>
        <label>Username:</label>
        <input type="text" name="username" value="trifarmshop" required><br>
        <label>Id shop:</label>
        <input type="text" name="iduser" value="8" required><br>

        <input type="submit" value="Update Product">
    </form>

    <hr>

    <form method="POST" action="deleteproduct">
        <h2>Delete Product</h2>
        <label>Product ID:</label>
        <input type="text" name="id" required><br>
        <label>Username:</label>
        <input type="text" name="username" value="trifarmshop" required><br>
        <label>Id shop:</label>
        <input type="text" name="iduser" value="8" required><br>
        <input type="submit" value="Delete Product">
    </form>

    <span>See result in console</span>

    <script src="http://localhost/API-backend-database/assets/utilities.js"></script>
    <script>
        async function fetchDataAndPrint(endpoint, params = '', method = 'GET', getResult = false) {
            var link = 'http://localhost/API-backend-database/api/product/' + endpoint;
            var responseText = await ajaxQuery(method, link, params);

            try {
                let responseObject;
                responseObject = JSON.parse(responseText);
                if (!getResult) {
                    console.log(responseObject);
                } else {
                    return responseObject;
                }
            } catch (error) {
                // console.error('Error parsing JSON:', error);
                console.log(responseText);
            }
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

        document.getElementById('productId').addEventListener('blur', async function(event) {
            var productId = this.value;
            // console.log(productId);
            productObject = await getProduct(productId);
            productObject = productObject[0];

            if (productObject) {
                const form = document.querySelector('form[action="updateproduct"]');

                if (productObject) {
                    form.querySelector('input[name="name"]').value = productObject.name;
                    form.querySelector('textarea[name="desc"]').value = productObject.desc;
                    form.querySelector('input[name="img"]').value = productObject.img;
                    form.querySelector('input[name="price"]').value = productObject.price;
                    form.querySelector('input[name="location"]').value = productObject.location;
                    form.querySelector('input[name="star"]').value = productObject.star;
                    form.querySelector('input[name="review"]').value = productObject.review;
                    form.querySelector('input[name="sold"]').value = productObject.sold;
                    form.querySelector('input[name="unit"]').value = productObject.unit;
                    form.querySelector('input[name="old_price"]').value = productObject.old_price;
                    form.querySelector('input[name="id_category"]').value = productObject.id_category;
                }
            }

        });

        // Get a single product by ID
        async function getProduct(id) {
            var endpoint = 'getproduct';
            var params = 'id=' + id;
            return await fetchDataAndPrint(endpoint, params, 'GET', true);
        }
    </script>
</body>

</html>