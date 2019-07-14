<?php
//session_start();
error_reporting(0);
require_once("../includes/db.php");

$paper_id=$_GET['id'];
$total = 0;
function fetch_data(){
        global $connection;
    global $total;
        
        $paper_id=$_GET['id'];
        session_start();
            $_SESSION['paper_id'] = $paper_id;
//        echo $paper_id;
        $output = '';
    
        $query="select * from generated_paper where generated_paper_id = $paper_id";
        $result_set=mysqli_query($connection,$query);
        $num_rows = mysqli_num_rows($result_set);
        $count=0;
        while($num_rows != $count){
            $row = mysqli_fetch_assoc($result_set);
            $main_questionNumber= $row['question_number'];
            $sub_question = $row['question_number_sub'];
            $question_statement = $row['question_statement'];
            $question_marks = $row['question_marks'];
            $question_id = $row['question_id'];
            $output .= "<tr>
                            <td style='font-size:15px;'>$main_questionNumber</td>
                            <td style='font-size:15px;'>$sub_question</td>
                            <td style='font-size:15px;'>$question_statement</td>
                            <td style='font-size:15px;'>$question_marks</td>
                            <td><li class='list-group-item list-group-item-info'><a href ='paper_to_pdf.php?id={$paper_id}&edit=$paper_id&question_id={$question_id}'>Edit</a></li></td>
                       </tr>";
            $count=$count+1;
            $total = $total+$question_marks;
            
        }
            return $output;
}

function editQuestions()
{
    global $connection;
   $paper_id = $_GET['edit'];
    $question_id=$_GET['question_id'];
    
    
   
        $query  = "select * from generated_paper where generated_paper_id = $paper_id and question_id=$question_id";
        
        $select_question_id = mysqli_query($connection  , $query);
        while($row = mysqli_fetch_assoc($select_question_id))
        {   $question_number = $row['question_number'];
            $question_number_sub = $row['question_number_sub'];
            $question_id = $row['question_id'];
            $question_statement = $row['question_statement'];
            
            $marks = $row['question_marks'];

?>
          <form action="edit_generated_question.php" method="POST">
           <input type="hidden" value="<?php if(isset($question_id)){echo $question_id; }  ?>" class="form-control" name="question_id" >
           <input type="text" value="<?php if(isset($question_number)){echo $question_number; }  ?>" class="form-control" name="question_number" >
           <input type="text" value="<?php if(isset($question_number_sub)){echo $question_number_sub; }  ?>" class="form-control" name="question_number_sub" placeholder="Sub Question Number">
            <input type="text" value="<?php if(isset($question_statement)){echo $question_statement; }  ?>" class="form-control" name="question_statement" placeholder="Question Statement">
             
             
             
             <input id="change_marks" type="text" value="<?php if(isset($marks)){echo $marks; }  ?>" class="form-control" name="marks" placeholder="Marks" onkeyup="showResult(this.value)">
             <br>
             
              <h3 id= "changemarks" style="color:red; padding-left=500px;float:right "></h3>
             <input style="margin-bottom:20px;" type="submit" class="btn btn-primary" name ="edit" value = "Edit Question">
             
               
        </form>
            
  

            
            
            
<?php
         } 

  }



