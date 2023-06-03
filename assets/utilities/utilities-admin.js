function ajaxQuery(method, reqLink, params) {
    return new Promise(function (resolve, reject) {
        const objXMLHttpRequest = new XMLHttpRequest();
        objXMLHttpRequest.onreadystatechange = function () {
            if (objXMLHttpRequest.readyState === 4) {
                if (objXMLHttpRequest.status == 200) {
                    resolve(objXMLHttpRequest.responseText);
                } else {
                    reject(
                        "Error Code: " +
                            objXMLHttpRequest.status +
                            " Error Message: " +
                            objXMLHttpRequest.statusText
                    );
                }
            }
        };

        if (method.toLowerCase() === "get") {
            reqLink += "?" + params;
        }

        objXMLHttpRequest.open(method, reqLink);

        // // Add the Origin header
        // objXMLHttpRequest.setRequestHeader("Origin", "http://localhost");

        if (method.toLowerCase() === "post") {
            objXMLHttpRequest.setRequestHeader(
                "Content-type",
                "application/x-www-form-urlencoded"
            );
            objXMLHttpRequest.send(params);
        } else {
            objXMLHttpRequest.send();
        }
    });
}

// async function showUser(str) {
// await ajaxQuery("GET", "getuser.php?id=" + str)

function formatPrice(price) {
    var intValue = parseInt(price);
    var result = intValue.toLocaleString("de-DE") + " ₫";
    return result;
}
