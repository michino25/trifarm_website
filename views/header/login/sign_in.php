<!-- sign in -->
<div class="sign signin">
    <div class="sign__container">

        <div class="sign__header">
            <h3 class="sign__title">Đăng nhập</h3>
            <span class="opacity-hover sign_up_switch sign__switch" onclick="SignUpFunc()">Đăng ký</span>
        </div>

        <div class="sign__form">
            <div class="sign__form-row">
                <input class="sign__form-input" name="username" type="text" placeholder="Tên đăng nhập">
            </div>
            <div class="sign__form-row">
                <input class="sign__form-input" name="password" type="password" placeholder="Mật khẩu">
            </div>
        </div>

        <div class="sign__info--right sign__info">
            <a href="" class="opacity-hover sign__form-forgot sign__form-link">Quên mật khẩu</a>
            <a href="" class="opacity-hover sign__form-help sign__form-link">Cần trợ giúp ?</a>
        </div>

        <div class="sign__controls">
            <button class="btnReturn dark-hover btn">TRỞ LẠI</button>
            <button class="btnSignIn opacity-hover btn btn--primary">ĐĂNG NHẬP</button>
        </div>
    </div>

    <div class="sign__withsocial">
        <a href="" class="opacity-hover btn btn btn--withicon">
            <i class="sign__withsocial-icon ri-facebook-fill"></i>
            <span class="sign__withsocial-content">Đăng nhập với Facebook</span>
        </a>

        <a href="" class="opacity-hover btn btn btn--withicon">
            <i class="sign__withsocial-icon ri-google-fill"></i>
            <span class="sign__withsocial-content">Đăng nhập với Google</span>
        </a>
    </div>
</div>

<script>
    var signInClick = function() {
        var username = $(".signin input[name='username']").val();
        var password = $(".signin input[name='password']").val();

        var paramsArr = {
            username,
            password,
        };

        // Turn the data object into an array of URL-encoded key/value pairs.
        let urlEncodedData = "",
            urlEncodedDataPairs = [],
            name;
        for (name in paramsArr) {
            urlEncodedDataPairs.push(name + '=' + encodeURIComponent(paramsArr[name]));
        }

        var http = new XMLHttpRequest();
        var url = '<?php echo $index ?>/login/signin';
        var params = urlEncodedDataPairs.join('&');
        http.open('POST', url, true);

        //Send the proper header information along with the request
        http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        http.onreadystatechange = function() { //Call a function when the state changes.
            if (http.readyState == 4 && http.status == 200) {
                if (http.responseText.includes("thành công")) {
                    alert(http.responseText);
                    window.location.href = '<?php echo $index; ?>'
                } else
                    alert(http.responseText);
            }
        }
        http.send(params);
    }

    $('.btnSignIn').click(signInClick);

    $(".signin input").enterKey(signInClick)
</script>