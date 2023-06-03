<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <span>See in console</span>

    <script src="https://trifarm.epizy.com/assets/utilities/utilities.js"></script>
    <script>
        function objectToParams(params) {
            var searchParams = new URLSearchParams();

            // Iterate over each property in the params object
            for (var key in params) {
                if (params.hasOwnProperty(key)) {
                    var value = params[key];

                    // Check if the value is an array
                    if (Array.isArray(value)) {
                        // Iterate over each element in the array and append it to the query string
                        value.forEach(function(element) {
                            searchParams.append(key + '[]', element);
                        });
                    } else {
                        // Append the single value to the query string
                        searchParams.append(key, value);
                    }
                }
            }

            return searchParams.toString();
        }

        async function fetchDataAndPrint(endpoint, params = '') {
            try {
                var method = 'GET';
                var link = 'https://trifarm.epizy.com/api/product/' + endpoint;

                var responseText = await ajaxQuery(method, link, params);

                // console.log(responseText);

                var responseObject = JSON.parse(responseText);
                console.log(responseObject);

                // JSON.stringify(responseObject, null, 2)
                // console.log(responseObject[0]);
            } catch (error) {
                console.error(error);
            }
        }

        // Get a single product by ID
        async function getAllProduct() {
            var endpoint = 'getallproduct';
            var params = '';
            await fetchDataAndPrint(endpoint, params);
        }

        // Get a single product by ID
        async function getProduct(id) {
            var endpoint = 'getproduct';
            var params = 'id=' + id;
            await fetchDataAndPrint(endpoint, params);
        }

        // Get a list of products with limit and page
        async function getProductListLimit(limit, page) {
            var endpoint = 'getproductlistlimit';
            var params = 'limit=' + limit + '&page=' + page;
            await fetchDataAndPrint(endpoint, params);
        }

        // Get a list of products by category
        async function getProductListByCategory(categoryId) {
            var endpoint = 'getproductlistbycategory';
            var params = 'category_id=' + categoryId;
            await fetchDataAndPrint(endpoint, params);
        }

        // Perform a product search
        async function searchProduct(params) {
            var endpoint = 'searchproduct';

            // Construct the query parameters
            // var params = new URLSearchParams(params).toString();
            var params = objectToParams(params);

            await fetchDataAndPrint(endpoint, params);
        }


        // Get all product
        // getAllProduct();

        // Get a single product with ID 1
        // getProduct(1);

        // Get a list of products with limit 10 and page 1
        // getProductListLimit(10, 1);

        // Get a list of products in category 5
        getProductListByCategory(5);

        // Get a list of products by Search
        // var params = {
        //     name: 'sữa',
        //     category: '9',
        //     location: ['Úc', 'Việt Nam'],
        //     price: [100000, 300000],
        //     star: '4',
        //     sort: 'price_asc',
        //     page: [1, 20]
        // };
        // searchProduct(params)
    </script>
</body>

</html>