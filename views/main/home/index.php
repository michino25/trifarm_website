<link rel="stylesheet" href="<?php echo $index ?>/assets/css/home.css">

<?php

// banner
require_once "banner.php";

// giá sốc hôm nay
require_once "hotsale.php";

// danh mục nổi bật
require_once "category.php";

// gợi ý cho bạn
require_once "recommend.php";

// Tin tức
require_once "news.php";

// Kênh người bán
if (isset($_SESSION['account']) && $_SESSION['account']['role'] == 'shop')
    require_once "myshop.php";

?>

<script src="<?php echo $index ?>/assets/js/formatPrice.js"></script>