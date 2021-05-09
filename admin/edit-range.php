<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['hmmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {


 $tname=$_POST['tname'];
 $desc=$_POST['desc'];
 $eid=$_GET['editid'];
$sql="update tblrange set TestName=:tname,Description=:desc where ID =:eid";
$query=$dbh->prepare($sql);
$query->bindParam(':tname',$tname,PDO::PARAM_STR);
$query->bindParam(':desc',$desc,PDO::PARAM_STR);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);


 $query->execute();

   echo '<script>alert("Диапазон тестов обновлен")</script>';
    echo "<script>window.location.href ='manage-range.php'</script>";

  }

  


?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Система мониторинга здоровья - Диапазоны</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
   <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
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
                        <h4 class="page-title">Обновить диапазоны тестирований</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box">
                            <h4 class="card-title">Обновить диапазоны тестирований</h4>
                            <form method="post">
                               <?php
$eid=$_GET['editid'];
$sql="SELECT * from  tblrange where ID=:eid";
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
                                    <label class="col-form-label col-md-2">Название теста</label>
                                    <div class="col-md-10">
                                        <select type="text" name="tname" id="tname" value="" class="form-control" required="true">
<option value="<?php  echo $row->TestName;?>"><?php  echo $row->TestName;?></option>
                                                        
<option value="Артериальное давление">Артериальное давление</option>
<option value="Уровень сахара">Уровень сахара</option>
<option value="Температура тела">Температура тела</option>
 
            
                                                        
                                                    </select>
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label class="col-form-label col-md-2">Описание</label>
                                    <div class="col-md-10">
                                        <textarea type="text" value="" name="desc" required="true" class="form-control"><?php  echo $row->Description;?></textarea>

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
     <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script>
            $(function () {
                $('#datetimepicker3').datetimepicker({
                    format: 'LT'

                });
            });
     </script>
</body>


<!-- form-basic-inputs23:59-->
</html><?php }  ?>