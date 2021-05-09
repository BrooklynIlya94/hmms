<?php
session_start();
//error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['hmmsuid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$eid=$_GET['editid'];
 $fname=$_POST['fname'];
 $gender=$_POST['gender'];
 $age=$_POST['age'];
 $weight=$_POST['weight'];
 $relation=$_POST['relation'];

$sql="update tblmember set FullName=:fname,Gender=:gender,Age=:age,Weight=:weight,Relation=:relation where ID =:eid";

$query=$dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':gender',$gender,PDO::PARAM_STR);
$query->bindParam(':age',$age,PDO::PARAM_STR);
$query->bindParam(':weight',$weight,PDO::PARAM_STR);
$query->bindParam(':relation',$relation,PDO::PARAM_STR);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
 $query->execute();

   echo '<script>alert("Данные члена семьи были обновлены")</script>';
    echo "<script>window.location.href ='manage-member.php'</script>";

  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Система мониторинга здоровья - Обновление члена семьи</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
   <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
</head>

<body>
    <div class="main-wrapper">
       
        <?php include_once('includes/header.php');?>
        <?php include_once('includes/sidebar.php');?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">Обновление члена семьи</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box">
                            <h4 class="card-title">Обновление члена семьи</h4>
                            <form method="post">
                               <?php
$eid=$_GET['editid'];
$sql="SELECT * from  tblmember where ID=:eid";
$query = $dbh -> prepare($sql);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
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
                                        <input type="text" value="<?php  echo $row->FullName;?>" name="fname" required="true" class="form-control">
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label class="col-form-label col-md-2">Возраст (лет):</label>
                                    <div class="col-md-10">
                                        <input type="text" value="<?php  echo $row->Age;?>" name="age" required="true" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Пол:</label>
                                    <div class="col-md-10">
                   <?php if($row->Gender=="Male")
{?>                    
              <input type="radio" name="gender" id="gender" value="Female" >Женский</label>
              <label>
              <input type="radio" name="gender" id="gender" value="Male" checked="true">Мужской
                            </label><?php } if($row->Gender=="Female")

{?>


                             <input type="radio" name="gender" id="gender" value="Female" checked="true" >Женский</label>
              <label>
              <input type="radio" name="gender" id="gender" value="Male" >Мужской
          <?php } ?>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Вес (в КГ):</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" value="<?php  echo $row->Weight;?>" name="weight" required="true">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Родство:</label>
                                    <div class="col-md-10">
                                        <select type="text" class="form-control" name="relation" required="true">
                                            <option value="<?php  echo $row->Relation;?>"><?php  echo $row->Relation;?></option>
                                            <option value="Отец">Отец</option>
                                            <option value="Мать">Мать</option>
                                            <option value="Брат">Брат</option>
                                            <option value="Сестра">Сестра</option>
                                            <option value="Супруга">Супруга</option>
                                            <option value="Дочь">Дочь</option>
                                            <option value="Сын">Сын</option>
                                            <option value="Другое">Другое</option>
                                        </select>
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