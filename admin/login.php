<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login'])) 
  {
    $username=$_POST['username'];
    $password=($_POST['password']);
    $sql ="SELECT ID FROM tbladmin WHERE UserName=:username and Password=:password";
    $query=$dbh->prepare($sql);
    $query-> bindParam(':username', $username, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0)
{
foreach ($results as $result) {
$_SESSION['hmmsaid']=$result->ID;
}

  if(!empty($_POST["remember"])) {
//COOKIES for username
setcookie ("user_login",$_POST["username"],time()+ (10 * 365 * 24 * 60 * 60));
//COOKIES for password
setcookie ("userpassword",$_POST["password"],time()+ (10 * 365 * 24 * 60 * 60));
} else {
if(isset($_COOKIE["user_login"])) {
setcookie ("user_login","");
if(isset($_COOKIE["userpassword"])) {
setcookie ("userpassword","");
        }
      }
}
$_SESSION['login']=$_POST['username'];
echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
} else{
echo "<script>alert('Неверные данные');</script>";
}
}

?>
<!DOCTYPE html>
<html lang="en">
<!-- login-->
<head>
    <title>Вход</title>
    <link rel="icon" href="img/favicon.png">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
   
</head>

<body>
<p style="padding-top: 20px;padding-left: 20px"><a style="color:Black" href="../index.php"><span style="color:Black"><i class="fa fa-home" aria-hidden="true" style="font-size: 30px;padding-right: 10px"></i></span>На главную</a></p>
    <div class="main-wrapper account-wrapper">
        <div class="account-page">
			<div class="account-center">
				<div class="account-box">
                    <form class="form-signin" method="post">
						<div class="account-logo">
                            <a href="login.php"><img src="assets/img/logo.svg" alt=""></a>
                        </div>
                        <div class="form-group">
                            <label>Введите имя:</label>
                            <input type="text" class="form-control" required="true" name="username" value="<?php if(isset($_COOKIE["user_login"])) { echo $_COOKIE["user_login"]; } ?>" placeholder="Имя">
                        </div>
                        <div class="form-group">
                            <label>Пароль:</label>
                            <input type="password"  class="form-control" name="password" required="true" placeholder="Пароль" value="<?php if(isset($_COOKIE["userpassword"])) { echo $_COOKIE["userpassword"]; } ?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}">
                        </div>
                        <div class="form-group">
                            
            <div class="form-group text-right">
              <input type="checkbox" id="remember" name="remember" <?php if(isset($_COOKIE["user_login"])) { ?> checked <?php } ?>>
              <label for="remember">
                Запомнить меня
              </label>
            
          </div>
                        </div>
                        <div class="form-group text-right">
                            <a href="forgot-password.php">Забыли пароль?</a>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary account-btn" name="login">Вход</button>
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