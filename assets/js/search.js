// --------------------------------- Input Price ---------------------------------

// format point string
var hiddenInput = document.querySelector('#price-hidden');

function saveValue(e) {
    hiddenInput.value = e.target.value;
}

function formatStringPrice(e) {

    var strValue = e.target.value;
    strValue = strValue.replaceAll('.', '');

    var intValue = parseInt(strValue);

    // xử lý khi người xoá tất cả số và nhập ký tự (lấy lịch sử nhập backup)
    if (isNaN(intValue))
        strValue = 0;
    else if (intValue.toString().length != countString(strValue))
        strValue = hiddenInput.value;
    else
        strValue = intValue.toLocaleString('de-DE')

    e.target.value = strValue;
    hiddenInput.value = strValue;

}

// Hàm kiểm tra chuỗi có bao nhiêu số 0 ở đầu chuỗi, ví dụ '015'
function countString(str) {
    for (let i = 0; i < str.length; i++) {
        if (str[i] != "0") {
            return str.length - i;
        }
    }
}

