<?php

require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/config.php';

session_start();

if (!empty($_SESSION['_contact_form_error'])) {
    $error = $_SESSION['_contact_form_error'];
    unset($_SESSION['_contact_form_error']);
}

if (!empty($_SESSION['_contact_form_success'])) {
    $success = true;
    unset($_SESSION['_contact_form_success']);
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Связаться</title>
    <link rel="icon" href="img/favicon.png">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- themify CSS -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="css/flaticon.css">
    <!-- magnific popup CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- nice select CSS -->
    <link rel="stylesheet" href="css/nice-select.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="css/style.css">

    <!-- reCAPTCHA Javascript -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
<header class="main_menu home_menu">
<div class="container">
    <div class="row align-items-center">
        <div class="col-lg-12">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a style="color:#acacde" class="navbar-brand" href="index.php"><strong> Система Мониторинга Здоровья</strong> </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse main-menu-item justify-content-center"
                     id="navbarSupportedContent">
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php"><strong>Домашняя</strong></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="info.php"><strong>Информация</strong></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="user/login.php"><strong>Личный кабинет</strong></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="webform.php"><strong>Связаться</strong></a>
                        </li>
                        <!--<li class="nav-item">
                            <a class="nav-link" href="admin/login.php"><strong>Администратор</strong></a>
                        </li>-->

                    </ul>
                </div>
            </nav>
            <div class="card mt-5">
                <div class="card-body">
                    <h1 class="card-title">
                        Связаться
                    </h1>
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Document</title>
                        <link rel="stylesheet" href="webform.css" media="all">
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                        <script src="main.js"></script>
                    </head>




                    <?php
                    if (!empty($success)) {
                        ?>
                        <div class="alert alert-success">Ваше сообщение было успешно отправлено!</div>
                        <?php
                    }
                    ?>

                    <?php
                    if (!empty($error)) {
                        ?>
                        <div class="alert alert-danger"><?= $error ?></div>
                        <?php
                    }
                    ?>

                    <form method="post" action="submit.php">
                        <div class="form-group">
                            <label for="name">Ваше имя:</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="email">Ваш Email:</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="subject">Тема письма:</label>
                            <input type="text" name="subject" id="subject" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="message">Сообщение:</label>
                            <textarea name="message" id="message" class="form-control" rows="12"></textarea>
                        </div>

                        <div class="form-group text-center">
                            <div class="g-recaptcha" data-sitekey="<?= CONTACTFORM_RECAPTCHA_SITE_KEY ?>"></div>
                        </div>

                        <button class="btn btn-primary btn-block">Отправить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!--<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>-->
<!--<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>-->
<!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>-->
    <footer class="footer-area">
        <div class="copyright_part">
            <div class="container">
                <div class="row align-items-center">
                    <p class="footer-text m-0 col-lg-8 col-md-12">
                    <p style="color:navajowhite">Copyright &copy;<script>document.write(new Date().getFullYear());</script> Система мониторинга здоровья <i class="ti-heart" aria-hidden="true"></i></p>
                    </p>

                </div>
            </div>
        </div>
    </footer>
</body>
</html>

