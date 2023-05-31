<div class='product-wrapper'>
    <div class='product-img-wrapper  col-3  col-lg-3  col-xl-2'>
        <div class="product-img" style="background: center / contain no-repeat url(<?php echo $product->getImg(); ?>);">
        </div>
    </div>

    <div class='product-info-quantity col-8 col-md-7 col-xl-8 row'>
        <div class='product-info  col-12  col-lg-7  col-xl-7'>
            <a href="<?php echo $index ?>/detail/product/id=<?php echo $product->getId() ?>" class='product-name'><?php echo $product->getName(); ?></a>
            <span class='product-price'><?php echo number_format((int) $product->getPrice(), 0, '', '.'); ?> đ</span>
            <span class='product-ship'>
                <svg xmlns='http://www.w3.org/2000/svg' class='product-icon icon icon-tabler icon-tabler-truck' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' fill='none' stroke-linecap='round' stroke-linejoin='round'>
                    <path stroke='none' d='M0 0h24v24H0z' fill='none'></path>
                    <circle cx='7' cy='17' r='2'></circle>
                    <circle cx='17' cy='17' r='2'></circle>
                    <path d='M5 17h-2v-11a1 1 0 0 1 1 -1h9v12m-4 0h6m4 0h2v-6h-8m0 -5h5l3 5'></path>
                </svg>
                <span>Freeship</span>
            </span>
        </div>

        <div class='quantity  col-12  col-lg-5  col-xl-5'>
            <div class='product__quantity-box'>
                <button type='button' class='product__quantity-decrease'>
                    <svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-minus' width='24' height='24' viewBox='0 0 24 24' stroke-width='2' stroke='currentColor' fill='none' stroke-linecap='round' stroke-linejoin='round'>
                        <path stroke='none' d='M0 0h24v24H0z' fill='none'></path>
                        <line x1='5' y1='12' x2='19' y2='12'></line>
                    </svg>
                </button>
                <input class='product__quantity-input' name='quantity' min='0' value='<?php echo $cart[$product->getId()]; ?>' type='number'>
                <button type='button' class='product__quantity-increase'>
                    <svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-plus' width='24' height='24' viewBox='0 0 24 24' stroke-width='2' stroke='currentColor' fill='none' stroke-linecap='round' stroke-linejoin='round'>
                        <path stroke='none' d='M0 0h24v24H0z' fill='none'></path>
                        <line x1='12' y1='5' x2='12' y2='19'></line>
                        <line x1='5' y1='12' x2='19' y2='12'></line>
                    </svg>
                </button>
            </div>

        </div>
    </div>

    <div class='product-action  col-1  col-md-2  col-xl-2'>
        <span class='product-real-price d-none d-md-block'><?php echo number_format((int) $product->getPrice() * $cart[$product->getId()], 0, '', '.'); ?> đ</span>
        <button class="delete-item-btn">
            <span class="d-none d-md-block">Xoá</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="d-block d-md-none icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <line x1="4" y1="7" x2="20" y2="7"></line>
                <line x1="10" y1="11" x2="10" y2="17"></line>
                <line x1="14" y1="11" x2="14" y2="17"></line>
                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
            </svg> </button>
    </div>


    <form hidden class='add-product-form' method='post' action='<?php echo $index; ?>/checkout/modifycart'>
        <input type='number' name='quantity' min='0' value='1'>
        <input type='text' name='id' value='<?php echo $product->getId(); ?>'>
        <input type='submit' name='action' value='updatecart'>
        <input type='submit' name='action' value='removeformcart'>
    </form>

</div>