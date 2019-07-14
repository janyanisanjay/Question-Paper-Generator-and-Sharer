<?php

session_start();
require_once("../includes/db.php");
global $connection;
$teacher_id=$_SESSION['teacher_id'];
echo $student_id;
$query ="select * from teacher where teacher_id = $teacher_id";
$result = mysqli_query($connection,$query);
$row=mysqli_fetch_assoc($result);
$teacher_email = $row['teacher_email'];
//echo $db_password;
$first_password=$_POST['first_password'];
echo $first_password;

$second_password=$_POST['second_password'];
echo $second_password;

//
if ($first_password == $second_password){
    $student_password = $_POST['first_password'];
    $hashed_password = password_hash($student_password, PASSWORD_DEFAULT);
    
    $query="Update teacher set teacher_password ='$hashed_password' where teacher_id=$teacher_id";
    echo $query;
    $result=mysqli_query($connection,$query);
    echo "<br>";
    $query="Update user set user_password ='$hashed_password' where user_email='$teacher_email'";
    echo $query;
    $result=mysqli_query($connection,$query);
    
    header("Location: teacher_change_password.php?s=2 ");
    exit();
}
else{
    header("Location: teacher_confirm_password.php?q=1");
    exit();
}
?>