<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.css">
  
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">


  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Question Paper | </b>Generator</a>
  </div>
  
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="login_process.php" method="post">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="user_email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="user_password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
       
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="login">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    

    <a href="forgot_password.php">I forgot my password</a><br>

   <?php
      if(isset($_GET['q'])){
          if($_GET['q'] == '1'){
              
          
    echo "<p style='color:red; padding-top=50px ;text-align:center'>Invalid user Eamil or Password!!!</p>";
          }
      }
  ?>
  </div>
  
</div>

<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>


<script type="text/javascript">
        function noBack()
         {
             window.history.forward()
         }
        noBack();
        window.onload = noBack;
        window.onpageshow = function(evt) { if (evt.persisted) noBack() }
        window.onunload = function() { void (0) }
    </script>
</body>
</html>
