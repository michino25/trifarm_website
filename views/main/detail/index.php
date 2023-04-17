<link rel="stylesheet" href="<?php echo $index ?>/assets/css/detail.css">

<?php
// breadcrumb
require_once "breadcrumb.php";

// product
require_once "product.php";

// description
require_once "description.php";

// review
require_once "review.php";
?>

<script>
    document.title = "<?php echo $product->getName() ?> | TriFarm";
</script>