if(isset($_POST["create_pdf"]))  
 {  
      require_once('../pdfgenerator/TCPDF/tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("PDF");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 13);  
      $obj_pdf->AddPage(); 
      
      $content = '';  
      $content .= '
      <img src="vesit_logo.jpg" alt="vesit logo">
      
      <h3 align="center">Question Paper</h3> 
      
        <h4 align="right">Q.P CODE : 74DD65</h4>
        <h4 align="right">Time : 9:00 - 12:00</h4>
      
      
      
      
      <table  border="1" cellspacing="0" cellpadding="5">
        <tr>
        <th width="10%"><h4>Sr No</h4></th>
        <th width="10%"><h4>Sub Q</h4></th>
        <th width="60%"><h4>Question</h4></th>
        <th width="20%"><h4>Marks</h4></th>
        </tr>
        ';  
      $content .= fetch_data();  
      $content .= '</table>
                    <h1>Best of Luck!</h1>';  
      $obj_pdf->writeHTML($content); 
      ob_end_clean();
      $obj_pdf->Output('QuestionPaper.pdf', 'I');  
 } 





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
  <link rel="stylesheet" href="../bower_components/select2/dist/css/select2.min.css">
  
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
           <li><a href="teacher_dashboard.php"><i class="fa fa-dashboard active"></i>Dashboard</a></li>
        <li><a href="view_papers.php"><i class="fa fa-building active"></i> Generated Tests</a></li>
        <li><i class="fa fa-paper "></i>Generated paper</li>
        
      </ol>
    </section>

    <!-- Main content -->
<section class="content">


    


    <div class="row">
        <div class="container">


                

            <div class="col-md-11">


                <div style="margin-left:15px table-responsive">
                    <table class=" table table-bordered table-hover table-responsive">
                        <col width="50">
                        <col width="50">
                        <col width="300">
                        <col width="50">
                        <col width="50">
                        <tr class="info">
                            <th>Sr No</th>
                            <th></th>
                            <th>Question</th>
                            <th>Marks</th>

                            <th>Edit</th>
                            <?php echo fetch_data();
                                    echo editQuestions();
                            
                            ?>
                    </table>
                    
                    <h3 style="margin-left: 400px; color:red;"> <?php echo "Total:".$total; ?></h3>
                    
                    <?php
//                    global $total;
                    
                    
//                    if($total > 120)
//                    {
//                        echo"<h3 style='color:red'; align='center'>Invalid Marks Cannot Share!!</h3>";
//                        
//                    }
//                    else if($total < 120)
//                    {
//                        echo"<h3 style='color:red;' align='center'>Invalid Marks Cannot Share!!</h3>";
//                    }
//                    else
//                    {
//                        echo"<h3 style='color:green;' align='center'>Proceed to share and export to PDF!</h3>";
//                        
                    ?>    
<div class="col-md-10">

    <div class="col-md-5">


        <form action="share_to.php" method="post">
            <div class="col-md-12">
                <div class="col-md-10">
                    <!--    <button id="myModal" type="button" class="btn btn-success pull-right ">Save</button>-->
                    <div class="form-group has-feedback">
                        <input type="hidden" id="hsn_code" name="question_paper_id" class="input-field form-control" placeholder="HSN Code" value="<?php echo $paper_id; ?>" />
                    </div>

                    <div class="form-group has-feedback">
                        <input type="hidden" id="hsn_code" name="teacher_id" class="input-field form-control" placeholder="HSN Code" value="<?php echo $generated_by; ?>" />
                    </div>
                    <button id="share_button" type="submit" class="btn btn-success btn-lg" name="share_to">Share</button>
                    <!-- Modal -->
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-5">

        <form action="" method="post">
            <div class="col-md-12">
                <button id="pdf_button" style="margin-left:500px;" type="submit" class="btn btn-info btn-lg" name="create_pdf">Export To Pdf</button>
            </div>
        </form>



    </div>
</div>
                    <?php
                        
//                    }
                    
                    ?>
                </div>


                <?php
//                    session_start();
//                    require_once("../includes/db.php");
//                    require_once("display_paper.php");
                    
                   //$save_question_id=$_SESSION['question_id'];
                    //print_r($save_question_id) ;
//                    $_SESSION['questions'] = $save_question_id;
////                    print_r($_SESSION['questions']);
                    //echo $paper_id;
                    $generated_by = 1;
                    ?>

                <div class="col-md-10">

                    <div class="col-md-5">
                        
                        

                    </div>


                    <div class="col-md-5">
                        
                        
                        
                    </div>




                </div>

            </div>
        </div>
    </div>
</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      
    </div>
    <strong>Copyright &copy; 2017-2018 <a href="#">Vesit Students</a>.</strong> All rights
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

<script src="../bower_components/select2/dist/js/select2.min.js"></script>
<script src="../dist/js/demo.js"></script>
<script src="../Admin/select_student.js"></script>



<script> 
    
            
            var table = document.getElementById("table"),rIndex;
            
            for(var i = 1; i < table.rows.length; i++)
            {
                table.rows[i].onclick = function()
                {   
                    
                    
                    
                    rIndex = this.rowIndex;
                    console.log(rIndex);
                    
                    document.getElementById("fname").value = this.cells[0].innerHTML;
                    document.getElementById("lname").value = this.cells[2].innerHTML;
                    document.getElementById("age").value = this.cells[3].innerHTML;
                };
            }
            
            
           // edit the row
            function editRow()
            {
                
                table.rows[rIndex].cells[0].innerHTML = document.getElementById("fname").value;
                table.rows[rIndex].cells[2].innerHTML = document.getElementById("lname").value;
                table.rows[rIndex].cells[3].innerHTML = document.getElementById("age").value;
            }
            
    
    
    function showResult(str){
        
//        window.alert();
        document.getElementById("changemarks").innerHTML="Total may change";
    }
    
    
    
    
    
        </script>    







<!--<script src="modal.js"></script>-->
</body>
</html>
