<?php
session_start();
include_once("../includes/db.php");


global $connection;

if(isset($_POST['save'])){
$generated_paper_name = $_POST['generated_paper_name'];

$save_question_id=$_SESSION['question_id'];
$save_question_number=$_SESSION['question_number'];
$save_question_sub=$_SESSION['question_sub'];
$save_question_marks=$_SESSION['question_statement'];
$save_question_statement=$_SESSION['question_marks'];
$save_question_subject =$_SESSION['subject']; 
$generated_by=1;
echo $_SESSION['my session'];

  
    
$query="insert into generated_paper_by_teacher (generated_by,subject_id,generated_paper_name) values ($generated_by,$save_question_subject,'$generated_paper_name')";
$result_set = mysqli_query($connection,$query);

    
    
$generated_paper_id = mysqli_insert_id($connection);
$number_of_questions = sizeof($save_question_id);
$count=0;

    
while($count != $number_of_questions){
$query = "insert into generated_paper(generated_paper_id,question_id,question_number,question_number_sub,question_statement,question_marks) values ($generated_paper_id , $save_question_id[$count] , '$save_question_number[$count]',
'$save_question_sub[$count]' , '$save_question_statement[$count]' , $save_question_marks[$count] )";
$result_set = mysqli_query($connection,$query);
$count=$count+1;
}
  
echo "Saved to database";
//header("Location: paper_to_pdf.php?id=$generated_paper_id");
}
?>