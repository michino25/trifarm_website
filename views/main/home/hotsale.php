<!-- content Giá sốc hôm nay -->
<div class="content__container container">
    <h3 class="content__header row">
        <div class="flashsale_title__col col-12 col-sm">
            <i class="content__header-icon ri-flashlight-fill"></i>
            Giá sốc hôm nay
        </div>
        <div class="flashsale__col col-12 col-sm">
            <div class="flashsale__time">
                <span class="flashsale__hours">16</span>
                :
                <span class="flashsale__mins">16</span>
                :
                <span class="flashsale__secs">16</span>
            </div>
        </div>
    </h3>

    <div class="content__item-list row">

        <?php
        foreach ($hotsale as $product) {
            $sale = rand(10, 100);
            echo "
            <div class='col-6 col-md-4 col-lg-3 col-xl-2'>
                <a href='" . $index . "/detail/product/id=" . $product->getId() . "' class='card__flashsale card'>
                    <div style='background: center / contain no-repeat url(" . $product->getImg() . ");' class='card-img-top'></div>

                    <div class='card-body'>
                        <h5 class='product__name'>" . $product->getName() . "</h5>
                        <div class='product__price'>
                            <p class='product__price-old'>" . $product->getOldPrice() . "</p>
                            <p class='product__price-new'>" . $product->getPrice() . "</p>
                        </div>

                        <div class='product__sold' style='--percent: " . $sale . "%'>
                            <p class='product__sold--text'>Đã bán " . round($product->getSold() / 10) . "</p>
                        </div>
                    </div>
                </a>
            </div>";
        }
        ?>

    </div>

</div>

<script src="<?php echo $index ?>/assets/js/flashsale.js"></script>