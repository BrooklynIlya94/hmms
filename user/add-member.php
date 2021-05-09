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
 $fname=$_POST['fname'];
 $gender=$_POST['gender'];
 $age=$_POST['age'];
 $weight=$_POST['weight'];
 $relation=$_POST['relation'];

$sql="insert into tblmember(UserID,FullName,Gender,Age,Weight,Relation)values(:uid,:fname,:gender,:age,:weight,:relation)";
$query=$dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':gender',$gender,PDO::PARAM_STR);
$query->bindParam(':age',$age,PDO::PARAM_STR);
$query->bindParam(':weight',$weight,PDO::PARAM_STR);
$query->bindParam(':relation',$relation,PDO::PARAM_STR);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
 $query->execute();

   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Ваш член семьи был успешно добавлен.")</script>';
echo "<script>window.location.href ='add-member.php'</script>";
  }
  else
    {
         echo '<script>alert("Что-то пошло не так. Пожалуйста попробуйте еще раз")</script>';
    }

  
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Добавление члена семьи</title>
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
                        <h4 class="page-title">Добавить члена семьи</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box">
                            <h4 class="card-title" style="color: #7373e8">Добавить члена семьи</h4>
                            <form method="post">
                               
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Полное имя:</label>
                                    <div class="col-md-10">
                                        <input type="text" value="" name="fname" required="true" class="form-control">
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label class="col-form-label col-md-2">Возраст (лет):</label>
                                    <div class="col-md-10">
                                        <input type="text" value="" name="age" required="true" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Пол:</label>
                                    <div class="col-md-10">
                                       
              <input type="radio" name="gender" id="gender" value="Женский" checked="true">Женский</label>
              <label>
              <input type="radio" name="gender" id="gender" value="Мужской" checked="true">Мужской</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Вес (в КГ):</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" value="" name="weight" required="true">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Родство:</label>
                                    <div class="col-md-10">
                                        <select type="text" value="" class="form-control" name="relation" required="true">
                                            <option value="">Выбрать родство</option>
                                            <option value="Отец">Отец</option>
                                            <option value="Мать">Мать</option>
                                            <option value="Брат">Брат</option>
                                            <option value="Сестра">Сестра</option>
                                            <option value="Супруга">Супруга</option>
                                            <option value="Супруг">Супруг</option>
                                            <option value="Дочь">Дочь</option>
                                            <option value="Сын">Сын</option>
                                            <option value="Другое">Другое</option>
                                        </select>
                                    </div>
                                </div>
                               
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary" name="submit">Добавить</button>
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