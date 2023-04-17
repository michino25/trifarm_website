// flashsale
function formatString(num) {
    if (num.toString().length === 1) {
        return '0' + num
    } else
        return num
}

function getHours() {
    var d = new Date();
    return formatString(23 - d.getHours());
}

function getMinutes() {
    var d = new Date();
    return formatString(59 - d.getMinutes());
}

function getSeconds() {
    var d = new Date();
    return formatString(59 - d.getSeconds());
}

function UpdateTiming() {
    document.querySelector('.flashsale__hours').innerHTML = getHours();
    document.querySelector('.flashsale__mins').innerHTML = getMinutes();
    document.querySelector('.flashsale__secs').innerHTML = getSeconds();
    setTimeout(UpdateTiming, 1000);
}

UpdateTiming();
