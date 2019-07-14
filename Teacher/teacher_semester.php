<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Teacher | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/style.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
<!--  <link rel="stylesheet" href="bower_components/morris.js/morris.css">-->
  <!-- jvectormap -->
<!--  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">-->
  <!-- Date Picker -->
<!--  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">-->
  <!-- Daterange picker -->
<!--  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">-->
  <!-- bootstrap wysihtml5 - text editor -->
<!--  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">-->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php require_once("teacher_header.php");  ?>
  <!-- Left side column. contains the logo and sidebar -->
  <!-- Left side column. contains the logo and sidebar -->
  <?php require_once("teacher_sidebar.php"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
<!--        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>-->
          <li ><a href="teacher_dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li ><a href="#"><i class="fa fa-edit"></i> Create Test</a></li>
        <li class="active"><i class="fa fa-circle-o"></i> Semester</li>
      </ol>
    </section>

    <!-- Main content -->
        <section class="content">
      
      
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
       <div class="container">
          <div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>Teacher | </b>Semester</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Choose Wisely , Live well!</p>
<!---->
    <form action="teacher_semester_paper.php" method="get" onsubmit="return validateForm()" name="myForm">

      <div class="form-group has-feedback">
              <select name="subject_id" class="input-field form-control" id="subject" >
              <option value=''>Select Subject</option>
              <?php
                 require_once("../includes/db.php");
                 global $connection;
                  $query ="select * from subject";
                  $result_set=mysqli_query($connection,$query);
                  $num=mysqli_num_rows($result_set);
                  echo num;

                  $count=0;
                  while($count != $num){
                      $row=mysqli_fetch_assoc($result_set);
                      $name=$row['subject_name'];
                      $id = $row['subject_id'];
                      echo "<option value=$id>$name</option>";
                      $count = $count+1;
                  }
                ?>
              </select>
              <p clas="form-control" id="subject_select" style="color:red;"></p>
        </div>
        
        
        <div class="form-group has-feedback">
              <select name="difficulty" class="input-field form-control" id="difficulty" >
              <option value=''>Select Difficulty Level</option>
              <option value="1" class="input-dropdown">Easy</option>
                <option value="2" class="input-dropdown">Average</option>
                <option value="3" class="input-dropdown">Hard</option>
                
              </select>
              <p clas="form-control" id="diff" style="color:red;"></p>
        </div>
        

        
        
        
        
        
<!--
      <div class="form-group has-feedback">
        
                 
              <select name="difficulty" class="input-field form-control" id="difficulty">
                <option value=''>Select Difficulty..</option>
                <option value="1" class="input-dropdown">Easy</option>
                <option value="2" class="input-dropdown">Average</option>
                <option value="3" class="input-dropdown">Hard</option>
                
                <p clas="form-control" id="difficulty_select" style="color:red;"></p>
              </select>
            
      </div>
      
-->
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
<!--
            <label>
              <input type="checkbox"> I agree to the <a href="#">terms</a>
            </label>
-->
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Generate</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

<!--
    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
        Google+</a>
    </div>
-->

<!--    <a href="login.html" class="text-center">I already have a membership</a>-->
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

           
</div>
       
        <!-- Left col -->
        
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
<!--
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
-->
    <strong>Copyright &copy; 2017-2018 Vesit Students</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>

<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="../dist/js/adminlte.min.js"></script>

<script src="../dist/js/pages/dashboard.js"></script>

<script src="../dist/js/demo.js"></script>
<script src="validation/semester_paper.js"></script>
</body>
</html>
