// sign in / sign up

var signUp = document.querySelector('.sign_up');
var signIn = document.querySelector('.sign_in');
var modal = document.querySelector('.modal');
var modalSignUp = document.querySelector('.signup');
var modalSignIn = document.querySelector('.signin');

if ($(window).width() < 768) {
    $('.sign').css('height', $(window).height() + 'px');
}

function SignUpFunc() {
    if ($(window).width() < 768) {
        $('body').css('overflow', 'hidden');
        $('body').css('height', '100%');
    }

    modal.style.display = "flex";
    modalSignIn.style.display = "none";
    modalSignUp.style.display = "block";
    captchaRefresh();
}

function SignInFunc() {
    if ($(window).width() < 768) {
        $('body').css('overflow', 'hidden');
        $('body').css('height', '100%');
    }

    modal.style.display = "flex";
    modalSignIn.style.display = "block";
    modalSignUp.style.display = "none";
}

function CloseModelLogin() {
    if ($(window).width() < 768) {
        $('body').css('overflow', 'unset');
        $('body').css('height', 'unset');
    }

    modalSignIn.style.display = "none";
    modalSignUp.style.display = "none";
    modal.style.display = "none";
}

signIn.onclick = function () {
    SignInFunc();
};

signUp.onclick = function () {
    SignUpFunc()
};

$(".btnReturn").each(function () {
    $(this).bind('click', function () {
        CloseModelLogin()
    })
});

$(".modal__overlay").bind('click', function () {
    if ($(window).width() >= 768)
        CloseModelLogin()
})