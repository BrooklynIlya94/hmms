<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['submit']))
  {
    $email=$_POST['email'];
$mobile=$_POST['mobile'];
$newpassword=md5($_POST['newpassword']);
  $sql ="SELECT Email FROM tbladmin WHERE Email=:email and MobileNumber=:mobile";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
$con="update tbladmin set Password=:newpassword where Email=:email and MobileNumber=:mobile";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':email', $email, PDO::PARAM_STR);
$chngpwd1-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();
echo "<script>alert('Ваш пароль успешно изменен');</script>";
}
else {
echo "<script>alert('Идентификатор электронной почты или номер мобильного телефона недействительны');</script>";
}
}

?>
<!DOCTYPE html>
<html lang="en">
<!-- login-->
<head>
    <title>Система мониторинга здоровья || Восстановление пароля</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
   <script type="text/javascript">
function valid()
{
if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("Новый пароль и повторный не совпадают  !!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>
</head>

<body>
<p style="padding-top: 20px;padding-left: 20px"><a style="color:Black" href="../index.php"><span style="color:Black"><i class="fa fa-home" aria-hidden="true" style="font-size: 30px;padding-right: 10px"></i></span>На главную</a></p>
    <div class="main-wrapper account-wrapper">
        <div class="account-page">
			<div class="account-center">
				<div class="account-box">
                    <form class="form-signin" method="post" name="chngpwd" onSubmit="return valid();">
						<div class="account-logo">
                            <a href="login.php"><img src="assets/img/logo.svg" alt=""></a>
                        </div>
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="email"  class="form-control" value="" placeholder="Укажите адрес" name="email" required="true">
                        </div>
                        <div class="form-group">
                            <label>Номер телефона:</label>
                            <input type="text" class="form-control" placeholder="7(999)-999-99-99" name="mobile" required="true" maxlength="20" pattern="+[0-9]">
                        </div>
                        <div class="form-group">
                            <label>Новы пароль:</label>
                            <input type="password" placeholder="Пароль от 8 до 20 символов" name="newpassword" required="true" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Повторите пароль:</label>
                            <input type="password" placeholder="Повторный пароль" name="confirmpassword" required="true" class="form-control">
                        </div>
                        <div class="form-group text-right">
                            <a href="login.php" style="color: red">Войти</a>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary account-btn" name="submit">Восстановить</button>
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
</html>