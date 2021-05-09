<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['hmmsaid']==0)) {
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
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
    <div class="main-wrapper">
       <?php include_once('includes/header.php');?>
        <?php include_once('includes/sidebar.php');?>
        <div class="page-wrapper">

            <div class="content">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
							<span class="dash-widget-bg1"><i class="fa fa-users" aria-hidden="true"></i></span>
							<div class="dash-widget-info text-right">
                                <?php 
                        $sql1 ="SELECT * from  tbluser";
$query1 = $dbh -> prepare($sql1);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$totregusers=$query1->rowCount();
?>
								<h3><?php echo htmlentities($totregusers);?></h3>
								<span class="widget-title1">Пользователи</span>
							</div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg2"><i class="fa fa-user-o"></i></span>
                            <div class="dash-widget-info text-right">
                                <?php 
                        $sql2 ="SELECT * from  tblmember";
$query2 = $dbh -> prepare($sql2);
$query2->execute();
$results2=$query2->fetchAll(PDO::FETCH_OBJ);
$totmem=$query2->rowCount();
?>
                                <h3><?php echo htmlentities($totmem);?></h3>
                                <span class="widget-title2">Количество членов семьи</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg3"><i class="fa fa-heartbeat" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                 <?php 
                        $sql3 ="SELECT * from  tblbp";
$query3 = $dbh -> prepare($sql3);
$query3->execute();
$results3=$query3->fetchAll(PDO::FETCH_OBJ);
$totbp=$query3->rowCount();
?>
                                <h3><?php echo htmlentities($totbp);?></h3>
                                <span class="widget-title3">Артериальное давление</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg4"><i class="fa fa-tint" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <?php
                        $sql4 ="SELECT * from  tblsugar";
$query4 = $dbh -> prepare($sql4);
$query4->execute();
$results4=$query4->fetchAll(PDO::FETCH_OBJ);
$totsugar=$query4->rowCount();
 ?>
                                <h3><?php echo htmlentities($totsugar);?></h3>
                                <span class="widget-title4">Уровень сахара</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg5"><i class="fa fa-thermometer-empty" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <?php
                        $sql4 ="SELECT * from  tbltemp";
$query4 = $dbh -> prepare($sql4);
$query4->execute();
$results4=$query4->fetchAll(PDO::FETCH_OBJ);
$totsugar=$query4->rowCount();
?>
                                <h3><?php echo htmlentities($totsugar);?></h3>
                                <span class="widget-title5">Температура тела</span>
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

class="fa fa-thermometer-empty"
