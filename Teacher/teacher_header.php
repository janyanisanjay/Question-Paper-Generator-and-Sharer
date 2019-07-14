<?php
session_start();
require_once("../includes/db.php");
global $connection;
//$id=$_GET['id'];
$teacher_id=$_SESSION['teacher_id'];
//echo $teacher_id;
?>
   <header class="main-header"><!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Q</b>PG</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Vesit QP</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <!-- Notifications: style can be found in dropdown.less -->
          
          <!-- Tasks: style can be found in dropdown.less -->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
<!--              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">-->
             
             <?php
                require_once("../includes/db.php");
                global $connection;
////                echo $_SESSION['student_id'];
//                $teacher_id=$_SESSION['teacher_id'];
//                echo $teacher_id;
                $query="select * from teacher where teacher_id= $teacher_id";
                
//                echo $query;
                $result_set = mysqli_query($connection,$query);
                $row=mysqli_fetch_assoc($result_set);
//                $value=$row['notification_status'];
                $name = $row['teacher_name'];
                $email = $row['teacher_email'];
//                if($value !=0){
//             echo  "<span class='label label-warning' >$value</span>";
                
                
              ?>
              <span class="hidden-xs"><i style="padding-right:10px;" class="fa fa-user"></i><?php echo $name ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
<!--                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">-->
                <div>
                
                  <h3>Name: <span class="label label-default"><?php echo $name;?></span></h3>
                  <h3>Email: <span class="label label-default"><?php echo $email;?></span></h3>

                  </div>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="teacher_change_password.php" class="btn btn-default btn-flat">Change Password</a>
                </div>
                <div class="pull-right">
                  <form action="logout.php" method = "post">
                      <button class="btn btn-default btn-flat" name="logout">Logout</button>
                  </form>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>
<?php
    
//    session_destroy();
    
    ?>