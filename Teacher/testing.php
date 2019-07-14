<?php
session_start();
//var_dump($_SESSION);
if(isset($_SESSION['teacher_id'])){
    echo "done";
}

$id=$_SESSION['teacher_id'];
echo $id;
?>