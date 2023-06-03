<span>See in console</span>
<button class="btn btn-success" onclick="generateProductTable(products)"></button>
<div class="content-wrapper"></div>
<div class="pagination-wrapper"></div>
<script src="/assets/utilities/utilities.js"></script>
<script>
    async function fetchDataAndPrint(endpoint, params = '', getResult = false) {
        var method = 'GET';
        var link = 'http://localhost/API-backend-database/api/product/' + endpoint;
        var responseText = await ajaxQuery(method, link, params);

        try {
            let responseObject;
            responseObject = JSON.parse(responseText);
            if (!getResult) {
                console.log(responseObject);
                if (Array.isArray(responseObject)) {
                    var table = generateProductTable(responseObject);
                    var contentWrapper = document.querySelector('.content-wrapper');
                    contentWrapper.appendChild(table);
                } else {
                    console.error('Invalid response: products is not an array');
                }

            } else {
                return responseObject;
            }
        } catch (error) {
            console.error('Error parsing JSON:', error);
            // console.log(responseText);
        }
    }

    // Get a list of products with limit and page
    async function getProductListLimit(limit, page) {
        var endpoint = 'getproductlistlimit';
        var params = 'limit=' + limit + '&page=' + page;
        await fetchDataAndPrint(endpoint, params);
    }

    // Get a list of products with limit 10 and page 1
    getProductListLimit(20, 3);
    // console.log(products)

    function generateProductTable(products) {
        // Create a table element
        var table = document.createElement('table');

        // Iterate over the products array
        products.forEach(function(product) {
            // Create a table row for each product
            var row = table.insertRow();

            // Create cells for product details
            var imageCell = row.insertCell();
            var nameCell = row.insertCell();
            var priceCell = row.insertCell();
            var locationCell = row.insertCell();
            var categoryCell = row.insertCell();
            var actionCell = row.insertCell();

            // Set the content of each cell
            var image = document.createElement('img');
            image.src = product.img;
            image.width = 64; // Set the width to 64 pixels
            image.height = 64; // Set the height to 64 pixels
            imageCell.appendChild(image);

            nameCell.textContent = product.name;
            priceCell.textContent = product.price;
            locationCell.textContent = product.location;
            categoryCell.textContent = product.id_category;

            // Create edit button
            var editButton = document.createElement('button');
            editButton.textContent = 'Edit';
            editButton.classList.add('edit-button');

            // Create delete button
            var deleteButton = document.createElement('button');
            deleteButton.textContent = 'Delete';
            deleteButton.classList.add('delete-button');

            // Append the edit and delete buttons to the action cell
            actionCell.appendChild(editButton);
            actionCell.appendChild(deleteButton);

            // Add event listeners for edit and delete buttons
            editButton.addEventListener('click', function() {
                // Call the editProduct function passing the product ID
                editProduct(product.id);
            });

            deleteButton.addEventListener('click', function() {
                // Display the confirmation dialog
                var confirmDelete = confirm('Are you sure you want to delete this product?');
                if (confirmDelete) {
                    // Perform the delete operation
                    deleteProduct(product.id);
                }
            });

            // Hide the edit and delete buttons initially
            editButton.style.display = 'none';
            deleteButton.style.display = 'none';

            // Add event listeners for hover effect
            row.addEventListener('mouseenter', function() {
                editButton.style.display = 'inline';
                deleteButton.style.display = 'inline';
            });

            row.addEventListener('mouseleave', function() {
                editButton.style.display = 'none';
                deleteButton.style.display = 'none';
            });
        });

        // Return the generated table
        return table;
    }

    function editProduct(productId) {
        // Logic to edit the product
        // You can open a modal or navigate to an edit page with the product ID
        console.log('Editing product with ID:', productId);
    }

    function deleteProduct(productId) {
        // Logic to delete the product
        // You can make an API call or perform any other action here
        console.log('Deleting product with ID:', productId);
    }

    // Global variables to keep track of the current page and total number of pages
    var currentPage = 1;
    var totalPages = 0;

    // Function to fetch and print product data for a specific page
    async function fetchAndPrintProducts(pageNumber, pageSize) {
        try {
            var endpoint = 'getProductListLimit';
            var params = `limit=${pageSize}&page=${pageNumber}`;

            var products = await fetchDataAndPrint(endpoint, params, true);
            generateProductTable(products);

            // Update the total number of pages
            totalPages = Math.ceil(products.length / pageSize);

            // Print pagination buttons
            printPaginationButtons();
        } catch (error) {
            console.error(error);
        }
    }

    // Function to print pagination buttons
    function printPaginationButtons() {
        var paginationContainer = document.createElement('div');
        paginationContainer.classList.add('pagination-container');

        // Create previous button
        var previousButton = document.createElement('button');
        previousButton.innerHTML = 'Previous';
        previousButton.addEventListener('click', function() {
            previousPage();
        });
        paginationContainer.appendChild(previousButton);

        // Create next button
        var nextButton = document.createElement('button');
        nextButton.innerHTML = 'Next';
        nextButton.addEventListener('click', function() {
            nextPage();
        });
        paginationContainer.appendChild(nextButton);

        // Clear previous pagination buttons
        var paginationWrapper = document.querySelector('.pagination-wrapper');
        paginationWrapper.innerHTML = '';

        // Append pagination buttons to the pagination wrapper
        paginationWrapper.appendChild(paginationContainer);
    }

    // Function to navigate to the next page
    function nextPage() {
        if (currentPage < totalPages) {
            currentPage++;
            fetchAndPrintProducts(currentPage, 20);
        }
    }

    // Function to navigate to the previous page
    function previousPage() {
        if (currentPage > 1) {
            currentPage--;
            fetchAndPrintProducts(currentPage, 20);
        }
    }

    // Initial fetch and print of products for the first page
    fetchAndPrintProducts(currentPage, 20);
</script>