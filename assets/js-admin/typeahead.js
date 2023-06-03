(function ($) {
    "use strict";
    var substringMatcher = function (strs) {
        return function findMatches(q, cb) {
            var matches, substringRegex;

            // an array that will be populated with substring matches
            matches = [];

            // regex used to determine if a string contains the substring `q`
            var substrRegex = new RegExp(q, "i");

            // iterate through the pool of strings and for any string that
            // contains the substring `q`, add it to the `matches` array
            for (var i = 0; i < strs.length; i++) {
                if (substrRegex.test(strs[i])) {
                    matches.push(strs[i]);
                }
            }

            cb(matches);
        };
    };

    var countries = [
        "Hoa Kỳ",
        "Trung Quốc",
        "Nhật Bản",
        "Đức",
        "Ấn Độ",
        "Anh Quốc",
        "Pháp",
        "Ý",
        "Canada",
        "Hàn Quốc",
        "Tây Ban Nha",
        "Úc",
        "Mexico",
        "Indonesia",
        "Hà Lan",
        "Ả Rập Xê Út",
        "Thổ Nhĩ Kỳ",
        "Thụy Sĩ",
        "Đài Loan",
        "Argentina",
        "Thụy Điển",
        "Ba Lan",
        "Bỉ",
        "Thái Lan",
        "Iran",
        "Áo",
        "Na Uy",
        "Các Tiểu Vương quốc Ả Rập Thống nhất",
        "Nga",
        "Ai Cập",
        "Nigeria",
        "Malaysia",
        "Nam Phi",
        "Ireland",
        "Philippines",
        "Pakistan",
        "Colombia",
        "Đan Mạch",
        "Chile",
        "Bangladesh",
        "Phần Lan",
        "Việt Nam",
        "Cộng hòa Séc",
        "Peru",
        "Bồ Đào Nha",
        "New Zealand",
        "Hy Lạp",
        "Algérie",
        "Israel",
        "Singapore",
        "Hungary",
    ];

    $("#countries.typeahead.basics").typeahead(
        {
            hint: true,
            highlight: true,
            minLength: 1,
        },
        {
            name: "countries",
            source: substringMatcher(countries),
        }
    );

    // constructs the suggestion engine
    var countries = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.whitespace,
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        // `countries` is an array of state names defined in "The Basics"
        local: countries,
    });

    $("#countries.typeahead.bloodhound").typeahead(
        {
            hint: true,
            highlight: true,
            minLength: 1,
        },
        {
            name: "countries",
            source: countries,
        }
    );
})(jQuery);
