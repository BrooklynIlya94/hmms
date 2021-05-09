<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');


 if(isset($_POST['$memid'])){
 $mid=$_POST['$memid'];

  $query="select * from tblmember where UserID=:mid"; ?>
<option value="">Выбрать члена семьи</option>
  <?php
$query2 = $dbh -> prepare($query);
$query2->bindParam(':mid',$mid,PDO::PARAM_STR);
$query2->execute();
$result2=$query2->fetchAll(PDO::FETCH_OBJ);

foreach($result2 as $row)
{          
    ?>  
<option value="<?php echo htmlentities($row->ID);?>"><?php echo htmlentities($row->FullName);?></option>

                  

<?php }} ?>