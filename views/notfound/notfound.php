<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="<?php echo $index ?>/assets/css/base.css">
    <link rel="stylesheet" href="<?php echo $index ?>/assets/css/bootstrap.css">

    <title>404 Page | TriFarm</title>
    <link rel="shortcut icon" type="image/png" href="<?php echo $imglink['favicon']; ?>">
</head>

<body>
    <div class="box">
        <img class="img-left" src="<?php echo $imglink['404-page-left']; ?>" alt="">
        <div class="text-wrapper">
            <span class="num">
                <span class="num-4">4</span>
                <span class="num-0">o</span>
                <span class="num-4">4</span>
            </span>
            <?php
            if (isset($error_log)) {
                echo "<span class='text-log'>Log: " . $error_log . "</span>";
            }
            ?>
            <span class="text-error">Ewww. Trang bạn yêu cầu không tìm thấy.</span>
            <span class="text-home">Về trang chủ thôi.</span>
            <a class="home" href="<?php echo $index ?>">Trang Chủ</a>
        </div>
        <img class="img-right" src="<?php echo $imglink['404-page-right']; ?>" alt="">
    </div>

    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            background: white;
            overflow: hidden;
        }

        .box {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: 30%;
            min-width: 380px;
            position: relative;
        }

        .box img {
            position: fixed;
            z-index: -1;
            top: 0;
            bottom: 0;
        }

        .img-right {
            right: 0;
        }

        .img-left {
            left: 0;
        }

        .text-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;

            color: var(--text-lighter-color);
        }

        .num {
            font-size: 10rem;
            font-weight: 500;
            letter-spacing: 4px;
            color: var(--primary-color);

            display: flex;
            align-items: flex-start;
        }

        /* .num .num-4 {} */

        .num .num-0 {
            line-height: 11rem;
            font-size: 12rem;
            font-weight: 400;
        }

        .text-log {
            color: var(--text-lighter-color);
            font-size: 1.3rem;
            margin-top: -16px;
        }

        .text-error {
            font-size: 1.8rem;
            margin-top: 40px;
        }

        .text-home {
            font-size: 1.8rem;
            margin-bottom: 60px;
        }    

        .home {
            display: block;
            padding: 8px 80px;
            font-size: 2rem;
            text-decoration: none;
            border-radius: 8px;
            color: var(--primary-color);
            background: white;
            border: 1px solid var(--primary-color);
        }

        .home:hover {
            background: var(--primary-color);
            border: 1px solid transparent;
            color: white;
        }


        @media (max-width: 900px) {

            .box img {
                position: absolute;
            }

            .img-right {
                right: -70%;
            }

            .img-left {
                left: -70%;
            }
        }
    </style>

</body>

</html>