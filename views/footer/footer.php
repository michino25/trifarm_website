<link rel="stylesheet" href="<?php echo $index ?>/assets/css/footer.css">
<div class="footer">
    <div class="container">
        <div class="footer__row row  g-sm-3 g-lg-0 row-cols-xl-5 row-cols-md-4 row-cols-sm-3 row-cols-1">
            <div class="">
                <h3 class="footer__heading">Hỗ trợ khách hàng</h3>
                <ul class="footer-list">
                    <li class="footer-item">
                        <a href="" class="footer-item__link">Các câu hỏi thường gặp</a>
                    </li>
                    <li class="footer-item">
                        <a href="" class="footer-item__link">Hướng dẫn đặt hàng</a>
                    </li>
                    <li class="footer-item">
                        <a href="" class="footer-item__link">Phương thức vận chuyển</a>
                    </li>
                    <li class="footer-item">
                        <a href="" class="footer-item__link">Tổng đài hỗ trợ: 1900 5555</a>
                    </li>
                    <li class="footer-item">
                        <a href="" class="footer-item__link">Hỗ trợ khách hàng: hotro@trifarm.vn</a>
                    </li>
                    <li class="footer-item">
                        <a href="" class="footer-item__link">Báo lỗi bảo mật: security@trifarm.vn</a>
                    </li>
                </ul>
            </div>

            <div class="">
                <h3 class="footer__heading">Về TriFarm</h3>
                <ul class="footer-list">
                    <li class="footer-item">
                        <a href="" class="footer-item__link">Giới thiệu TriFarm</a>
                    </li>
                    <li class="footer-item">
                        <a href="" class="footer-item__link">Tuyển dụng</a>
                    </li>
                    <li class="footer-item">
                        <a href="" class="footer-item__link">Điều khoản sử dụng</a>
                    </li>
                    <li class="footer-item">
                        <a href="" class="footer-item__link">Chính sách bảo mật</a>
                    </li>
                    <li class="footer-item">
                        <a href="" class="footer-item__link">Chính sách đổi trả</a>
                    </li>
                    <li class="footer-item">
                        <a href="" class="footer-item__link">Quy chế hoạt động Sàn GDTMĐT</a>
                    </li>

                    <!-- Nút bấm đăng ký shop -->
                    <!-- <?php
                            // Kênh người bán
                            if (isset($_SESSION['account']))
                                if ($_SESSION['account']['role'] == 'user')
                                    echo
                                    '<li class="footer-item">
                                <form action="" method="post" class="footer-item__link">
                                    <input type="hidden" name="id" value="' . $_SESSION['account']['id'] . '">
                                    <input type="submit" class="footer-item__shop" value="Bán hàng cùng Trifarm">
                                </form>
                            </li>';
                            ?> -->

                </ul>
            </div>

            <div class="d-none d-md-block">
                <h3 class="footer__heading">Phương thức thanh toán</h3>

                <div class="footer-img__row row g-0 row-cols-5">
                    <div class="footer-img__item">
                        <a href="" class="footer-img__link footer-item__link">
                            <img class="footer-img__img" src="<?php echo $imglink['visa']; ?>" alt="">
                        </a>
                    </div>

                    <div class="footer-img__item">
                        <a href="" class="footer-img__link footer-item__link">
                            <img class="footer-img__img" src="<?php echo $imglink['mastercard']; ?>" alt="">
                        </a>
                    </div>

                    <div class="footer-img__item">
                        <a href="" class="footer-img__link footer-item__link">
                            <img class="footer-img__img" src="<?php echo $imglink['jcb']; ?>" alt="">
                        </a>
                    </div>

                    <div class="footer-img__item">
                        <a href="" class="footer-img__link footer-item__link">
                            <img class="footer-img__img" src="<?php echo $imglink['atm']; ?>" alt="">
                        </a>
                    </div>

                    <div class="footer-img__item">
                        <a href="" class="footer-img__link footer-item__link">
                            <img class="footer-img__img" src="<?php echo $imglink['momo']; ?>" alt="">
                        </a>
                    </div>

                    <div class="footer-img__item">
                        <a href="" class="footer-img__link footer-item__link">
                            <img class="footer-img__img" src="<?php echo $imglink['zalopay']; ?>" alt="">
                        </a>
                    </div>

                    <div class="footer-img__item">
                        <a href="" class="footer-img__link footer-item__link">
                            <img class="footer-img__img" src="<?php echo $imglink['moca']; ?>" alt="">
                        </a>
                    </div>

                    <div class="footer-img__item">
                        <a href="" class="footer-img__link footer-item__link">
                            <img class="footer-img__img" src="<?php echo $imglink['vnpay']; ?>" alt="">
                        </a>
                    </div>

                    <div class="footer-img__item">
                        <a href="" class="footer-img__link footer-item__link">
                            <img class="footer-img__img" src="<?php echo $imglink['shopeepay']; ?>" alt="">
                        </a>
                    </div>

                    <div class="footer-img__item">
                        <a href="" class="footer-img__link footer-item__link">
                            <img class="footer-img__img" src="<?php echo $imglink['cash']; ?>" alt="">
                        </a>
                    </div>

                </div>
            </div>

            <div class="d-none d-xl-block">

                <h3 class="footer__heading">Đơn vị vận chuyển</h3>

                <div class="footer-img__row row g-0 row-cols-4">
                    <div class="footer-img__item">
                        <a href="" class="footer-img__link footer-item__link">
                            <img class="footer-img__img" src="<?php echo $imglink['ninja-van']; ?>" alt="">
                        </a>
                    </div>

                    <div class="footer-img__item">
                        <a href="" class="footer-img__link footer-item__link">
                            <img class="footer-img__img" src="<?php echo $imglink['ghn']; ?>" alt="">
                        </a>
                    </div>

                    <div class="footer-img__item">
                        <a href="" class="footer-img__link footer-item__link">
                            <img class="footer-img__img" src="<?php echo $imglink['jnt-express']; ?>" alt="">
                        </a>
                    </div>

                    <div class="footer-img__item">
                        <a href="" class="footer-img__link footer-item__link">
                            <img class="footer-img__img" src="<?php echo $imglink['best-express']; ?>" alt="">
                        </a>
                    </div>

                </div>
                <!-- <div class="footer__separate"></div> -->
            </div>

            <div class="">
                <h3 class="footer__heading">Kết nối với chúng tôi</h3>
                <ul class="footer-list">
                    <li class="footer-item">
                        <a href="" class="footer-item__link">
                            <i class="footer-item__social-icon ri-facebook-circle-fill"></i>
                            <div class="footer-item__social-content">Facebook</div>
                        </a>
                    </li>
                    <li class="footer-item">
                        <a href="" class="footer-item__link">
                            <i class="footer-item__social-icon ri-instagram-fill"></i>
                            <div class="footer-item__social-content">Instagram</div>
                        </a>
                    </li>
                    <li class="footer-item">
                        <a href="" class="footer-item__link">
                            <i class="footer-item__social-icon ri-youtube-fill"></i>
                            <div class="footer-item__social-content">Youtube</div>
                        </a>
                    </li>
                </ul>

                <!-- <div class="footer__separate"></div> -->


            </div>
        </div>

        <div class="row g-0">
            <div class="footer-info">
                <h3 class="footer__heading">Chứng nhận bởi</h3>

                <div class="footer-info__certificate-wraper">
                    <a href="" class="footer-img__link footer-item__link">
                        <img class="footer-info__certificate-img" src="<?php echo $imglink['bo-cong-thuong']; ?>" alt="">
                    </a>

                    <a href="" class="footer-img__link footer-item__link">
                        <img class="footer-info__certificate-img" src="<?php echo $imglink['bo-cong-thuong-2']; ?>" alt="">
                    </a>
                </div>

                <p class="footer-info__note d-none d-xl-block">TriFarm nhận đặt hàng trực tuyến và giao hàng tận nơi, chưa hỗ
                    trợ mua và nhận hàng trực tiếp tại văn phòng hoặc trung tâm xử lý đơn hàng</p>
                <p class="footer-info__address d-none d-xl-block">Trụ sở chính: Tầng 12 Tòa nhà IFC One Saigon, Số 34, đường
                    Tôn Đức Thắng, phường Bến Nghé, quận 1, Thành phố Hồ Chí Minh, Việt Nam</p>
                <p class="footer-info__certificate d-none d-xl-block">Giấy chứng nhận Đăng ký Kinh doanh số 0309438156 do Sở
                    Kế hoạch và Đầu tư Thành phố Hồ Chí Minh cấp lần đầu ngày 12/01/2019 và sửa đổi lần thứ 3
                    ngày 14/08/2022</p>
                <p class="footer-info__copyright">© 2022 - Bản quyền thuộc về Công ty TNHH Mich</p>

            </div>
        </div>
    </div>
</div>


<?php
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $query = "update tb_user set role='shop' where id='$id'";
    executeQuery($query);
    $message = "Vui lòng đăng nhập lại để cập nhật chức năng nhà bán hàng.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    // header("Location: " . $index . "/login/signout");
}

?>