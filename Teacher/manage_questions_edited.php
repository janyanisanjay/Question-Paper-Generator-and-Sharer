<?php

require_once("../includes/db.php");

session_start();
$subject_ids = $_SESSION['subject'];
$module_ids = $_SESSION['module'];
$chapter_ids = $_SESSION['chapter'];


if(isset($_GET['edit']))
{
    $question_id = $_GET['question_id'];
    $question_statement = $_GET['question_statement'];
    $difficulty = $_GET['difficulty'];
    $marks = $_GET['marks'];
    
    echo $question_id;
    echo $question_statement;
    echo $difficulty;
    echo $marks;
    $query = "update question set question_statement = '$question_statement',difficulty_level = $difficulty,marks=$marks where question_id = $question_id";
                echo"<br>";
                echo $query;
                $update_question = mysqli_query($connection , $query);
                if(!$update_question)
                {
                    die("query failed".mysqli_error($connection));
                  
                }
                  header("Location: display_manage_questions_again.php?subject={$subject_ids}&module={$module_ids}&chapter={$chapter_ids}");
    
  
    
    
}


?>