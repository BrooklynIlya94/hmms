<?php
    $message_sent = false;
    if(isset($_POST['email']) && $_POST['email'] != ''){

        if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {

            $userName = $_POST['name'];
            $userEmail = $_POST['email'];
            $messageSubject = $_POST['subject'];
            $message = $_POST['message'];

            $to = "ilya1994kaloshin@gmail.com";
            $body = "";

            $body .= "From: " .$userName. "\r\n";
            $body .= "Email: " .$userEmail. "\r\n";
            $body .= "Message: " .$message. "\r\n";

            mail($to,$messageSubject,$body);

            $message_sent = true;
        }
        else{
            $invalid_class_name = "form-invalid";
        }

    }

?>

<!doctype html>
<html lang="ru">


<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Связаться</title>
    <link rel="icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
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

</head>

<body>
<!--::header part start::-->
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
            </div>
        </div>
    </div>

</header>
<!-- Header part end-->

<!-- banner part start-->
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="webform.css" media="all">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="main.js"></script>
</head>

<body2>
    <?php
    if($message_sent):
    ?>
        <div class="wrapper">
            <div class="typing-demo">
                Сообщение отправлено!
            </div>
        </div>

    <!--<h3 class="notification">Сообщение отправлено!</h3>-->
    <?php
    else:
    ?>

    <div class="container2">
        <form action="webform.php" method="POST" class="form">
            <div class="form-group">
                <label for="name" class="form-label">Your Name</label>
                <input type="text" class="form-control"   id="name" name="name" placeholder="Иван Иванов" tabindex="1" required>
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input <?= $invalid_class_name ?? "" ?> type="email" class="form-control" id="email" name="email" placeholder="ivan@ivanov.com" tabindex="2" required>
            </div>
            <div class="form-group">
                <label for="subject" class="form-label">Subject</label>
                <input type="text" class="form-control" id="subject" name="subject" placeholder="Тема" tabindex="3" required>
            </div>
            <div class="form-group">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" rows="5" cols="50" id="message" name="message" placeholder="Введите сообщение..." tabindex="4"></textarea>
            </div>
            <div>
                <button type="submit" class="btn">Отправить</button>
            </div>
        </form>

    </div>

    <?php
    endif;
    ?>
</body2>

</html>
<!-- banner part start-->

<!--::regervation_part end::-->

<!--::blog_part end::-->

<!-- footer part start-->



<!-- footer part end-->

<!-- jquery plugins here-->

<script src="js/jquery-1.12.1.min.js"></script>
<!-- popper js -->
<script src="js/popper.min.js"></script>
<!-- bootstrap js -->
<script src="js/bootstrap.min.js"></script>
<!-- owl carousel js -->
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<!-- contact js -->
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="js/jquery.form.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/mail-script.js"></script>
<script src="js/contact.js"></script>
<!-- custom js -->
<script src="js/custom.js"></script>

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
