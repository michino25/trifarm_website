<?php

if ($products == null)
    require_once "no_item_found.php";
else

    foreach ($products as $product) {
        echo "
        <div class=' '>
            <a href='" . $index . "/detail/product/id=" . $product->getId() . "' class='card'>
                <div class='product__img' style='background-image: url(" . $product->getImg() . ");'>
                    <div class='product__freeship'>
                        <i class='product__freeship-icon fa-sharp fa-solid fa-truck-fast'></i>
                        Freeship+
                    </div>
                    <div class='product-item__trust'>
                        <i class='product-item__trust-icon fa-solid fa-check'></i>
                        <span class='product-item__trust-label'>Uy tín</span>
                    </div>
                </div>
                <div class='card-body'>
                    <h5 class='product__name'>" . $product->getName() . "</h5>

                    <div class='product__react'>
                        <div class='product__rating'>
                            " . $product->getStar() / 10 . "
                            <i class='product__rating-yellow ri-star-fill'></i>
                        </div>
                        <p class='product__sold'>Đã bán " . $product->getSold() . "</p>
                    </div>

                    <div class='product__price'>
                        <p class='product__price-new'>" . $product->getPrice() . "</p>
                        <p class='product__price-old'>" . $product->getOldPrice() . "</p>
                    </div>

                    <span class='product__origin'>" . $product->getLocation() . "</span>
                </div>
            </a>
        </div>
        ";
    }
