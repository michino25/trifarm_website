<!-- content Danh mục nổi bật -->
<div class="content__container container">
    <h3 class="content__header">
        <i class="content__header-icon ri-menu-2-fill"></i>
        <span>Danh mục nổi bật</span>
    </h3>

    <div class="row g-0">
        <?php

        foreach ($categories as $category) {
            echo "
                <a href='" . $index . "/search/product/keyword=~category=" . $category->getId() . "~price=-_~sort=default' 
                        class='category__item col-xl-1-5 col-md-2 col-4'>
                    <img src='" . $imglink[$category->getImg()] . "' class='category__img'>
                    <p class='category__text'>" . $category->getName() . "</p>
                </a>";
        }

        ?>
    </div>
</div>