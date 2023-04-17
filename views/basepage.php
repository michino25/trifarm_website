<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>

    <link rel="stylesheet" href="<?php echo $index ?>/assets/fonts/fontawesome-v6/css/all.min.css">
    <link rel="stylesheet" href="<?php echo $index ?>/assets/fonts/remixicon_fonts/remixicon.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">

    <link rel="stylesheet" href="<?php echo $index ?>/assets/css/base.css">
    <link rel="stylesheet" href="<?php echo $index ?>/assets/css/bootstrap.css">


    <title>TriFarm - Nông trại xanh</title>
    <link rel="shortcut icon" type="image/png" href="<?php echo $imglink['favicon']; ?>">
</head>

<body>
    <div class="container-fluid">
        <?php require_once "header/header.php" ?>

        <?php require_once "main/main.php" ?>

        <?php require_once "footer/footer.php" ?>
    </div>

</body>

</html>