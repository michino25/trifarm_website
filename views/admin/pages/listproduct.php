<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Danh sách sản phẩm</h4>
          <p class="card-description">
            Bạn có thể sửa hoặc xóa sản phẩm trong này
          </p>
          <div class="table-responsive">
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="pagination-wrapper align-items-center justify-content-center d-flex"></div>
</div>
<!-- content-wrapper ends -->


<script src="<?php echo $index ?>/assets/utilities/utilities-admin.js"></script>
<script>
  async function fetchData(endpoint, params = '', getResult = false) {
    var method = 'GET';
    var link = '<?php echo $index ?>/api/' + endpoint;
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
      console.error('Error parsing JSON:', error);
      // console.log(responseText);
    }
  }

  function generateProductTable(products) {
    var tableHtml = `
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Ảnh</th>
          <th>Tên sản phẩm</th>
          <th>Giá</th>
          <th>Xuất xứ</th>
          <th>Loại sản phẩm</th>
          <th> </th>
          <th> </th>
          <th> </th>
        </tr>
      </thead>
      <tbody>
    `;

    products.forEach(function(product) {
      tableHtml += `
      <tr>
        <td class="py-1">
          <img src="${product.img}" />
        </td>
        <td>${product.name}</td>
        <td>${formatPrice(product.price)} </td>
        <td>${product.location}</td>
        <td><label class="badge badge-${getCate(product.id_category).badge}">${getCate(product.id_category).cate}</label></td>
        <td> </td>
        <td> </td>
        <td> </td>
        <td class="table-action">
          <button type="button" class="btn btn-inverse-success btn-fw edit-button" data-product-id="${product.id}"
            onclick="editClick(this)">
            <i class="ri-edit-box-line"></i>
          </button>
          <button type="button" class="btn btn-inverse-danger btn-fw delete-button" data-product-id="${product.id}" 
            data-toggle="modal" data-target="#deleteModal" onclick="deleteClick(this)">
            <i class="ri-delete-bin-2-line"></i>
          </button>
        </td>
      </tr>
      `;
    });

    tableHtml += `
      </tbody>
    </table>
    `;

    // Append the table HTML to the content-wrapper div
    var tableWrapper = document.querySelector('.table-responsive');
    tableWrapper.innerHTML = tableHtml;
  }

  var categories = [];

  function getCate(id) {
    var category = categories.find(function(item) {
      return item.id === id.toString();
    });

    var badge;
    switch (Number(id)) {
      case 1:
      case 2:
      case 3:
      case 11:
        badge = 'success';
        break;
      case 4:
      case 5:
      case 8:
      case 10:
        badge = 'warning';
        break;
      case 6:
      case 7:
      case 9:
      case 12:
        badge = 'info';
        break;
      default:
        badge = 'danger';
    }

    return {
      cate: category ? category.name : '',
      badge: badge
    };
  }

  // Global variables to keep track of the current page and total number of pages
  var currentPage = 1;
  var totalPages = 10;
  var pageSize = 15;

  // Function to fetch and print product data for a specific page
  async function PrintProducts(pageNumber, pageSize, first = false) {
    try {
      if (first) {
        var allproducts = await fetchData('product/getallproduct', [], true);
        totalPages = Math.ceil(allproducts.length / pageSize);
        // console.log(totalPages);
        categories = await fetchData('category/getallcategories', [], true);
      }

      var endpoint = 'product/getProductListLimit';
      var params = `limit=${pageSize}&page=${pageNumber}`;

      var products = await fetchData(endpoint, params, true);
      generateProductTable(products);

      // Print pagination buttons
      printPagination(pageNumber);

    } catch (error) {
      console.error(error);
    }
  }

  // Function to print pagination buttons
  function printPagination(pageNumber) {
    var startPage = 1;
    if (pageNumber > 2) {
      startPage = pageNumber - 2;
    }
    if (startPage + 4 > totalPages) {
      startPage = totalPages - 4;
    }

    var pagination = `
    <div class="btn-group" role="group" aria-label="Basic example">
      <button onclick="goPage(${startPage + 0})" type="button" class="${startPage + 0 == pageNumber?'active':''} btn btn-outline-secondary">${startPage + 0}</button>
      <button onclick="goPage(${startPage + 1})" type="button" class="${startPage + 1 == pageNumber?'active':''} btn btn-outline-secondary">${startPage + 1}</button>
      <button onclick="goPage(${startPage + 2})" type="button" class="${startPage + 2 == pageNumber?'active':''} btn btn-outline-secondary">${startPage + 2}</button>
      <button onclick="goPage(${startPage + 3})" type="button" class="${startPage + 3 == pageNumber?'active':''} btn btn-outline-secondary">${startPage + 3}</button>
      <button onclick="goPage(${startPage + 4})" type="button" class="${startPage + 4 == pageNumber?'active':''} btn btn-outline-secondary">${startPage + 4}</button>
    </div>
    `;

    // Clear previous pagination buttons
    var paginationWrapper = document.querySelector('.pagination-wrapper');
    paginationWrapper.innerHTML = pagination;
  }

  // Function to navigate to the next page
  function goPage(page) {
    PrintProducts(page, pageSize);
  }

  // Print products for the first time
  PrintProducts(currentPage, pageSize, true);

  // Edit Button Click Event
  function editClick(button) {

    const productId = button.getAttribute('data-product-id');
    // Redirect to the new page with the productId as a parameter
    window.location.href = `/admin/editproduct?id=${productId}`;

  }

  function deleteClick(button) {

    var confirmDelete = confirm('Are you sure you want to delete this product?');
    if (confirmDelete) {
      const productId = button.getAttribute('data-product-id');

      console.log(productId + " is deleted");
    }

  }
</script>