<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['hmmsuid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {


 $member=$_POST['member'];
 $tost=$_POST['tost'];
 $bsugar=$_POST['bsugar'];
 
$sql="insert into tblsugar(MemberID,Typeoftest,BloodSugar)values(:member,:tost,:bsugar)";
$query=$dbh->prepare($sql);
$query->bindParam(':member',$member,PDO::PARAM_STR);
$query->bindParam(':tost',$tost,PDO::PARAM_STR);
$query->bindParam(':bsugar',$bsugar,PDO::PARAM_STR);


 $query->execute();

   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Данные мониторинга уровня сахара добавлены")</script>';
echo "<script>window.location.href ='add-sugar.php'</script>";
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
    <title>Добавить уровень сахара</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
   <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
</head>

<body>
    <div class="main-wrapper">
       
        <?php include_once('includes/header.php');?>
        <?php include_once('includes/sidebar.php');?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">Добавить уровень сахара</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box">
                            <h4 class="card-title" style="color: #7373e8">Добавить уровень сахара</h4>
                            <form method="post">
                               
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Член семьи:</label>
                                    <div class="col-md-10">
                                        <select type="text" name="member" id="member" value="" class="form-control" required="true">
<option value="">Выберите члена семьи</option>
                                                        <?php 

$uid = $_SESSION['hmmsuid'];
$sql2 = "SELECT * from tblmember where UserID=:uid";
$query2 = $dbh -> prepare($sql2);
$query2->bindParam(':uid',$uid,PDO::PARAM_STR);
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
                                 <div class="form-group row">
                                    <label class="col-form-label col-md-2">Тип теста на сахар:</label>
                                    <div class="col-md-10">
                                        <select type="text" value="" name="tost" required="true" class="form-control">
                                            <option value="">Выберите тест</option>
                                            <option value="PPBS">Уровень сахара после приема пищи(PPBS)</option> <!--Post Prandial Blood Sugar(PPBS)-->
                                            <option value="FBS">Уровень сахара натощак(FBS)</option> <!--Fasting Blood Sugar(FBS)-->
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Уровень сахара <small>mg/dl</small>:</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" value="" name="bsugar" required="true">
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