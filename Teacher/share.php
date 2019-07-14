<?php
require_once("../includes/db.php");
if(isset($_POST['share'])){
  $branch_id = $_POST['branch_id'];
  $group_id = $_POST['group'];
//    echo "<br>";
//    print_r($group_id);
  $question_paper_id = $_POST['question_paper_id'];
  $teacher_id = $_POST['teacher_id'];
    echo $question_paper_id;
    echo  "<br>";
    echo $teacher_id;

   
foreach($group_id as $group){
        
    $query = "insert into share (generated_question_paper_id,teacher_id,group_id) values($question_paper_id,$teacher_id,$group)";
    
    $result_set = mysqli_query($connection,$query);
        
        echo  "<br>";
    echo $query;
    
    $query = "select student_id from group_student where group_id =$group";
    $result_set = mysqli_query($connection,$query);
    $num=mysqli_num_rows($result_set);
    
    
    echo $query;
    $count=0;
    
    while($num!=$count){
    $row=mysqli_fetch_assoc($result_set);
    $student_id=$row['student_id'];
    echo "<br>".$student_id;
//    echo $query;
    $count=$count+1;
        
   $queryo="select notification_status from student where student_id = $student_id";
    $result_setnx=mysqli_query($connection,$queryo);
    echo "<br>".$queryo;    
    $row=mysqli_fetch_assoc($result_setnx);
//        
    $notify=$row['notification_status'];
    echo "<br>".$notify;
    $notify=$notify+1;
//    echo "<br>";  
    $queryt= "update student set notification_status = $notify where student_id=$student_id";
    $reuslt_sett=mysqli_query($connection,$queryt);
//        echo $query;
//    
    }
    }
    
    header("Location: teacher_dashboard.php");
    exit();
}
?>