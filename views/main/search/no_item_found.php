<div class="not_found_box">
    <img src="<?php echo $imglink['notfound']; ?>" alt="">
    <span class="not_found_heading">Không tìm thấy sản phẩm</span>
    <span class="not_found_text">TriFarm không tìm thấy sản phẩm khớp với từ khoá của bạn. Hãy thử lại bằng từ khoá khác.</span>
</div>

<style>
    /* other */
    .pagination {
        display: none;
    }

    .not_found_box {
        margin: 80px 0;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }

    .not_found_box img {
        width: 28%;
        filter: grayscale(30%);
    }

    .not_found_heading {
        margin: 36px 0 12px 0;
        color: var(--primary-dark-color);
        font-weight: 500;
        font-size: 2rem;
    }

    .not_found_text {
        color: var(--text-color);
        font-size: 1.5rem;
    }
</style>