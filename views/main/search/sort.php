<div class="filter">
    <p class="filter__header">Kết quả tìm kiếm cho `<?php echo $keyword ?>`</p>
    <div class="filter__action">
        <button class="filter__btn btn">
            <input type='radio' hidden id='default' name='sort' value='default' <?php echo $sort == 'default' ? 'checked' : ''; ?>>
            <label for='default' class='sort-item__link'>Phổ biến</label>
        </button>

        <button class="filter__btn btn">
            <input type='radio' hidden id='newest' name='sort' value='newest' <?php echo $sort == 'newest' ? 'checked' : ''; ?>>
            <label for='newest' class='sort-item__link'>Mới nhất</label>
        </button>

        <button class="filter__btn btn">
            <input type='radio' hidden id='top_seller' name='sort' value='top_seller' <?php echo $sort == 'top_seller' ? 'checked' : ''; ?>>
            <label for='top_seller' class='sort-item__link'>Bán chạy</label>
        </button>

        <button class="filter__btn btn d-none d-md-block">
            <input type='radio' hidden id='biggest_discount' name='sort' value='biggest_discount' <?php echo $sort == 'biggest_discount' ? 'checked' : ''; ?>>
            <label for='biggest_discount' class='sort-item__link'>Giảm giá nhiều</label>
        </button>

        <button class="filter__btn btn d-none d-lg-block">
            <input type='radio' hidden id='price_desc' name='sort' value='price_desc' <?php echo $sort == 'price_desc' ? 'checked' : ''; ?>>
            <label for='price_desc' class='sort-item__link'>Giá cao đến thấp</label>
        </button>

        <button class="filter__btn btn d-none d-lg-block">
            <input type='radio' hidden id='price_asc' name='sort' value='price_asc' <?php echo $sort == 'price_asc' ? 'checked' : ''; ?>>
            <label for='price_asc' class='sort-item__link'>Giá thấp đến cao</label>
        </button>

        <div class="filter__page d-none d-xl-flex">
            <span class="filter__page-num">
                <span class="filter__page-current"><?php echo $page; ?></span> / <?php echo $totalPage; ?>
            </span>

            <div class="filter__page-control">
                <a class="filter__page-btn filter__page-left <?php echo $page == 1 ? 'filter__page-btn--disable' : '' ?>">
                    <i class="filter__page-icon fa-solid fa-chevron-left"></i>
                </a>

                <a class="filter__page-btn filter__page-right <?php echo $page == $totalPage ? 'filter__page-btn--disable' : '' ?>">
                    <i class="filter__page-icon fa-solid fa-chevron-right"></i>
                </a>
            </div>
        </div>

        <!-- thấp đến cao -->
        <button class="filter__btn-price-mobile price-up filter__btn btn d-lg-none">
            <label for='price_desc' class='sort-item__link'>
                Giá
                <svg xmlns="http://www.w3.org/2000/svg" class="filter__btn-price-icon" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="16" y1="9" x2="12" y2="5"></line>
                    <line x1="8" y1="9" x2="12" y2="5"></line>
                </svg>
            </label>
        </button>

        <!-- cao đến thấp -->
        <button class="filter__btn-price-mobile price-down filter__btn btn d-lg-none" style="display: none;">
            <label for='price_asc' class='sort-item__link'>
                Giá
                <svg xmlns="http://www.w3.org/2000/svg" class="filter__btn-price-icon" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="16" y1="15" x2="12" y2="19"></line>
                    <line x1="8" y1="15" x2="12" y2="19"></line>
                </svg>
            </label>
        </button>

        <label for="filter__btn-control" class="filter__btn-wrapper d-flex d-lg-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="filter__btn-icon" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M5.5 5h13a1 1 0 0 1 .5 1.5l-5 5.5l0 7l-4 -3l0 -4l-5 -5.5a1 1 0 0 1 .5 -1.5"></path>
            </svg>
            <span class="filter__btn-text">Lọc</span>
        </label>
    </div>
</div>

<script>
    $('.filter__btn.btn').click(function(e) {
        var sort = $(this).find("input").val();
        sort = '~sort=' + sort;

        navigatedLink('sort', sort);
    });

    $('.filter__page-btn:not(.filter__page-btn--disable)').click(function(e) {
        var page = <?php echo $page ?>;
        if ($(this).hasClass("filter__page-left"))
            page--;
        else
            page++;
        page = '~page=' + page;

        navigatedLink('page', page);
    });

    if ('<?php echo $sort; ?>' == 'price_desc' || '<?php echo $sort; ?>' == 'price_asc')
        $('.filter__btn-price-mobile').addClass('filter__btn-price-mobile-active');
    else
        $('.filter__btn-price-mobile').removeClass('filter__btn-price-mobile-active');

    if ('<?php echo $sort; ?>' == 'price_desc') {
        $('.filter__btn-price-mobile.price-down').css("display", "block");
        $('.filter__btn-price-mobile.price-up').css("display", "none");
    }

    if ('<?php echo $sort; ?>' == 'price_asc') {
        $('.filter__btn-price-mobile.price-up').css("display", "block");
        $('.filter__btn-price-mobile.price-down').css("display", "none");
    }

</script>