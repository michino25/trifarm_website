<input type="checkbox" hidden id="filter__btn-control">
<label for="filter__btn-control" class="filter__btn-panel d-lg-none">
    <div class="filter__btn-close">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
            <path fill="none" d="M0 0h24v24H0z" />
            <path d="M12 10.586l4.95-4.95 1.414 1.414-4.95 4.95 4.95 4.95-1.414 1.414-4.95-4.95-4.95 4.95-1.414-1.414 4.95-4.95-4.95-4.95L7.05 5.636z" />
        </svg>
    </div>
</label>

<div class="search-side d-lg-block">
    <nav class="search__category search__item">
        <h3 class="search__heading">
            <i class="search__heading-icon ri-menu-4-line"></i>
            <span class="search__heading-title">danh mục sản phẩm</span>
        </h3>

        <ul class="category-list">
            <li class="category-item radio-box-item">
                <input type='radio' hidden id='cate-all' name='category' value='' <?php echo $category == '' ? 'checked' : '' ?>>
                <label for='cate-all' class='category-item__link'>Tất cả sản phẩm</label>
            </li>

            <?php
            foreach ($cateList as $cateItem) {
                echo
                "<li class='category-item radio-box-item'>
                <input type='radio' hidden id='cate-" . $cateItem->getId() . "' name='category' value='" . $cateItem->getId() . "' " . ($category == $cateItem->getId() ? 'checked' : '') . " >
                <label for='cate-" . $cateItem->getId() . "' class='category-item__link'>" . $cateItem->getName() . "</label>
            </li>";
            }
            ?>

        </ul>
    </nav>

    <nav class="search__place search__item">
        <h3 class="search__heading">
            <i class="search__heading-icon ri-map-pin-2-line"></i>
            <span class="search__heading-title">xuất xứ</span>
        </h3>

        <ul class="place-list">

            <?php
            foreach ($locaList as $locaId => $locaItem) {
                echo
                "<li class='place-item'>
                <input class='place-item__check' type='checkbox' id='loca-" . $locaId . "' 
                    name='location' value='" . $locaItem . "' " . (in_array($locaItem, $locationArr) ? 'checked' : '') . " >
                <label class='place-item__label' for='loca-" . $locaId . "'><span></span>" . $locaItem . "</label>
                </li>";
            }
            ?>

        </ul>
    </nav>

    <nav class="search__price search__item">
        <h3 class="search__heading">
            <i class="search__heading-icon ri-wallet-line"></i>
            <span class="search__heading-title">giá</span>
        </h3>

        <ul class="price-list">
            <li class="price-item radio-box-item">
                <input type='radio' hidden id='cheap' name='price' value='-100000' <?php echo $price == "-100000" ? 'checked' : ''; ?>>
                <label for='cheap' class='price-item__link'>Dưới 100.000</label>
            </li>

            <li class="price-item radio-box-item">
                <input type='radio' hidden id='medium' name='price' value='100000-300000' <?php echo $price == "100000-300000" ? 'checked' : ''; ?>>
                <label for='medium' class='price-item__link'>100.000 — 300.000</label>
            </li>

            <li class="price-item radio-box-item">
                <input type='radio' hidden id='expensive' name='price' value='300000-' <?php echo $price == "300000-" ? 'checked' : ''; ?>>
                <label for='expensive' class='price-item__link'>Trên 300.000</label>
            </li>

            <li class="price-item radio-box-item">
                <input type='radio' hidden id='option_price' name='price' value='option_price' <?php echo strpos($price, '_') ? 'checked' : ''; ?>>
                <label for='option_price' class='price-item__link'>Chọn khoảng giá</label>
                <div class="price-box">
                    <input id="price-start" type="text" value="<?php echo $priceList['min'] ?>" onfocus="saveValue(event)" onkeyup="formatStringPrice(event)">
                    <span>-</span>
                    <input id="price-end" type="text" value="<?php echo $priceList['max'] ?>" onfocus="saveValue(event)" onkeyup="formatStringPrice(event)">
                    <input type="hidden" id="price-hidden" value="">
                </div>
                <button class="price-submit">Áp dụng</button>
            </li>

        </ul>
    </nav>

    <nav class="search__react search__item">
        <h3 class="search__heading">
            <i class="search__heading-icon ri-star-line"></i>
            <span class="search__heading-title">đánh giá</span>
        </h3>

        <ul class="react-list">
            <li class="react-item radio-box-item">
                <input type='radio' hidden id='all_star' name='react' value='' <?php echo $star == "" ? 'checked' : ''; ?>>
                <label for='all_star' class='react-item__link'>
                    <div class="product__rating">
                        <i class="product__rating-yellow ri-star-fill"></i>
                    </div>

                    <span>Tất cả</span>
                </label>
            </li>

            <ul class="react-list">
                <li class="react-item radio-box-item">
                    <input type='radio' hidden id='5_star' name='react' value='5' <?php echo $star == "5" ? 'checked' : ''; ?>>
                    <label for='5_star' class='react-item__link'>
                        <div class="product__rating">
                            <i class="product__rating-yellow ri-star-fill"></i>
                            <i class="product__rating-yellow ri-star-fill"></i>
                            <i class="product__rating-yellow ri-star-fill"></i>
                            <i class="product__rating-yellow ri-star-fill"></i>
                            <i class="product__rating-yellow ri-star-fill"></i>
                        </div>

                        <span>từ 5 sao</span>
                    </label>
                </li>

                <li class="react-item radio-box-item">
                    <input type='radio' hidden id='4_star' name='react' value='4' <?php echo $star == "4" ? 'checked' : ''; ?>>
                    <label for='4_star' class='react-item__link'>
                        <div class="product__rating">
                            <i class="product__rating-yellow ri-star-fill"></i>
                            <i class="product__rating-yellow ri-star-fill"></i>
                            <i class="product__rating-yellow ri-star-fill"></i>
                            <i class="product__rating-yellow ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                        </div>

                        <span>từ 4 sao</span>
                    </label>
                </li>

                <li class="react-item radio-box-item">
                    <input type='radio' hidden id='3_star' name='react' value='3' <?php echo $star == "3" ? 'checked' : ''; ?>>
                    <label for='3_star' class='react-item__link'>
                        <div class="product__rating">
                            <i class="product__rating-yellow ri-star-fill"></i>
                            <i class="product__rating-yellow ri-star-fill"></i>
                            <i class="product__rating-yellow ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                        </div>

                        <span>từ 3 sao</span>
                    </label>
                </li>
            </ul>
    </nav>
