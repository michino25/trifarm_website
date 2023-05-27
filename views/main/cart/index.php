<link rel="stylesheet" href="<?php echo $index ?>/assets/css/cart.css">

<div class="container">
    <div class="cart-box row gy-3">
        <div class="col-12 col-lg-8">
            <div class="cart-wrapper">
                <span class="cart-heading">Giỏ Hàng</span>

                <?php
                if (count($cart) > 0)
                    foreach ($products as $key => $product) {
                        require "cart_item.php";
                    }
                else
                    require_once "cart_no_item.php";
                ?>

            </div>
        </div>

        <div class="col-12 col-lg-4">
            <div class="cart-wrapper">
                <span class="cart-heading-2">Giao Hàng</span>
                <div class="product__ship <?php echo count($cart) == 0 ? "opacity-50" : ""; ?>">
                    <div class="product__ship-address">
                        <span class="product__ship-label">Giao đến</span>
                        <span class="product__ship-choosing">P.Bến Nghé, Q.1, Hồ Chí Minh</span> -
                        <a class="product__ship-change" href="#">Đổi địa chỉ</a>
                    </div>
                    <div class="product__ship-time-price">
                        <img class="product__ship-img" src="<?php echo $imglink['jnt-express']; ?>">
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

                <div class="separate"></div>
                <div>
                    <div class="checkout-box">
                        <span class="cart-heading-2">Tổng tiền hàng</span>
                        <span class="cart-heading-2"><?php echo number_format($total, 0, '', '.'); ?> đ</span>
                    </div>
                    <div class="checkout-box">
                        <span class="cart-heading-3">Giảm giá</span>
                        <span class="cart-heading-3">(5%) -<?php echo number_format($total / 20, 0, '', '.'); ?> đ</span>
                    </div>
                    <div class="checkout-box">
                        <span class="cart-heading-3">Phí vận chuyển</span>
                        <span class="cart-heading-3">0 đ</span>
                    </div>
                    <div class="checkout-box">
                        <span class="cart-heading-3">Thuế VAT</span>
                        <span class="cart-heading-3">(10%) +<?php echo number_format($total * 0.95 * 0.1, 0, '', '.'); ?> đ</span>
                    </div>
                    <div class="separate"></div>
                    <div class="checkout-box">
                        <span class="cart-heading-2">Tổng Thanh Toán</span>
                        <span class="cart-heading-2"><?php echo number_format($total * 0.95 * 1.1, 0, '', '.'); ?> đ</span>
                    </div>
                </div>

                <div class="checkout-action">
                    <form class="" method="POST" target="_blank" action='<?php echo $index; ?>/checkout/momopayment'>
                        <input hidden name="total" value="<?php echo ($total * 0.95 * 1.1); ?>" />
                        <input <?php echo count($cart) == 0 ? "disabled" : ""; ?> type="submit" name="momo" value="Thanh toán" class="checkout-btn">
                    </form>
                    <a href="<?php echo $index; ?>" class="home-btn">Tiếp tục mua sắm</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(".product__quantity-decrease").each(function() {
        $(this).bind('click', function() {
            this.parentNode.querySelector('input[type=number]').stepDown();
            updateBtnClick($(this).parent().parent());
        })
    });

    $(".product__quantity-increase").each(function() {
        $(this).bind('click', function() {
            this.parentNode.querySelector('input[type=number]').stepUp();
            updateBtnClick($(this).parent().parent());
        })
    });

    $(".product__quantity-box .product__quantity-input").each(function() {
        $(this).on("keydown", "form", function(event) {
            if (event.key == "Enter")
                updateBtnClick($(this).parent().parent());
        });
    });

    $(".product__quantity-box .product__quantity-input").each(function() {
        $(this).on("change", function() {
            updateBtnClick($(this).parent().parent());
        });
    });

    function updateBtnClick(_this) {
        let quantity = _this.find("input[type=number]").val();
        _this.parent().parent().find(".add-product-form input[type=number]").val(quantity);
        _this.parent().parent().find(".add-product-form input[value=updatecart]").click();
    }

    $(".delete-item-btn").each(function() {
        $(this).on("click", function() {
            $(this).parent().next().find("input[value=removeformcart]").click();
        });
    });

    document.title = "Giỏ Hàng | TriFarm";
</script>