
<script>
    function navigatedLink(key, value) {

        var link = {
            'keyword': "",
            'category': "",
            'location': "",
            'price': "",
            'star': "",
            'sort': "",
            'page': "",
        }

        var searchText = btoa(encodeURIComponent('<?php echo $keyword ?>'));
        link['keyword'] = 'keyword=' + searchText;

        link['category'] = '<?php echo $category ?>';
        link['category'] = link['category'] != "" ? '~category=' + link['category'] : "";

        link['location'] = '<?php echo $location ?>';
        link['location'] = link['location'] != "" ? '~location=' + btoa(encodeURIComponent(link['location'])) : "";

        link['price'] = '~price=' + '<?php echo $price ?>';

        link['star'] = '<?php echo $star ?>';
        link['star'] = link['star'] != "" ? '~star=' + link['star'] : "";

        link['sort'] = '~sort=' + '<?php echo $sort ?>';

        // page khi click các filter và sort luôn về 1, trừ khi click page 
        link['page'] = "";


        link[key] = value;

        var url = '<?php echo $index ?>' + '/search/product/';
        window.location.href = url + link['keyword'] + link['category'] + link['location'] +
            link['price'] + link['star'] + link['sort'] + link['page'];
    }
</script>