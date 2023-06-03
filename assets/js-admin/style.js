var select2 = document.querySelectorAll(".select2.select2-container")[0];
if (select2) select2.style.width = "100%";

var typeahead = document.querySelectorAll(".twitter-typeahead")[0];
if (typeahead) typeahead.style.display = "block";

var option1 = document.getElementById("optionsRadios1");
var option2 = document.getElementById("optionsRadios2");
var inputUrl = document.querySelector(".input-url");
var uploadFile = document.querySelector(".upload-file");

if (option1) {
    option1.addEventListener("change", function () {
        if (option1.checked) {
            uploadFile.style.display = "none";
            inputUrl.style.display = "block";
        }
    });

    option2.addEventListener("change", function () {
        if (option2.checked) {
            inputUrl.style.display = "none";
            uploadFile.style.display = "block";
        }
    });
}