</div>
<script>
    // category
    $('.category-item.radio-box-item').click(function(e) {
        var cate = $(this).find("input").val();
        if (cate != '') {
            cate = '~category=' + cate;
        }

        navigatedLink('category', cate);
    });

    // location
    $('.place-item__label, place-item__check').click(function(e) {
        var toCheck;
        var loca;
        if ($(this).parent().find("input").is(':checked')) { // khi check -> uncheck
            toCheck = false;
            loca = '<?php echo $location; ?>';
            loca = loca.split('-');
            loca = loca.filter(item => item !== $(this).parent().find("input").val());
            if (loca != null)
                loca = loca.join('-');
            else
                loca = "";
        } else {
            // khi uncheck -> check
            toCheck = true;

            loca = '<?php echo $location; ?>';
            if (loca == '')
                loca = [$(this).parent().find("input").val()];
            else {
                loca = loca.split('-');
                loca.push($(this).parent().find("input").val());
                loca = loca.join('-');
            }
        }

        loca = loca != "" ? '~location=' + btoa(encodeURIComponent(loca)) : "";

        navigatedLink('location', loca);
    });

    // price
    $('.price-item.radio-box-item:not(:last-child), button.price-submit').click(function(e) {
        // check Is option price?
        if ($(this).children().length > 0) {
            var price = $(this).find("input").val();
        } else {
            var start = $(this).parent().find("input#price-start").val();
            start = start.replaceAll('.', '');
            var end = $(this).parent().find("input#price-end").val();
            end = end.replaceAll('.', '');
            price = start + "-" + end + "_";
        }

        if (price != '') {
            price = '~price=' + price;
        }

        navigatedLink('price', price);
    });

    // star
    $('.react-item.radio-box-item').click(function(e) {
        var star = $(this).find("input").val();
        if (star != '') {
            star = '~star=' + star;
        }

        navigatedLink('star', star);
    });
</script>