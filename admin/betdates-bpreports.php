<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['hmmsaid']==0)) {
  header('location:logout.php');
  } else{
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Даты отчетов по артериальному давлению</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
   <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
    <script>
function getmem(val) {
  $.ajax({
type:"POST",
url:"get-mem.php",
data:'$memid='+val,
success:function(data){
$("#member").html(data);
}

  });
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
                        <h4 class="page-title">Даты отчетов по артериальному давелнию</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box">
                            <h4 class="card-title"style="color: #7373e8">Даты отчетов по артериальному давлению</h4>
                            <form method="post" action="bp-bwdates-reports-details.php">
                               
                                
                              
                                <div class="form-group">
                                    <label>С:</label>
                                    <div class="col-md-12 cal-icon">
                                        <input type="text" class="form-control datetimepicker" value="" name="fromdate" required="true">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>По:</label>
                                    <div class="col-md-12 cal-icon">
                                        <input type="text" class="form-control datetimepicker" value="" name="todate" required="true">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Пользователь</label>
                                    <div class="col-md-12">
                                        <select type="text" name="reguser" id="reguser" value="" class="form-control" required="true" onChange="getmem(this.value)">
<option value="">Выбрать пользователя</option>
                                                        <?php 

$sql2 = "SELECT * from   tbluser ";
$query2 = $dbh -> prepare($sql2);
$query2->execute();
$result2=$query2->fetchAll(PDO::FETCH_OBJ);

foreach($result2 as $row)
{          
    ?>  
<option value="<?php echo htmlentities($row->ID);?>"><?php echo htmlentities($row->FullName);?></option>
 <?php } ?> 
            
                                                        
                                                    </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Член семьи</label>
                                    <div class="col-md-12">
                                        <select type="text" name="member" id="member" value="" class="form-control" required="true">

            
                                                        
                                                    </select>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary" name="submit">Выбрать</button>
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