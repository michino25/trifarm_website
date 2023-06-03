<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Trifarm Shop</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?php echo $index ?>/assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="<?php echo $index ?>/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?php echo $index ?>/assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo $index ?>/assets/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="<?php echo $index ?>/assets/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="<?php echo $index ?>/assets/vendors/css/vendor.bundle.base.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="<?php echo $index ?>/assets/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="<?php echo $index ?>/assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">

    <link rel="stylesheet" href="<?php echo $index ?>/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="<?php echo $index ?>/assets/js-admin/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?php echo $index ?>/assets/css/common.css">
    <link rel="stylesheet" href="<?php echo $index ?>/assets/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" type="image/png" href="https://i.imgur.com/oZszXME.png">

</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <?php require_once './views/admin/partials/navbar.php' ?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <?php require_once './views/admin/partials/sidebar.php' ?>
            <!-- partial -->
            <!-- page:pages/dashboard.php -->
            <div class="main-panel">
                <?php require_once './views/admin/pages/' . $endpoint . '.php' ?>
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="<?php echo $index ?>/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="<?php echo $index ?>/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="<?php echo $index ?>/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo $index ?>/assets/vendors/progressbar.js/progressbar.min.js"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?php echo $index ?>/assets/js-admin/off-canvas.js"></script>
    <script src="<?php echo $index ?>/assets/js-admin/hoverable-collapse.js"></script>
    <script src="<?php echo $index ?>/assets/js-admin/template.js"></script>
    <script src="<?php echo $index ?>/assets/js-admin/settings.js"></script>
    <script src="<?php echo $index ?>/assets/js-admin/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="<?php echo $index ?>/assets/js-admin/jquery.cookie.js" type="text/javascript"></script>
    <script src="<?php echo $index ?>/assets/js-admin/dashboard.js"></script>
    <script src="<?php echo $index ?>/assets/js-admin/Chart.roundedBarCharts.js"></script>
    <!-- End custom js for this page-->

    <script src="<?php echo $index ?>/assets/vendors/select2/select2.min.js"></script>
    <script src="<?php echo $index ?>/assets/js-admin/select2.js"></script>

    <script src="<?php echo $index ?>/assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <script src="<?php echo $index ?>/assets/js-admin/typeahead.js"></script>

    <script src="<?php echo $index ?>/assets/js-admin/style.js"></script>


</body>

</html>