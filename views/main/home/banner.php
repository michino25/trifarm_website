<!-- banner -->
<div class="banner">
    <div class="banner__content container">
        <img src="<?php echo $imglink['bgBanner-left']; ?>" class="banner_bg-img-left" alt="">

        <div class="banner-wrapper col-xl-8">

            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                <!-- Indicators -->
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                </div>
                <!-- The slideshow -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="<?php echo $imglink['banner1']; ?>" class="banner-img d-block" alt="Pic1">
                        <img src="<?php echo $imglink['trifarm']; ?>" class="banner__logo" alt="">
                    </div>
                    <div class="carousel-item">
                        <img src="<?php echo $imglink['banner2']; ?>" class="banner-img d-block" alt="Pic2">
                        <img src="<?php echo $imglink['trifarm']; ?>" class="banner__logo" alt="">
                    </div>
                    <div class="carousel-item">
                        <img src="<?php echo $imglink['banner3']; ?>" class="banner-img d-block" alt="Pic3">
                        <img src="<?php echo $imglink['trifarm']; ?>" class="banner__logo" alt="">
                    </div>
                    <div class="carousel-item">
                        <img src="<?php echo $imglink['banner4']; ?>" class="banner-img d-block" alt="Pic4">
                        <img src="<?php echo $imglink['trifarm']; ?>" class="banner__logo" alt="">
                    </div>
                </div>
                <!-- Left and right controls -->
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <div class="group-item-banner d-none d-lg-flex">

                <?php
                // Kênh người bán
                if (isset($_SESSION['account']) && $_SESSION['account']['role'] == 'shop')
                    echo
                    '<a href="#home_myshop_fix" class="item-banner ">
                            <img src="' . $imglink['shop'] . '" alt="" class="icon-item-banner">
                            <h6 class="text-item-banner">Kênh shop</h6>
                        </a>';
                else
                    echo
                    '<a href="#" class="item-banner ">
                            <img src="' . $imglink['van'] . '" alt="" class="icon-item-banner">
                            <h6 class="text-item-banner">Giao ngay 1h</h6>
                        </a>';
                ?>

                <a href="#" class="item-banner ">
                    <img src="<?php echo $imglink['membership']; ?>" alt="" class="icon-item-banner">
                    <h6 class="text-item-banner">Membership</h6>
                </a>

                <a href="#" class="item-banner ">
                    <img src="<?php echo $imglink['flame']; ?>" alt="" class="icon-item-banner">
                    <h6 class="text-item-banner">Giá sốc</h6>
                </a>

                <a href="#" class="item-banner ">
                    <img src="<?php echo $imglink['cooking']; ?>" alt="" class="icon-item-banner">
                    <h6 class="text-item-banner">Vào bếp</h6>
                </a>

                <!-- Tạm bỏ Mã giảm giá -->
                <!-- <a href="#" class="item-banner ">
                    <img src="<?php echo $imglink['coupon']; ?>" alt="" class="icon-item-banner">
                    <h6 class="text-item-banner">Mã giảm giá</h6>
                </a> -->

                <a href="#" class="item-banner ">
                    <img src="<?php echo $imglink['newspaper']; ?>" alt="" class="icon-item-banner">
                    <h6 class="text-item-banner">Tin nông trại</h6>
                </a>
            </div>
        </div>

        <img src="<?php echo $imglink['bgBanner-right']; ?>" class="banner_bg-img-right" alt="">
    </div>
</div>

<script>
    $(".carousel-control-next").click()
    $(".carousel-item").each(function() {
        $(this).draggable({
            axis: "x",
            drag: function(event, ui) {
                ui.position.left = Math.min(1, ui.position.left);
                ui.position.left = Math.max(-1, ui.position.left);
            },
            stop: function(event, ui) {
                if (ui.position.left > 0)
                    $(this).parent().parent().find(".carousel-control-prev").click()
                else
                    $(this).parent().parent().find(".carousel-control-next").click()
                $(this).css('left', '0px');
            }
        })
    });
</script>