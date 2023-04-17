<!-- content Gợi ý cho bạn -->
<div class="content__container container">
    <h3 class="content__header">
        <i class="content__header-icon ri-medal-2-line"></i>
        <span>Gợi ý cho bạn</span>
    </h3>

    <div class="row">

        <?php
        foreach ($recommends as $product) {
            echo "
        <div class='col-6 col-md-4 col-lg-3 col-xl-2'>
            <a href='" . $index . "/detail/product/id=" . $product->getId() . "' class='card'>
                <div style='background: center / contain no-repeat url(" . $product->getImg() . ");' class='card-img-top'></div>
                <div class='card-body'>
                    <h5 class='product__name'>" . $product->getName() . "</h5>

                    <div class='product__rating'>";
            $storeStar = $product->getStar() * 10;
            for ($i = 0; $i < 5; $i++) {
                if ($storeStar >= 100) {
                    echo "<i class='product__rating-yellow ri-star-fill'></i>";
                    $storeStar -= 100;
                } else {
                    echo "<i class='product__rating-yellow ri-star-fill' style='--star-percent: " . $storeStar . "%;'></i>";
                    $storeStar = 0;
                }
            };
            echo "</div>

                    <div class='product__price'>
                        <p class='product__price-old'>" . $product->getOldPrice() . "</p>
                        <p class='product__price-new'>" . $product->getPrice() . "</p>
                    </div>
                    <p class='product__sold'>Đã bán " . $product->getSold() . "</p>
                </div>
            </a>
        </div>";
        }
        ?>
    </div>

    <button class="content__container-see-more">Xem thêm</button>
</div>

<script>
    var recommend_page = 1;

    // ajax
    $('.content__container-see-more').click(function(e) {
        recommend_page++;

        // điều kiện chặn ajax vì có ít sản phẩm (chỉ có 13 trang - 18/230 sản phẩm)
        if (recommend_page > 14)
            return;

        var _this = this;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                $(_this).parent().find(".row").append(this.responseText);
            };
        };
        xmlhttp.open("GET", "<?php echo $index ?>/home/load_recommend/page=" + recommend_page, true);
        xmlhttp.send();
    });
</script>