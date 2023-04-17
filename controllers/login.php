<?php
session_start();

require_once "models/_modelUser.php";

class login
{

    public $ModelUser;

    function __construct()
    {
        $this->ModelUser = new ModelUser();
    }

    public function signup()
    {
        if (
            isset($_POST['fullname'])
            && isset($_POST['username'])
            && isset($_POST['password'])
            && isset($_POST['repassword'])
            && isset($_POST['captcha'])
        ) {
            if (
                $this->validateLenUP($_POST['username']) //username phải lớn hơn 8 và nhỏ hơn 30 kí tự
                && $this->validateLenUP($_POST['password']) //password phải lớn hơn 8 và nhỏ hơn 30 kí tự
                && $_POST['password'] == $_POST['repassword'] //Kiểm tra 2 ô mật khẩu có giống nhau
                && (($_SESSION['captcha_text'] == $_POST['captcha'])) //captcha nhập đúng
            ) {
                //nếu username đã tồn tại trong CSDL
                if ($this->ModelUser->existsUsername($_POST["username"])) {
                    echo "Tên đăng nhập này đã tồn tại, vui lòng chọn tên đăng nhập khác";
                } else {
                    //nếu username chưa tồn tại thì cho đăng kí
                    $this->ModelUser->SignUp($_POST["username"], $_POST["password"], $_POST["fullname"]);
                    echo "Đăng kí thành công!";
                }
            } else {
                //nếu các điều kiện không thoả mãn
                echo "Vui lòng kiểm tra lại thông tin!";
            }
        }
    }

    function validateLenUP($up)
    {
        return strlen($up) >= 8 && strlen($up) <= 30;
    }

    function generate_string($input, $strength = 10)
    {
        $input_length = strlen($input);
        $random_string = '';
        for ($i = 0; $i < $strength; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }

        return $random_string;
    }

    function createCaptcha($data)
    {
        $index = $data['index'];

        // $permitted_chars = 'aaAbBcCdDeEfFgGhHiIjJkKlLmMnNoOpPqQrRsStTuUvVwWxXyYzZ0123456789';
        $permitted_chars = '0123456789';

        // tạo mảng hình true color
        $image = imagecreatetruecolor(200, 50);

        // khử răng cưa
        imageantialias($image, true);

        // tạo bộ màu random

        $colors = [];

        $red = rand(125, 175);
        $green = rand(155, 225);
        $blue = rand(155, 225);

        for ($i = 0; $i < 5; $i++) {
            $colors[] = imagecolorallocate($image, $red - 20 * $i, $green - 20 * $i, $blue - 20 * $i);
        }

        // tạo màu background

        imagefill($image, 0, 0, $colors[0]);

        // tạo đường vạch rối loạn

        for ($i = 0; $i < 10; $i++) {
            imagesetthickness($image, rand(2, 10));
            $line_color = $colors[rand(1, 4)];
            imagerectangle($image, rand(-10, 190), rand(-10, 10), rand(-10, 190), rand(40, 60), $line_color);
        }

        // lấy màu cho text captcha

        $black = imagecolorallocate($image, 0, 0, 0);
        $white = imagecolorallocate($image, 255, 255, 255);
        $textcolors = [$black, $white];

        // lấy font

        $fonts = [
            $_SERVER["DOCUMENT_ROOT"] . '/assets/fonts/fonts_captcha/Roboto-Black.ttf',
            $_SERVER["DOCUMENT_ROOT"] . '/assets/fonts/fonts_captcha/Roboto-BoldItalic.ttf',
            $_SERVER["DOCUMENT_ROOT"] . '/assets/fonts/fonts_captcha/Roboto-Medium.ttf',
            $_SERVER["DOCUMENT_ROOT"] . '/assets/fonts/fonts_captcha/Roboto-Regular.ttf'
        ];

        // tạo chuỗi captcha raw
        $string_length = 6;
        $captcha_string = $this->generate_string($permitted_chars, $string_length);

        // lưu vào session
        $_SESSION['captcha_text'] = $captcha_string;

        // tạo định dạng captcha
        for ($i = 0; $i < $string_length; $i++) {
            $letter_space = 170 / $string_length;
            $initial = 15;

            imagettftext($image, 24, rand(-15, 15), $initial + $i * $letter_space, rand(25, 45), $textcolors[rand(0, 1)], $fonts[array_rand($fonts)], $captcha_string[$i]);
        }

        ob_start();
        imagepng($image);
        $bin = ob_get_clean();

        $type = 'png';
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($bin);
        echo $base64;

        imagedestroy($image);
    }

    public function signin()
    {
        if (isset($_POST['username']) && isset($_POST['password'])) {
            if ($this->ModelUser->SignIn($_POST["username"], $_POST["password"])) {
                echo "Đăng nhập thành công";
            } else {
                echo "Tài khoản hoặc mật khẩu không đúng";
            }
        } else {
            echo "Vui lòng kiểm tra lại thông tin";
        }
    }

    public function signout($data)
    {
        if (isset($data['index'])) {
            $index = $data['index'];

            if ($this->ModelUser->SignOut()) {
                header("Location: " . $index);
            };
        }
    }
}
