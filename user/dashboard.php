<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['hmmsuid']==0)) {
  header('location:logout.php');
  } else{
    
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Панель управления</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-12">
                        <div class="dash-widget">
							
							<div class="dash-widget-info text-right">
								<?php
$uid=$_SESSION['hmmsuid'];
$sql="SELECT FullName,Email from  tbluser where ID=:uid";
$query = $dbh -> prepare($sql);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>

<h3 style="text-align: center;color: #59659e">Добро пожаловать в систему мониторинга здоровья,  <?php  echo $row->FullName;?></h3>
    <?php $cnt=$cnt+1;}} ?>
							</div>
                        </div>
                    </div>
                  
                    
                   
                </div>
				<div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-12">
                        <div class="dash-widget">
                            
                            <div class="dash-widget-info text-right">
                                

<h3 style="text-align: center;color: #59659e">Диапазоны значений</h3>

    <table border="1" class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
<tr>
    <th style="text-align: center;">Название теста</th>
    <th style="text-align: center;">Описание</th>
     </tr>
     <?php

$sql="SELECT * from  tblrange";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
  <tr>
    <td><?php  echo $row->TestName;?></td>
    <td style="text-align: left;"><?php  echo $row->Description;?></td>
  </tr>
<?php $cnt=$cnt+1;}} ?>


</table> 

   
                            </div>
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
    <script src="assets/js/Chart.bundle.js"></script>
    <script src="assets/js/chart.js"></script>
    <script src="assets/js/app.js"></script>

</body>
</html><?php }  ?>