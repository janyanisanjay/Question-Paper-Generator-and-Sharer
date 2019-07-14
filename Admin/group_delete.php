<?php

require_once("../includes/db.php");
$group_id = intval($_GET['deletegroup']);
echo"<h1>$group_id</h1>";

    $query1 = "delete from group_name where group_id = {$group_id}";
    $delete_query = mysqli_query($connection , $query1);

    $query2 = "delete from group_student where group_id = {$group_id}";
    $delete_group = mysqli_query($connection , $query2);
    header("Location: index.php");
    exit();
?>