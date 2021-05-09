<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['hmmsaid']==0)) {
  header('location:logout.php');
  } else{
     if(isset($_POST['submit']))
  {
    $adminid=$_SESSION['hmmsaid'];
    $AName=$_POST['adminname'];
  $mobno=$_POST['mobilenumber'];
  $email=$_POST['email'];
  $sql="update tbladmin set AdminName=:adminname,MobileNumber=:mobilenumber,Email=:email where ID=:aid";
     $query = $dbh->prepare($sql);
     $query->bindParam(':adminname',$AName,PDO::PARAM_STR);
     $query->bindParam(':email',$email,PDO::PARAM_STR);
     $query->bindParam(':mobilenumber',$mobno,PDO::PARAM_STR);
     $query->bindParam(':aid',$adminid,PDO::PARAM_STR);
$query->execute();

        echo '<script>alert("Профиль был обновлен")</script>';
     echo "<script>window.location.href ='profile.php'</script>";

  }
  ?>
<!DOCTYPE html>
<html lang="en">
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

$sql="SELECT * from  tbladmin";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Имя администратора:</label>
                                    <div class="col-md-10">
                                       <input type="text" class="form-control"  name="adminname" value="<?php  echo $row->AdminName;?>" required='true'>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Имя пользователя:</label>
                                    <div class="col-md-10">
                                       <input type="text" class="form-control" name="username" value="<?php  echo $row->UserName;?>" readonly="true">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Почта:</label>
                                    <div class="col-md-10">
                                        <input type="email" class="form-control" name="email" value="<?php  echo $row->Email;?>" required='true'>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Номер телефона:</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="mobilenumber" value="<?php  echo $row->MobileNumber;?>" required='true' maxlength='10'>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Дата регистрации:</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="email2" name="" value="<?php  echo $row->AdminRegdate;?>" readonly="true">
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