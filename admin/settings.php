<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['hmmsaid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
{
$adminid=$_SESSION['hmmsaid'];
$cpassword=md5($_POST['currentpassword']);
$newpassword=md5($_POST['newpassword']);
$sql ="SELECT ID FROM tbladmin WHERE ID=:adminid and Password=:cpassword";
$query= $dbh -> prepare($sql);
$query-> bindParam(':adminid', $adminid, PDO::PARAM_STR);
$query-> bindParam(':cpassword', $cpassword, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);

if($query -> rowCount() > 0)
{
$con="update tbladmin set Password=:newpassword where ID=:adminid";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':adminid', $adminid, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();

echo '<script>alert("Ваш пароль успешно изменен")</script>';
 echo "<script>window.location.href ='settings.php'</script>";
} else {
echo '<script>alert("Неверный текущий пароль")</script>';

}
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Смена пароля</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <script type="text/javascript">
function checkpass()
{
if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
{
alert('Пароль не совпадает');
document.changepassword.confirmpassword.focus();
return false;
}
return true;
}   

</script>
   
</head>

<body>
    <div class="main-wrapper">
       
        <?php include_once('includes/header.php');?>
        <?php include_once('includes/sidebar.php');?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">Смена пароля</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box">
                            <h4 class="card-title" style="color: #7373e8">Смена пароля</h4>
                            <form method="post" onsubmit="return checkpass();" name="changepassword">
                                
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Текущий пароль:</label>
                                    <div class="col-md-10">
                                        <input type="password" class="form-control" style="font-size: 20px" required="true" name="currentpassword">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Новый пароль:</label>
                                    <div class="col-md-10">
                                        <input type="password" class="form-control"  required="true" name="newpassword" style="font-size: 20px">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Подтвердить пароль:</label>
                                    <div class="col-md-10">
                                        <input type="password" class="form-control"  required="true" name="confirmpassword" style="font-size: 20px" >
                                    </div>
                                </div>
                                                            
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary" name="submit">Изменить</button>
                                </div>
                            </form>
                        </div>
                   
                    </div>
                </div>
            </div>
           
        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/app.js"></script>
</body>


<!-- form-basic-inputs23:59-->
</html><?php }  ?>