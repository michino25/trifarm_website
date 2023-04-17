<?php
$pageStart = ($page - 2) > 0 ? ($page - 2) : 1;
$pageEnd = ($pageStart + 4) < $totalPage ? ($pageStart + 4) : $totalPage;
$pageStart = $pageEnd == $totalPage && $pageEnd - 4 > 0 ? $totalPage - 4 : $pageStart;
?>

<div class="pagination">
    <li class="pagination-item <?php echo $page == 1 ? 'pagination-item--disable' : '' ?>">
        <button class="pagination-item__link pagination-left">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-left" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <polyline points="15 6 9 12 15 18"></polyline>
            </svg>
        </button>
    </li>

    <?php
    for ($i = $pageStart; $i <= $pageEnd; $i++) {
        echo
        "<li class='pagination-item " . ($page == $i || ($page == '' && $i == 1) ? ' pagination-item--active' : '') . "'>
            <button class='pagination-item__link'>" . $i . "</button>
        </li>";
    };
    ?>

    <li class="pagination-item <?php echo $page == $totalPage ? 'pagination-item--disable' : '' ?>">
        <button class="pagination-item__link pagination-right">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <polyline points="9 6 15 12 9 18"></polyline>
            </svg>
        </button>
    </li>
</div>

<script>
    $('.pagination-item__link:not(:has(*))').click(function(e) {
        var page = $(this).text();
        if (page == <?php echo $page ?>)
            return;
        page = '~page=' + page;

        navigatedLink('page', page);
    });

    $('.pagination-item:not(.pagination-item--disable):has(svg)').click(function(e) {
        var page = <?php echo $page ?>;
        if ($(this).find(".pagination-left")[0])
            page--;
        else
            page++;
        page = '~page=' + page;

        navigatedLink('page', page);
    });
</script>