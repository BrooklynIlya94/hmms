<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['submit']))
  {
    $fname=$_POST['fname'];
    $mobno=$_POST['mobno'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $ret="select Email, MobileNumber from tbluser where Email=:email || MobileNumber=:mobno";
    $query= $dbh -> prepare($ret);
    $query-> bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':mobno',$mobno,PDO::PARAM_INT);
    $query-> execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);
      if($query -> rowCount() == 0)
{
$sql="Insert Into tbluser(FullName,MobileNumber,Email,Password)Values(:fname,:mobno,:email,:password)";
$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':mobno',$mobno,PDO::PARAM_INT);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Вы успешно зарегистрированы');</script>";
}
else
{

echo "<script>alert('Что-то пошло не так  Пожалуйста попробуйте еще раз');</script>";
}
}
 else
{

echo "<script>alert('Почта или номер телефона уже используется. Пожалуйста попробуйте еще раз');</script>";
}
}

?>
<!DOCTYPE html>
<html lang="ru">
<head>
   
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Система мониторинга здоровья || Страница регистрации</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
   <script type="text/javascript">
// For Mobile availabilty
function checkmobAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'mobile='+$("#mobno").val(),
type: "POST",
success:function(data){
$("#user-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){
}
});
}

// For Email availabilty
function checkAvailability() {
$("#loaderIcon").css('display','block');
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").css('display','none');
},
error:function (){}
});
}

</script>
</head>

<body>
<p style="padding-top: 20px;padding-left: 20px"><a style="color:Black" href="../index.php"><span style="color:Black"><i class="fa fa-home" aria-hidden="true" style="font-size: 30px;padding-right: 10px"></i></span>На главную</a></p>
    <div class="main-wrapper  account-wrapper">
        <div class="account-page">
            <div class="account-center">
                <div class="account-box">
                    <form class="form-signin" method="post">
						<div class="account-logo">
                            <a href="login.php"><img src="assets/img/logo.svg" alt=""> </a>
                        </div>
                        <div class="form-group">
                            <label>Полное имя:</label>
                            <input type="text" value="" placeholder="ФИО" name="fname" required="true" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Номер телефона:</label>
                            <input type="text"  placeholder="+7(999)-999-99-99" name="mobno" id="mobno" class="form-control" required="true" maxlength="20" pattern="+[0-9]" onblur="return checkAvailability()" >
                            <span id="user-availability-status1"></span>
                        </div>
                        <div class="form-group">
                            <label>Почта:</label>
                            <input type="email" placeholder="Укажите адрес" class="form-control" value="" name="email" id="email" required="true" onBlur="return checkAvailability()">
                            <span id="user-availability-status"></span>
                        </div>
                        <div class="form-group">
                            <label>Пароль:</label>
                           <input type="password" value="" placeholder="Пароль от 8 до 20 символов" class="form-control" name="password" required="true">
                        </div>
                       
                      
                        <div class="form-group text-center">
                            <button  class="btn btn-primary account-btn" type="submit" id="submit" name="submit">Регистрация </button>

                        </div>
                        <div class="text-center login-link">
                            Уже есть аккаунт? <a href="login.php">Вход</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>


<!-- register24:03-->
</html>