<div class="breadcrumb-wrapper container">
    <ol class="breadcrumb">
        <li class="breadcrumb__item">
            <a class="breadcrumb__link" href="<?php echo $index ?>">Trang Chủ</a>
        </li>
        <svg class="breadcrumb__arrow" viewBox="0 0 6 11">
            <path d="M0.646447 0.646447C0.841709 0.451184 1.15829 0.451184 1.35355 0.646447L6.35355 5.64645C6.54882 5.84171 6.54882 6.15829 6.35355 6.35355L1.35355 11.3536C1.15829 11.5488 0.841709 11.5488 0.646447 11.3536C0.451184 11.1583 0.451184 10.8417 0.646447 10.6464L5.29289 6L0.646447 1.35355C0.451184 1.15829 0.451184 0.841709 0.646447 0.646447Z">
            </path>
        </svg>
        <li class="breadcrumb__item">
            <a class="breadcrumb__link" href="<?php echo $index ?>/search/product/keyword=~category=<?php echo $category->getId() ?>~price=-_~sort=default">
                <?php echo $category->getName() ?>
            </a>
        </li>
        <svg class="breadcrumb__arrow" viewBox="0 0 6 11">
            <path d="M0.646447 0.646447C0.841709 0.451184 1.15829 0.451184 1.35355 0.646447L6.35355 5.64645C6.54882 5.84171 6.54882 6.15829 6.35355 6.35355L1.35355 11.3536C1.15829 11.5488 0.841709 11.5488 0.646447 11.3536C0.451184 11.1583 0.451184 10.8417 0.646447 10.6464L5.29289 6L0.646447 1.35355C0.451184 1.15829 0.451184 0.841709 0.646447 0.646447Z">
            </path>
        </svg>
        <li class="breadcrumb__item">
            <span class="breadcrumb__link"><?php echo $product->getName() ?></span>
        </li>
    </ol>
</div>