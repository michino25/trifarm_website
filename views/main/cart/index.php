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
                        <img class="product__ship-img" src="https://lh3.googleusercontent.com/fife/AAbDypBRkXHqUR67UQZeeU100TBqSACKH1fCn7Lg4R8ye8AQPPi5lWkutyEEr4-1HrhdkiQIIJwPsPxHzu82OMTGn7fboUUaZC3EmvQsfPxK84ClB40ZZQ9KgUYuEv9cROL0PlYfcLNl4KrTJhDBdquDZ-9l3FBLiHUoia8P_7p8P3rxsDKuzo8YLgnu56j9u0oV22whypr2SVcyIFmDyO95F474ERe7JTiYYDTg81ztMzvccE3jNIKD_SMetShLA0nbguPoVdcog5yGwu4nb8auVOKT-ajRnJ-6uHYd9DYrSzP_kzg_99clLs1jgmwJvhiN-r63Y3abkZF7lT5coNyN4Xsxh2rjgPcnfsSFqMp5nc0BhnF60zyrTBlikr-mIostr3JdvMtJNFTgvF1PMBJ21rukvt2xJsVPU81pDJMLdqmXGIfI3DoKU7NqGdxlFOMaagqRMeCc_QsQtmoP2kVt586D1svDm1UaNVCn3avqLn_liTxthqteO88fyY-BIgrKwg22qZLJJ8HEUIWGOkkgbmhgT0KtsnPBmPop10eP3FrOEueAHXSydlbC1w4Hwn8b18u5vb5rckKRBl5xQeQTZ31OBx0fk0XJRfPaFnlv3smS_TLeMwMq0WQiAH-K8WPLFgkh1MMH5cU3qTaHannblLL3CuS2rTF_CjnbrvEN8Ygtsvl29hLSMjar19nMiZ6qRz3-yyhkYkgrSjEuPBIVeQ5qYtBtAxWvsMYW-rWHNK7ONM8D-iq8EXPzS_Usu94mdvMrNlz0apSjACRof7eKewWCD26vprnYNB2WUULePCIv7Qx4dp-EmsGQTTzaGCpOJoOz_E3Gs4EOtw-e-7qfFv12wyBdKhU6s34OxCpLcItp2Pqmqbs5-r_pv-sxSCuz6dRr9Z9KokgMUpx75PH4QaqHyCZJ-66Dar5Bxi2kPG_e2V1A9HOq3MkH4Mgygoj53YL-bdzYIKfKwfSkygQVP417mtqHuV1jvBWUES6fv9J79k6HBNm8ehR5S_9VcFRZkwPJd1IOX--wgdj0iRDhICKcni3jGP-l8BbLZflrrNS5ZShIdAPRN6BAGGtTqwG84J32UXhTLMSfSx-99sTojDvwj4FStqef8qkvEsdjdNUMWSwpkMp9_8z9jX_6hvO2b_QL48mb_VEI6392HfFYpx7dvZ2FYXEBjyindU9NMkgjsEWVwk05E7WaTZVg2233JTw2ek3oqbUnfZhkQrt9HTvb4FqbR_SMkeKlmDDRX4ozGua3TFu5sjhaUdZxiNuhV9qBQ77lg9QAb17fB0zAnfgdc0uRvmjFaFx12v8-Yq0AM5uMJwSTqujdFD-TCm33vtE_2d3x77Bb0uiwV8f7g-26KcaKnNDtu1FxdMjki3hbBaaZdBRlzKQvtpb8soUuLdqg8HiCsBWxiy7jgSSdrR0OqC2tuGl6-t0rygDWN0PRFq5gXiNgqEEMKFDKaXLqy1IG5001XLi3hMcZM_vuNrbiLEXQcDmGIybvJFUAEo0WJdq_d3qVYU-7pJoqLzRIPd6VHoJsV2abyfJvnzIDsjFExlFfnEz7_U0HKuP9MmcgHBC1dTj0tDwJaFZ0FufREfY=w1600-h789">
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
                    <button <?php echo count($cart) == 0 ? "disabled" : ""; ?> class="checkout-btn">Đặt Hàng</button>
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