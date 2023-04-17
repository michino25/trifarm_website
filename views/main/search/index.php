<link rel="stylesheet" href="<?php echo $index ?>/assets/css/search.css">
<?php require_once "navigatedLink.php" ?>

<?php
// breadcrumb
require_once "breadcrumb.php";
?>

<!-- content -->
<div class="content__container container">
    <div class="row g-3">

        <!-- filter -->
        <div class="col-lg-3 col-xl-2 m--0">
            <?php
            require_once "filter.php";
            ?>
        </div>

        <div class="col-lg-9 col-xl-10" style="position: relative; padding-bottom: 100px;">
            <!-- sort -->
            <div class="row g-3">
                <div class="col-xl-12">
                    <?php
                    require_once "sort.php";
                    ?>
                </div>
            </div>

            <!-- list_product -->
            <div class="row g-3 row-xl-cols-5 row-md-cols-4 row-sm-cols-3 row-cols-2 mt-0">
                <?php
                require_once "list_product.php";
                ?>
            </div>

            <div class="row g-3" style="position: absolute; bottom: 0; width: 100%;">
                <div class="col-xl-12">
                    <?php
                    require_once "pagination.php";
                    ?>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="<?php echo $index ?>/assets/js/formatPrice.js"></script>
<script src="<?php echo $index ?>/assets/js/search.js"></script>