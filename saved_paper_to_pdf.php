<?php
//session_start();
?>
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
<!--  <link rel="stylesheet" href="modalcss.css">-->
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
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
<section class="content">
      
        <div class="row">
            <div class="container">
                <div class="col-md-11">
                   <h1>Question Paper Goes Here</h1>
                    <?php
                    //session_start();
                    require_once("../includes/db.php");
                    
                    require_once("display_paper.php");
                    
                    ?>
                        
                <form action="save_paper.php" method="post">
                    <div class="col-md-12">
                         <div class="col-md-10">
                        <!--    <button id="myModal" type="button" class="btn btn-success pull-right ">Save</button>-->
                           
                            <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">Save</button>
                            <!-- Modal -->
                            <div id="myModal" class="modal fade" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Please Confirm!</h4>
                                        </div>
                                        
                                <div class="modal-body">
                                    <div class="form-group has-feedback">
                                        <input type="text" name="generated_paper_name" class="form-control" placeholder="Question Paper name">
                        <!--                <span class="glyphicon glyphicon-user form-control-feedback"></span>-->
                                      </div>

                              </div>
                                        <div class="modal-footer">
                                          
                                           <button type="Submit" name="save" class="btn btn-success btn-default">Save</button>
                                           
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                       </div>
                            <div class="col-md-2">
                                <button type="Submit" class="btn btn-info btn-lg">Regenerate</button>
                            </div>
                    </div>     
                </form>
              </div>
            </div>
        </div>    
</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2017-2018 <a href="https://adminlte.io">Vesit Students</a>.</strong> All rights
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
<!--<script src="modal.js"></script>-->
</body>
</html>
