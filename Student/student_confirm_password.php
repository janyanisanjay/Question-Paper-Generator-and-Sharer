<?php
session_start();
require_once("../includes/db.php");
global $connection;
//$id=$_GET['id'];
$student_id=$_SESSION['student_id'];
   ?> 
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Student | Dashboard</title>
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
  <style>
    .button2:hover {
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
    margin-top: 50px;
    border: 1px solid;
        
}
      .button2{
          font-size: 20px;
      }
</style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php require_once("student_header.php");  ?>
  <!-- Left side column. contains the logo and sidebar -->
  <!-- Left side column. contains the logo and sidebar -->
  <?php require_once("student_sidebar.php"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="student_dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
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
    <a href="#"><b>Change | </b>Password</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Change Your Password</p>

    <form action="update_password.php" method="post" onsubmit="return validateForm()" name="myForm">
      
      
      
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Enter your new Password" name="first_password" id="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <p clas="form-control" id="student_password" style="color:red;"></p>
      </div>
      
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Confirm Password" name="second_password" id="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <p clas="form-control" id="student_password" style="color:red;"></p>
      </div>
      
      
      
      <?php
      if(isset($_GET['q'])){
          if($_GET['q'] == '1'){
              
          
    echo "<p style='color:red; padding-top=50px ;text-align:center'>Password doesnot match!!!</p>";
          }
      }
  ?>
      
      
       
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
          <button type="submit" id="register" class="btn btn-primary btn-block btn-flat" name="add_student" >Confirm!</button>
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
            
            
            
            
            
            
            
            
            
            
		
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2017-2018 Vesit Students.</strong> All rights
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

<script src="../dist/js/demo.js"></script></body>


<script type="text/javascript">

   
    function showResult(str){
        if (str.length==0)
  { 
    document.getElementById("show").innerHTML="";
    document.getElementById("show").style.border="0px";
    return;
  }
        xmlhttp = new XMLHttpRequest();
//                window.alert();

        xmlhttp.onreadystatechange = function(){
//                    window.alert();

            if (this.readyState==4 && this.status==200) {
      document.getElementById("show").innerHTML=this.responseText;
//      document.getElementById("show").style.border="1px solid #A5ACB2";
        }
    }
        
  xmlhttp.open("GET","search.php?q="+str,true);
  xmlhttp.send();
    
}


    function off(){
//        window.alert();
        var x= document.getElementById("display");
//        if (x.style.display === "none") {
//        x.style.display = "block";
//        } else {
//        x.style.display = "none";
//        }
        x.style.display = "none";
}
// 
//    function on(){
////        window.alert();
//        var x= document.getElementById("display");
//        x.style.display = "block";
//        
//}   
    
    </script>    


</html>
