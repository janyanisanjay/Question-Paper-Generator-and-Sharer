<?php
require_once("../includes/db.php");

$subject_ids = $_GET['subject'];
$module_ids = $_GET['module'];
$chapter_ids = $_GET['chapter'];


echo $subject_ids;
echo $module_ids;
echo $chapter_ids;

 if(isset($_GET['delete']))
     {
         $question_id = $_GET['delete'];
         $query = "delete from question where question_id = $question_id";
         $result = mysqli_query($connection , $query);
     }

    header("Location: display_manage_questions_again.php?subject={$subject_ids}&module={$module_ids}&chapter={$chapter_ids}");
    

?>