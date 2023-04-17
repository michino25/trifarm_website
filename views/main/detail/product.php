<div class="content__container container">
    <div class="detail row">
        <div class="product__image col-md-12 col-lg-6 col-xl-5">
            <div class="product__img-wraper">
                <div style='background: center / contain no-repeat url(<?php echo $product->getImg() ?>);' class='product__img'></div>
            </div>
        </div>

        <div class="product__info col-md-12 col-lg-6 col-xl-7">
            <h1 class="product__name"><?php echo $product->getName() ?></h1>

            <div class="product__location">
                <span class="product__location-label">Xuất xứ:</span>
                <a href="#" class="product__location-link"><?php echo $product->getLocation() ?></a>
            </div>

            <div class="product__react">

                <a href="#" class="product__rating">
                    <span class="product__rating-desc"><?php echo $product->getStar() / 10 ?></span>

                    <?php
                    $storeStar = $product->getStar() * 10;
                    for ($i = 0; $i < 5; $i++) {
                        if ($storeStar >= 100) {
                            echo "<i class='product__rating-yellow ri-star-fill'></i>";
                            $storeStar -= 100;
                        } else {
                            echo "<i class='product__rating-yellow ri-star-fill' style='--star-percent: " . $storeStar . "%;'></i>";
                            $storeStar = 0;
                        }
                    }
                    ?>
                </a>

                <a href="#" class="product__review">
                    <span class="product__review-desc"><?php echo $product->getReview() ?></span>
                    <span class="product__review-label">Đánh Giá</span>
                </a>

                <a href="#" class="product__sold">
                    <span class="product__sold-desc"><?php echo $product->getSold() ?></span>
                    <span class="product__sold-label">Đã Bán</span>
                </a>

            </div>

            <div class="product__price">
                <div class="product__price-wrapper">
                    <p class="product__price-new"><?php echo $product->getPrice() ?></p>
                    <p class="product__price-old"><?php echo $product->getOldPrice() ?></p>
                    <p class="product__price-percent">
                        -<?php echo round((1 - $product->getPrice() / $product->getOldPrice()) * 100) ?>%
                    </p>
                </div>
                <div class="product__price-cheap">
                    <i class="product__price-cheap-shield ri-shield-check-fill"></i>
                    <span class="product__price-cheap-text">rẻ hơn hoàn tiền</span>
                </div>
            </div>

            <div class="product__modify">
                <span class="product__modify-label">Loại:</span>
                <span class="product__modify-choosing">
                    <?php echo explode('~', $product->getUnit())[0]; ?>
                </span>

                <div class="product__modify-option">

                    <?php
                    $unitRaw = $product->getUnit();
                    $unitList = explode('~', $unitRaw);
                    foreach ($unitList as $key => $value) {
                        echo "<input type='radio' hidden id='option" . $key . "' name='radios' value='option" . $key . "' " . ($key === 0 ? 'checked' : '') . ">";
                        echo "<label for='option" . $key . "' class='product__modify-btn'>" . $value . "</label>";
                    };
                    ?>

                </div>
            </div>

            <div class="product__ship">
                <div class="product__ship-address">
                    <span class="product__ship-label">Giao đến</span>
                    <span class="product__ship-choosing">P.Bến Nghé, Q.1, Hồ Chí Minh</span> -
                    <a class="product__ship-change" href="#">Đổi địa chỉ</a>
                </div>
                <div class="product__ship-time-price">
                    <img class="product__ship-img" src="<?php echo $imglink['jnt-express']; ?>" alt="">
                    <div class="product__ship-info">
                        <span class="product__ship-time">Ngày mai, trước 9:00</span>
                        <span class="product__ship-price">
                            <span class="product__ship-price-label">Phí vận chuyển:</span>
                            <span class="product__ship-price-new">0₫</span>
                            <span class="product__ship-price-old">14.000₫</span>
                        </span>
                    </div>
                </div>

            </div>

            <div class="product__quantity">
                <span class="product__quantity-label">Số lượng</span>
                <div class="product__quantity-wrapper">
                    <div class="product__quantity-box">
                        <button class="product__quantity-decrease" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                            <i class="ri-subtract-line"></i>
                        </button>

                        <input class="product__quantity-input" name="quantity" min="1" value="1" type="number">

                        <button class="product__quantity-increase" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                            <i class="ri-add-fill"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="product__action">
                <button class="product__action-add product__action-btn">Thêm Vào Giỏ</button>
                <button class="product__action-buy product__action-btn">Mua Ngay</button>
            </div>
        </div>

        <form hidden class='add-product-form' method='post' action='<?php echo $index; ?>/checkout/modifycart'>
            <input type='number' name='quantity' min='1' value='1'>
            <input type='hidden' name='id' value='<?php echo $product->getId(); ?>'>
            <input type='submit' name='action' value='addtocart'>
        </form>

    </div>
</div>

<script src=" <?php echo $index ?>/assets/js/formatPrice.js"></script>
<script>
    $('.product__modify-option input').on('change', function() {
        $('.product__modify-choosing').html($('input[name=radios]:checked+label').html());
    });

    $("button.product__action-btn").each(function() {
        $(this).on("click", function() {
            let quantity = $('.product__quantity-box input[type=number]').val()
            $('.add-product-form input[type=number]').val(quantity)
            $('.add-product-form input[type=submit]').click();
        });
    });
</script>