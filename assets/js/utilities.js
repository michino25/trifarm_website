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
