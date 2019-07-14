<?php


require_once("../includes/db.php");
session_start();
$subject_ids = $_SESSION['subject'];
$module_ids = $_SESSION['module'];
$chapter_ids = $_SESSION['chapter'];

if(isset($_GET['added']))
{
    $question_statement = $_GET['question_statement'];
    $difficulty = $_GET['difficulty'];
    $marks = $_GET['marks'];
    
    echo $question_statement;
    echo $difficulty;
    echo $marks;
    
    
    $query = "insert into question (question_statement,difficulty_level,marks,subject_id,module_id,chapter_id) values ('$question_statement',$difficulty,$marks,$subject_ids,$module_ids,$chapter_ids)";
    $result = mysqli_query($connection , $query);
    
    
    header("Location: display_manage_questions_again.php?subject={$subject_ids}&module={$module_ids}&chapter={$chapter_ids}");
    
}


?>