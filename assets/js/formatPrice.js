var productPriceOld = document.querySelectorAll('.product__price-old');
var productPriceNew = document.querySelectorAll('.product__price-new');
var productPrices = [...productPriceNew, ...productPriceOld];

function formatPrice() {

    for (var element of productPrices) {
        strValue = element.innerHTML.replaceAll('.', '');
        var intValue = parseInt(strValue);
        var result = intValue.toLocaleString('de-DE') + " ₫";
        element.innerHTML = result;
    }
}

formatPrice();