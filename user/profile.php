<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['hmmsuid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    $uid=$_SESSION['hmmsuid'];
    $AName=$_POST['fname'];
  $mobno=$_POST['mobno'];
  $email=$_POST['email'];
  $sql="update tbluser set FullName=:name where ID=:uid";
     $query = $dbh->prepare($sql);
     $query->bindParam(':name',$AName,PDO::PARAM_STR);
     $query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->execute();

        echo '<script>alert("Профиль был обновлен")</script>';
echo "<script>window.location.href ='profile.php'</script>";

     

  }
  ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Профиль</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
   
</head>

<body>
    <div class="main-wrapper">
       
        <?php include_once('includes/header.php');?>
        <?php include_once('includes/sidebar.php');?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">Просмотреть профиль</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box">
                            <h4 class="card-title" style="color: #7373e8">Профиль</h4>
                            <form method="post">
                                <?php
$uid=$_SESSION['hmmsuid'];
$sql="SELECT * from  tbluser where ID=:uid";
$query = $dbh -> prepare($sql);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Полное имя:</label>
                                    <div class="col-md-10">
                                        <input type="text" value="<?php  echo $row->FullName;?>" name="fname" required="true" class="form-control" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Номер телефона:</label>
                                    <div class="col-md-10">
                                        <input type="text" value="<?php  echo $row->MobileNumber;?>" name="mobno"  required="true" class="form-control" maxlength="20" pattern="+[0-9]" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Почта:</label>
                                    <div class="col-md-10">
                                        <input type="email" class="form-control" value="<?php  echo $row->Email;?>" name="email" required="true" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Дата регистрации:</label>
                                    <div class="col-md-10">
                                        <input type="text" value="<?php  echo $row->RegDate;?>" class="form-control" name="password" readonly="true">
                                    </div>
                                </div>
                                <?php $cnt=$cnt+1;}} ?>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary" name="submit">Обновить</button>
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