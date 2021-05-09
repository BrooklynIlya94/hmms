<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['hmmsuid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_GET['delid']))
{
$rid=intval($_GET['delid']);
$sql="delete from tblsugar where ID=:rid";
$query=$dbh->prepare($sql);
$query->bindParam(':rid',$rid,PDO::PARAM_STR);
$query->execute();
 echo "<script>alert('Данные удалены');</script>";
  echo "<script>window.location.href = 'history-temparture.php'</script>";


}
  
?>
<!DOCTYPE html>
<html lang="en">


<!-- patients23:17-->
<head>
    
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>История по температуре тела</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    
</head>

<body>
    <div class="main-wrapper">
      
   <?php include_once('includes/header.php');?>
        <?php include_once('includes/sidebar.php');?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">История по температуре тела</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="add-temparture.php" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Добавить температуру тела</a>
                    </div>
                </div>
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-border table-striped custom-table datatable mb-0">
								<thead>
									<tr>
                                        <th>Номер</th>
										<th>Имя</th>
										<th>Возраст</th>
										<th>Вес</th>
										<th>Пол</th>
										<th>Родство</th>
										<th class="text-right">Действие</th>
									</tr>
								</thead>
								<tbody>
                                    <?php
                            
$uid = $_SESSION['hmmsuid'];           
$sql="SELECT * from tblmember where UserID=:uid";
$query = $dbh -> prepare($sql);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
									<tr>
                                        <td><?php echo htmlentities($cnt);?></td>
										<td><img width="28" height="28" src="assets/img/user.jpg" class="rounded-circle m-r-5" alt=""> <?php  echo htmlentities($row->FullName);?></td>
										<td><?php  echo htmlentities($row->Age);?></td>
										<td><?php  echo htmlentities($row->Weight);?></td>
										<td><?php  echo htmlentities($row->Gender);?></td>
										<td><?php  echo htmlentities($row->Relation);?></td>
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="view-temparturehistory.php?viewid=<?php echo ($row->ID);?>"><i class="fa fa-pencil m-r-5"></i> Просмотр</a>
													<a class="dropdown-item" href="history-temparture.php?delid=<?php echo ($row->ID);?>" data-toggle="modal"><i class="fa fa-trash-o m-r-5"></i> Удалить</a>
												</div>
											</div>
										</td>
									</tr>
						<?php $cnt=$cnt+1;}} ?>
								</tbody>
							</table>
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
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>
</html><?php }  ?>