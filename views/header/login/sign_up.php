<!-- sign up -->
<div class="sign signup">
    <div class="sign__container">

        <div class="sign__header">
            <h3 class="sign__title">Đăng ký</h3>
            <span class="opacity-hover sign_in_switch sign__switch" onclick="SignInFunc()">Đăng nhập</span>
        </div>

        <div class="sign__form">
            <div class="row">
                <div class="col">
                    <input class="sign__form-input" name="fullname" type="text" placeholder="Họ và tên" />
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <input class="sign__form-input" name="username" type="text" placeholder="Tên đăng nhập" />
                </div>
            </div>

            <div class="row gx-4">
                <div class="col">
                    <input class="sign__form-input" name="password" type="password" placeholder="Mật khẩu" />
                </div>

                <div class="col">
                    <input class="sign__form-input" name="repassword" type="password" placeholder="Xác nhận mật khẩu" />
                </div>
            </div>

            <div class="row" style="align-items: center;">
                <div class="col">
                    <img class="img_captcha" src="" alt="">
                </div>
                <div class="refreshBtn col-1 d-none d-sm-flex" onclick="captchaRefresh()">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-repeat" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M4 12v-3a3 3 0 0 1 3 -3h13m-3 -3l3 3l-3 3"></path>
                        <path d="M20 12v3a3 3 0 0 1 -3 3h-13m3 3l-3 -3l3 -3"></path>
                    </svg>
                </div>
                <div class="col col-md" style="margin-left: 8px; flex: 3;">
                    <input class="sign__form-input" name="captcha" type="text" placeholder="Nhập mã xác thực" />
                </div>
            </div>
        </div>

        <div class="sign__info">
            <p class="sign__form-policy">Bằng việc đăng ký, bạn đã đồng ý với TriFarm về
                <a href="" class="opacity-hover sign__form-link">Điều khoản dịch vụ</a> &
                <a href="" class="opacity-hover sign__form-link">Chính sách bảo mật</a>
            </p>
        </div>

        <div class="sign__controls">
            <button class="btnReturn dark-hover btn">TRỞ LẠI</button>
            <button class="btnSignUp opacity-hover btn btn--primary">ĐĂNG KÝ</button>
        </div>
    </div>

    <div class="sign__withsocial">
        <a href="#" class="opacity-hover btn btn btn--withicon">
            <i class="sign__withsocial-icon ri-facebook-fill"></i>
            <span class="sign__withsocial-content">Kết nối với Facebook</span>
        </a>

        <a href="#" class="opacity-hover btn btn btn--withicon">
            <i class="sign__withsocial-icon ri-google-fill"></i>
            <span class="sign__withsocial-content">Kết nối với Google</span>
        </a>
    </div>
</div>

<script>
    async function captchaRefresh() {
        var url = '<?php echo $index ?>/login/createCaptcha';
        var params = '';

        var responseText = await ajaxQuery("GET", url, params);

        $('img.img_captcha').attr("src", responseText);
        $(".signup input[name='captcha']").val('');
    }

    function inputRefresh() {
        $(".signup input*[name='fullname']").val('');
        $(".signup input[name='username']").val('');
        $(".signup input[name='password']").val('');
        $(".signup input[name='repassword']").val('');
    }

    async function signUpClick(e) {
        var fullname = $(".signup input[name='fullname']").val();
        var username = $(".signup input[name='username']").val();
        var password = $(".signup input[name='password']").val();
        var repassword = $(".signup input[name='repassword']").val();
        var captcha = $(".signup input[name='captcha']").val();

        var params = new URLSearchParams({
            fullname: fullname,
            username: username,
            password: password,
            repassword: repassword,
            captcha: captcha
        }).toString();

        var url = '<?php echo $index ?>/login/signup';

        var responseText = await ajaxQuery("POST", url, params);

        if (responseText.includes("thành công")) {
            alert(responseText);
            captchaRefresh();
            inputRefresh();
            // chuyển sang model đăng nhập    
            modalSignIn.style.display = "block";
            modalSignUp.style.display = "none";
        } else {
            captchaRefresh();
            alert(responseText);
        }
    }

    $('.btnSignUp').click(signUpClick);
    $(".signup input").enterKey(signUpClick);
</script>