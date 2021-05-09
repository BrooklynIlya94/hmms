<div class="header">
      <div class="header-left">
        <a href="dashboard.php" class="logo">
          <span>HMMS</span> <!--Health Monitoring Management System-->
        </a>
      </div>
      <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
            <ul class="nav user-menu float-right">
                
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img">
              <img class="rounded-circle" src="assets/img/user.jpg" width="24" alt="Admin">
              <span class="status online"></span>
            </span>
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
            <span><?php  echo $row->FullName;?></span>
            <small>(<?php  echo $row->Email;?>)</small><?php $cnt=$cnt+1;}} ?>
                    </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="profile.php">Профиль</a>
            <a class="dropdown-item" href="settings.php">Настройки</a>
            <a class="dropdown-item" href="logout.php">Выйти</a>
          </div>
                </li>
            </ul>
            <div class="dropdown mobile-user-menu float-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="profile.php">Профиль</a>
            <a class="dropdown-item" href="settings.php">Настройки</a>
            <a class="dropdown-item" href="logout.php">Выйти</a>
                </div>
            </div>
        </div>