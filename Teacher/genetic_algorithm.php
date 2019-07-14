<html>
<head>
    <style>
table, th, td {
/*    border: 1px solid black;*/
/*    background: #fff;*/
/*    padding:4px;*/
}
</style>

</head>
<body>

<div style="margin-left:200px margin-top:50px">
<table class="table table-bordered table-hover table-responsive">
    <col width ="50">
   <col width = "50">
   <col width = "400">
   <col width ="50">
    <tr class="info">
    <th></th>
    <th></th>
    <th >Question</th>
    <th>Marks</th>
<!--    <th>EDIT</th>-->
<?php

require_once("../includes/db.php");
//session_start();
$difficulty_level;
//echo $subject_id;

/*-----------------------5,5,5,5 Marks --------------------------------*/
 function question_1_type_1($total_main_questions)
    {   
            global $connection;
            global $question_number;
            global $ques_no_1_6;
     
            global $save_question_id;
            global $save_question_number;
            global $save_question_sub;
            global $save_question_statement;
            global $save_question_marks;
            global $save_question_chapter;
            global $save_question_rating;
            
            global $subject_id;
            $question_1_count=0;
     
/*******************Fitness Variables*************************************************/
            global $ques_1_rating;
            global $rating_array;
/*************************************************************************************/  
     
     
     
            
//            echo "<tr><td>"."<strong>".$total_main_questions."</strong>"."</td>";
//            echo "<td>"."<strong>"."Attempt all FOUR"."</strong>"."</td></tr>";
            
            while($question_1_count != 4){
            
            $val = rand(1,50);
            
//            $counts=$counts+1;    

            $query = "select * from question where question_id=$val and subject_id=$subject_id and history != 1";
            $generated_question = mysqli_query($connection,$query);
            $num_of_rows=mysqli_num_rows($generated_question);
            if($num_of_rows == 1)
            {    
                $i=0;
                $question_1_count = $question_1_count+1;
                $row=mysqli_fetch_assoc($generated_question);
                $question_statement = $row['question_statement'];
                $chapter_id = $row['chapter_id'];
                $module_id = $row['module_id'];
                $question_id = $row['question_id'];
                
                

                
//                echo "<tr><td>".$question_number[$question_1_count -1]."</td>";
//                echo "<td>".$question_statement."</td>";
//                echo "<td>"."5"."</td></tr>";
//                echo "<td><button class='btn-primary'><a href ='teacher_blank.php?edit=$question_id'></a>Edit</button></td></tr>";
                $query="Update question set history=1 where question_id = $question_id";
                $update_history=mysqli_query($connection,$query);
                
                
                array_push($save_question_id,$question_id);
                array_push($save_question_number,$total_main_questions);
                array_push($save_question_sub,$question_number[$question_1_count -1]);
                array_push($save_question_statement,$question_statement);
                array_push($save_question_marks,5);
                array_push($save_question_chapter,$chapter_id);
                array_push($save_question_rating,$row['importance_level']);

                //Adding fitness of every question 
                $ques_1_rating = $ques_1_rating + $row['importance_level'];
                
                
            }
        }
     
     
     /***********Pushing fitness of Every main Question to $rating_array*************/
     
     
      $ques_rating = round($ques_1_rating/2,2); 
     //every qus has assigned importance level between 1 to 5 so that sum of 4 qus would be 20
     //divide by 2 becoz the total fitness of every main ques would be out of 10 so that total fitness would be 60
      array_push($rating_array,$ques_rating);  
      $ques_1_rating = 0;
//      print_r($rating_array);
     
     //Similar logic for all functns
        
    }
/*-----------------------10 Marks --------------------------------*/


    function question_1_type_2($total_main_questions)
    {   
            global $connection;
            global $question_number;
            global $ques_no_1_6;
        
            global $save_question_id;
            global $save_question_number;
            global $save_question_sub;
            global $save_question_statement;
            global $save_question_marks;
            global $subject_id;
            global $save_question_chapter;
            global $save_question_rating;
        
            global $ques_1_rating;
            global $rating_array;
                
        
//            echo "<tr><td>"."<strong>".$total_main_questions."</strong>"."</td></tr>";
            
                        $question_1_count=0;

            while($question_1_count != 2){

            $val = rand(1,50);
//            $counts=$counts+1;    

            $query = "select * from question where question_id=$val and module_id in (1,2,3,4,5,6) and marks=   1 and subject_id=$subject_id and history != 1";
            $generated_question = mysqli_query($connection,$query);
            $num_of_rows=mysqli_num_rows($generated_question);
            if($num_of_rows == 1)
            {    
                
                $question_1_count=$question_1_count+1;
                $row=mysqli_fetch_assoc($generated_question);
                $question_statement = $row['question_statement'];
                $chapter_id = $row['chapter_id'];
                $module_id = $row['module_id'];
                $question_id = $row['question_id'];
                
                
//                echo "<tr><td>".$question_number[$question_1_count -1]."</td>";
//                echo "<td>".$question_statement."</td>";
//                echo "<td>"."10"."</td></tr>";
//                echo "<td><button class='btn-primary'><a href ='teacher_blank.php?edit=$question_id'></a>Edit</button></td></tr>";
                $query="Update question set history=1 where question_id = $question_id";
                $update_history=mysqli_query($connection,$query);
                
                
                array_push($save_question_id,$question_id);
                array_push($save_question_number,$total_main_questions);
                array_push($save_question_sub,$question_number[$question_1_count -1]);
                array_push($save_question_statement,$question_statement);
                array_push($save_question_marks,10);
                array_push($save_question_chapter,$chapter_id);
                array_push($save_question_rating,$row['importance_level']);
//                
                
                
                $ques_1_rating = $ques_1_rating + $row['importance_level'];
                
            }
        }
        
        
        $ques_rating = round($ques_1_rating/1,2);
        array_push($rating_array,$ques_rating);
        $ques_1_rating = 0;
//        print_r($rating_array);
        
        
    }

        
        
        
///********************************************Question 2,3,4,5****************************************/
///*          1-6,6,8
//            2-10,10
//            3-6,6,4,4
//            4-7,7,6
//            
//*/


        
//**********************************************Marks 6,6,8**********************************************/        
     
        
function question_2_type_1($total_main_questions)
    {   
            global $connection;
            global $question_number;
            global $ques_no_2_5;
    
        
            global $save_question_id;
            global $save_question_number;
            global $save_question_sub;
            global $save_question_statement;
            global $save_question_marks;
            global $subject_id;
            global $save_question_chapter;
            global $save_question_rating;
    
            global $ques_1_rating;
            global $rating_array;
    
//            echo "<tr><td>"." "."</td></tr>";
//            echo "<tr><td>"."<strong>".$total_main_questions."</strong>"."</td>";
//            echo "<td>".""."</td></tr>";
            
            $question_2_count=0;
            while($question_2_count != 3){

            $val = rand(1,50);
//            $counts=$counts+1;
                
            $var_marks_set=0;  
                
            $query = "select * from question where question_id=$val and module_id in (1,2,3,4,5,6) and subject_id= $subject_id and history != 1";
            if($question_2_count==2)
            {
                $query="select * from question where question_id=$val and module_id in (1,2,3,4,5,6) and subject_id = $subject_id and history !=1 ";
//                echo $query;
                $var_marks_set=1;
            }
            $generated_question = mysqli_query($connection,$query);
            $num_of_rows=mysqli_num_rows($generated_question);
            if($num_of_rows == 1)
            {    
                $question_2_count=$question_2_count+1;
                $row=mysqli_fetch_assoc($generated_question);
                $question_statement = $row['question_statement'];
                $chapter_id = $row['chapter_id'];
                $module_id = $row['module_id'];
                $question_id = $row['question_id'];
                
                if($var_marks_set == 0){  
//                echo "<tr><td>".$question_number[$question_2_count -1]."</td>";
//                echo "<td>".$question_statement."</td>";
//                echo "<td>"."6"."</td></tr>";
//                echo "<td><button class='btn-primary'><a href ='teacher_blank.php?edit=$question_id'></a>Edit</button></td></tr>";
                    
                $query="Update question set history=1 where question_id = $question_id";
                $update_history=mysqli_query($connection,$query);
                array_push($save_question_id,$question_id);
                array_push($save_question_number,$total_main_questions);
                array_push($save_question_sub,$question_number[$question_2_count -1]);
                array_push($save_question_statement,$question_statement);
                array_push($save_question_marks,6);
                array_push($save_question_chapter,$chapter_id);
                array_push($save_question_rating,$row['importance_level']);
                $ques_1_rating = $ques_1_rating + $row['importance_level'];
                    
                }
                elseif($var_marks_set==1)
                {
//                echo "<tr><td>".$question_number[$question_2_count -1]."</td>";
//                echo "<td>".$question_statement."</td>";
//                echo "<td>"."8"."</td></tr>";
//                echo "<td><button class='btn-primary'><a href ='teacher_blank.php?edit=$question_id'></a>Edit</button></td></tr>";
                
                $query="Update question set history=1 where question_id = $question_id";
                $update_history=mysqli_query($connection,$query);
                    
                array_push($save_question_id,$question_id);
                array_push($save_question_number,$total_main_questions);
                array_push($save_question_sub,$question_number[$question_2_count -1]);
                array_push($save_question_statement,$question_statement);
                array_push($save_question_marks,8);
                                array_push($save_question_chapter,$chapter_id);
                array_push($save_question_rating,$row['importance_level']);
                $ques_1_rating = $ques_1_rating + $row['importance_level'];
                    
                }
            }

        }
    
        $ques_rating = round($ques_1_rating/1.5,2);
        array_push($rating_array,$ques_rating);
        $ques_1_rating = 0;
//        print_r($rating_array);
        
    }


/*-----------------------10,10 Marks --------------------------------*/



    function question_2_type_2($total_main_questions)
    {   
            global $connection;
            global $question_number;
            global $ques_no_2_5;
        
            
            global $save_question_id;
            global $save_question_number;
            global $save_question_sub;
            global $save_question_statement;
            global $save_question_marks;
            global $subject_id;
            global $save_question_chapter;
            global $save_question_rating;
        
            global $ques_1_rating;
            global $rating_array;
        
//            echo "<tr><td>"." "."</td></tr>";
//            echo "<tr><td>"."<strong>".$total_main_questions."</strong>"."</td>";
//            echo "<td>".""."</td></tr>";
        
            $question_2_count=0;
            while($question_2_count != 2){

            $val = rand(1,50);
//            $counts=$counts+1;    

            $query = "select * from question where question_id=$val and module_id in (1,2,3,4,5,6) and subject_id=$subject_id and marks=1 and history != 1";

            $generated_question = mysqli_query($connection,$query);
            $num_of_rows=mysqli_num_rows($generated_question);
            if($num_of_rows == 1)
            {    
                $question_2_count=$question_2_count+1;
                $row=mysqli_fetch_assoc($generated_question);
                $question_statement = $row['question_statement'];
                $chapter_id = $row['chapter_id'];
                $module_id = $row['module_id'];
                $question_id = $row['question_id'];
//                echo "<tr><td>".$question_number[$question_2_count -1]."</td>";
//                echo "<td>".$question_statement."</td>";
//                echo "<td>"."10"."</td></tr>";
//                echo "<td><button class='btn-primary'><a href ='teacher_blank.php?edit=$question_id'></a>Edit</button></td></tr>";
                
                $query="Update question set history=1 where question_id = $question_id";
                $update_history=mysqli_query($connection,$query);
                
                array_push($save_question_id,$question_id);
                array_push($save_question_number,$total_main_questions);
                array_push($save_question_sub,$question_number[$question_2_count -1]);
                array_push($save_question_statement,$question_statement);
                array_push($save_question_marks,10);
                                array_push($save_question_chapter,$chapter_id);
                array_push($save_question_rating,$row['importance_level']);
                $ques_1_rating = $ques_1_rating + $row['importance_level'];

            }

        }
        
        $ques_rating = round($ques_1_rating/1,2);
        array_push($rating_array,$ques_rating);
        $ques_1_rating = 0;
//        print_r($rating_array);
    }

        
        
/***************************Marks 6,6,4,4**************************************/
    function question_2_type_3($total_main_questions)
    {   
            global $connection;        
            global $question_number;
            global $ques_no_2_5;
        
            
            global $save_question_id;
            global $save_question_number;
            global $save_question_sub;
            global $save_question_statement;
            global $save_question_marks;
            global $subject_id;
            global $save_question_chapter;
            global $save_question_rating;
        
            global $ques_1_rating;
            global $rating_array;
        
//            echo "<tr><td>"." "."</td></tr>";
//            echo "<tr><td>"."<strong>".$total_main_questions."</strong>"."</td>";
//            echo "<td>".""."</td></tr>";
            $question_2_count=0;
            while($question_2_count != 4){

            $val = rand(1,50);
                
            $var_marks_set=0;   
                
            $query = "select * from question where question_id=$val and module_id in (1,2,3,4,5,6) and subject_id=$subject_id and history != 1";
            if($question_2_count >= 2)
            {
                $query="select * from question where question_id=$val and module_id in (1,2,3,4,5,6) and subject_id=$subject_id and history != 1";
                $var_marks_set=1;
            }
            $generated_question = mysqli_query($connection,$query);
            $num_of_rows=mysqli_num_rows($generated_question);
            if($num_of_rows == 1)
            {    
                $question_2_count=$question_2_count+1;
                $row=mysqli_fetch_assoc($generated_question);
                $question_statement = $row['question_statement'];
                $chapter_id = $row['chapter_id'];
                $module_id = $row['module_id'];
                $question_id =$row['question_id']; 
            
                if($var_marks_set == 0){  
//                    echo "<tr><td>".$question_number[$question_2_count -1]."</td>";
//                    echo "<td>".$question_statement."</td>";
//                    echo "<td>"."6"."</td></tr>";
//                    echo "<td><button class='btn-primary'><a href ='teacher_blank.php?edit=$question_id'></a>Edit</button></td></tr>";
                    $query="Update question set history=1 where question_id = $question_id";
                    $update_history=mysqli_query($connection,$query);
                    
                array_push($save_question_id,$question_id);
                array_push($save_question_number,$total_main_questions);
                array_push($save_question_sub,$question_number[$question_2_count -1]);
                array_push($save_question_statement,$question_statement);
                array_push($save_question_marks,6);
                                array_push($save_question_chapter,$chapter_id);
                array_push($save_question_rating,$row['importance_level']);
                $ques_1_rating = $ques_1_rating + $row['importance_level'];
                
                }
                elseif($var_marks_set==1)
                {
//                    echo "<tr><td>".$question_number[$question_2_count -1]."</td>";
//                    echo "<td>".$question_statement."</td>";
//                    echo "<td>"."4"."</td></tr>";
//                    echo "<td><button class='btn-primary'><a href ='teacher_blank.php?edit=$question_id'></a>Edit</button></td></tr>";
                    $query="Update question set history=1 where question_id = $question_id";
                    $update_history=mysqli_query($connection,$query);
                    
                array_push($save_question_id,$question_id);
                array_push($save_question_number,$total_main_questions);
                array_push($save_question_sub,$question_number[$question_2_count -1]);
                array_push($save_question_statement,$question_statement);
                array_push($save_question_marks,4);
                array_push($save_question_chapter,$chapter_id);
                array_push($save_question_rating,$row['importance_level']);
                    
                    
                $ques_1_rating = $ques_1_rating + $row['importance_level'];
                }
            }

        }
        $ques_rating = round($ques_1_rating/2,2);
        array_push($rating_array,$ques_rating);
        $ques_1_rating = 0;
//        print_r($rating_array);
        
        
    }

        
/**********************************Marks 7,7,6 *********************************/


    function question_2_type_4($total_main_questions)
    {   
            global $connection;
            global $question_number;
            global $ques_no_2_5;
        
            
            global $save_question_id;
            global $save_question_number;
            global $save_question_sub;
            global $save_question_statement;
            global $save_question_marks;
            global $subject_id;
            global $save_question_chapter;
            global $save_question_rating;
        
            global $ques_1_rating;
            global $rating_array;
        
//            echo "<tr><td>"." "."</td></tr>";
//            echo "<tr><td>"."<strong>".$total_main_questions."</strong>"."</td>";
//            echo "<td>".""."</td></tr>";
        
            $question_2_count=0;
            while($question_2_count != 3){

            $val = rand(1,50);
//            $counts=$counts+1; 
                
            $var_marks_set=0;    
                
            $query = "select * from question where question_id=$val and module_id in (1,2,3,4,5,6) and subject_id=$subject_id and history != 1";
            if($question_2_count==2)
            {
                $query="select * from question where question_id=$val and module_id in (1,2,3,4,5,6) and subject_id=$subject_id and marks = 1 and history != 1";
                $var_marks_set=1;
            }
            $generated_question = mysqli_query($connection,$query);
            $num_of_rows=mysqli_num_rows($generated_question);
            if($num_of_rows == 1)
            {    
                $question_2_count=$question_2_count+1;
                $row=mysqli_fetch_assoc($generated_question);
                $question_statement = $row['question_statement'];
                $chapter_id = $row['chapter_id'];
                $module_id = $row['module_id'];
                $question_id = $row['question_id'];
                if($var_marks_set == 0){  
//                    echo "<tr><td>".$question_number[$question_2_count -1]."</td>";
//                    echo "<td>".$question_statement."</td>";
//                    echo "<td>"."7"."</td></tr>";
//                    echo "<td><button class='btn-primary'><a href ='teacher_blank.php?edit=$question_id'></a>Edit</button></td></tr>";
                    
                    $query="Update question set history=1 where question_id = $question_id";
                    $update_history=mysqli_query($connection,$query);
                    
                    array_push($save_question_id,$question_id);
                array_push($save_question_number,$total_main_questions);
                array_push($save_question_sub,$question_number[$question_2_count -1]);
                array_push($save_question_statement,$question_statement);
                array_push($save_question_marks,7);
                                array_push($save_question_chapter,$chapter_id);
                array_push($save_question_rating,$row['importance_level']);
                $ques_1_rating = $ques_1_rating + $row['importance_level'];
                }
                elseif($var_marks_set==1)
                {
//                    echo "<tr><td>".$question_number[$question_2_count -1]."</td>";
//                    echo "<td>".$question_statement."</td>";
//                    echo "<td>"."6"."</td></tr>";
//                    echo "<td><button class='btn-primary'<a href ='teacher_blank.php?edit=$question_id'></a>Edit</button></td></tr>";
                    
                    $query="Update question set history=1 where question_id = $question_id";
                    $update_history=mysqli_query($connection,$query);
                
                    array_push($save_question_id,$question_id);
                array_push($save_question_number,$total_main_questions);
                array_push($save_question_sub,$question_number[$question_2_count -1]);
                array_push($save_question_statement,$question_statement);
                array_push($save_question_marks,6);
                                    array_push($save_question_chapter,$chapter_id);
                array_push($save_question_rating,$row['importance_level']);
                    
                $ques_1_rating = $ques_1_rating + $row['importance_level'];
                }
            }

        }
        $ques_rating = round($ques_1_rating/1.5,2);
        array_push($rating_array,$ques_rating);
        $ques_1_rating = 0;
//        print_r($rating_array);
        
    }

        
        
        
function reset_history(){
    global $connection;
    $query = "Update question set history=0";
    $rested_history=mysqli_query($connection,$query);
    
}
        
        
/*************************************************************************************/
        
        
/*************************************Global Variables********************************/
    
$ques_no_1_6 = array("Q1","Q6");

$ques_no_2_5 =array("Q2","Q3","Q4","Q5");
$question_number=array("a)","b)","c)","d)");
$total_main_questions=array("Q1","Q2","Q3","Q4","Q5","Q6");
        
        
$paper_one=array();
$paper_two=array();
$paper_three=array();
$paper_four=array();
$paper_five=array();
        
$all_papers=array();
        
$fitness_array=array();
        
$temp1_chp=array();
$temp2_chp=array();

$temp1_rating=array();
$temp2_rating=array();        
        
$ques_1_rating=0;        
$rating_array = array();
        
$save_question_id=array();
$save_question_number=array();
$save_question_sub=array();
$save_question_marks=array();
$save_question_statement=array();
$save_question_chapter=array();
$save_question_rating=array();
        
        
$save_question_ids=array();
$save_question_numbers=array();
$save_question_subs=array();
$save_question_markss=array();
$save_question_statements=array();
$save_question_chapters=array();
$save_question_ratings=array();        

//-------------------------------Function Calls---------------------------------
        
        
/*******----------generating paper 1--------------************/
        

question_1_6($total_main_questions[0]);  
question_2_5($total_main_questions[1]);
question_2_5($total_main_questions[2]);
question_2_5($total_main_questions[3]);
question_2_5($total_main_questions[4]);
question_1_6($total_main_questions[5]);
reset_history();


$fitness_count=0;
$fitness = 0;
        
/*-------------- caluclatiing fitness of paper ------------*/
        
while($fitness_count != 6){
    $fitness = $fitness + $rating_array[$fitness_count];
    $fitness_count = $fitness_count+1;
}
        
//echo "<br><strong>Fitnesspaper 1:</strong>".$fitness;
array_push($fitness_array,$fitness);

/*-------------------------------------------------------*/
        
        
array_push($paper_one,$save_question_id);
array_push($paper_one,$save_question_number);
array_push($paper_one,$save_question_sub);
array_push($paper_one,$save_question_marks);
array_push($paper_one,$save_question_statement);
array_push($paper_one,$save_question_chapter);
array_push($paper_one,$save_question_rating);
            
        
/*******----------generating paper 2--------------************/

        
/*-----------------Emptying all the array --------------------*/        
   foreach ($save_question_id as $i => $value) {
    unset($save_question_id[$i]);
}
          foreach ($save_question_number as $i => $value) {
    unset($save_question_number[$i]);
}
          foreach ($save_question_sub as $i => $value) {
    unset($save_question_sub[$i]);
}
          foreach ($save_question_marks as $i => $value) {
    unset($save_question_marks[$i]);
}
          foreach ($save_question_statement as $i => $value) {
    unset($save_question_statement[$i]);
}
         foreach ($save_question_chapter as $i => $value) {
    unset($save_question_chapter[$i]);
}
        foreach ($save_question_rating as $i => $value) {
    unset($save_question_rating[$i]);
}
/*------------------------------------------------------------*/
        
/*-----------------genrating question by question---------------*/
        
question_1_6($total_main_questions[0]);  
question_2_5($total_main_questions[1]);
question_2_5($total_main_questions[2]);
question_2_5($total_main_questions[3]);
question_2_5($total_main_questions[4]);
question_1_6($total_main_questions[5]);
reset_history();
        
        
/*-------------- caluclatiing fitness of paper ------------*/
$fitness_count=6;
$fitness = 0;
while($fitness_count != 12){
    $fitness = $fitness + $rating_array[$fitness_count];
    $fitness_count = $fitness_count+1;
}
//echo "<strong>Fitness Paper 2:</strong>".$fitness;
array_push($fitness_array,$fitness);
/*-------------------------------------------------------*/
        
array_push($paper_two,$save_question_id);
array_push($paper_two,$save_question_number);
array_push($paper_two,$save_question_sub);
array_push($paper_two,$save_question_marks);
array_push($paper_two,$save_question_statement);
array_push($paper_two,$save_question_chapter);
array_push($paper_two,$save_question_rating);


        
        
/*******----------generating paper 3--------------************/
        
   foreach ($save_question_id as $i => $value) {
    unset($save_question_id[$i]);
}
          foreach ($save_question_number as $i => $value) {
    unset($save_question_number[$i]);
}
          foreach ($save_question_sub as $i => $value) {
    unset($save_question_sub[$i]);
}
          foreach ($save_question_marks as $i => $value) {
    unset($save_question_marks[$i]);
}
          foreach ($save_question_statement as $i => $value) {
    unset($save_question_statement[$i]);
}   
        foreach ($save_question_chapter as $i => $value) {
    unset($save_question_chapter[$i]);
}
        foreach ($save_question_rating as $i => $value) {
    unset($save_question_rating[$i]);
}
        
        
question_1_6($total_main_questions[0]);  
question_2_5($total_main_questions[1]);
question_2_5($total_main_questions[2]);
question_2_5($total_main_questions[3]);
question_2_5($total_main_questions[4]);
question_1_6($total_main_questions[5]);
reset_history();
        
        

$fitness_count=12;
$fitness = 0;
while($fitness_count != 18){
    $fitness = $fitness + $rating_array[$fitness_count];
    $fitness_count = $fitness_count+1;
}
        
//echo "<strong>Fitness Paper 3: </strong>".$fitness;
array_push($fitness_array,$fitness);
        
array_push($paper_three,$save_question_id);
array_push($paper_three,$save_question_number);
array_push($paper_three,$save_question_sub);
array_push($paper_three,$save_question_marks);
array_push($paper_three,$save_question_statement);
array_push($paper_three,$save_question_chapter);
array_push($paper_three,$save_question_rating);



        
        
        
        
/*******----------generating paper 4--------------************/
        
   foreach ($save_question_id as $i => $value) {
    unset($save_question_id[$i]);
}
          foreach ($save_question_number as $i => $value) {
    unset($save_question_number[$i]);
}
          foreach ($save_question_sub as $i => $value) {
    unset($save_question_sub[$i]);
}
          foreach ($save_question_marks as $i => $value) {
    unset($save_question_marks[$i]);
}
          foreach ($save_question_statement as $i => $value) {
    unset($save_question_statement[$i]);
}
        foreach ($save_question_chapter as $i => $value) {
    unset($save_question_chapter[$i]);
}
        foreach ($save_question_rating as $i => $value) {
    unset($save_question_rating[$i]);
}
        
        
question_1_6($total_main_questions[0]);  
question_2_5($total_main_questions[1]);
question_2_5($total_main_questions[2]);
question_2_5($total_main_questions[3]);
question_2_5($total_main_questions[4]);
question_1_6($total_main_questions[5]);
reset_history();
        
        

$fitness_count=18;
$fitness = 0;
while($fitness_count != 24){
    $fitness = $fitness + $rating_array[$fitness_count];
    $fitness_count = $fitness_count+1;
}
//echo "<strong>Fitness Paper 3: </strong>".$fitness;

array_push($fitness_array,$fitness);
        
array_push($paper_four,$save_question_id);
array_push($paper_four,$save_question_number);
array_push($paper_four,$save_question_sub);
array_push($paper_four,$save_question_marks);
array_push($paper_four,$save_question_statement);
array_push($paper_four,$save_question_chapter);
array_push($paper_four,$save_question_rating);

        
        

 /*******----------generating paper 5--------------************/
        
   foreach ($save_question_id as $i => $value) {
    unset($save_question_id[$i]);
}
          foreach ($save_question_number as $i => $value) {
    unset($save_question_number[$i]);
}
          foreach ($save_question_sub as $i => $value) {
    unset($save_question_sub[$i]);
}
          foreach ($save_question_marks as $i => $value) {
    unset($save_question_marks[$i]);
}
          foreach ($save_question_statement as $i => $value) {
    unset($save_question_statement[$i]);
}
        foreach ($save_question_chapter as $i => $value) {
    unset($save_question_chapter[$i]);
}
        foreach ($save_question_rating as $i => $value) {
    unset($save_question_rating[$i]);
}
        
question_1_6($total_main_questions[0]);  
question_2_5($total_main_questions[1]);
question_2_5($total_main_questions[2]);
question_2_5($total_main_questions[3]);
question_2_5($total_main_questions[4]);
question_1_6($total_main_questions[5]);
reset_history();
        
        

$fitness_count=24;
$fitness = 0;
while($fitness_count != 30
      ){
    $fitness = $fitness + $rating_array[$fitness_count];
    $fitness_count = $fitness_count+1;
}
//echo "<strong>Fitness Paper 5: </strong>".$fitness;

array_push($fitness_array,$fitness);
        
array_push($paper_five,$save_question_id);
array_push($paper_five,$save_question_number);
array_push($paper_five,$save_question_sub);
array_push($paper_five,$save_question_marks);
array_push($paper_five,$save_question_statement);
array_push($paper_five,$save_question_chapter);
array_push($paper_five,$save_question_rating);

//print_r($paper_five);
        
array_push($all_papers,$paper_one);
array_push($all_papers,$paper_two);
array_push($all_papers,$paper_three);
array_push($all_papers,$paper_four);
array_push($all_papers,$paper_five);


/*-------------------Array of fitness of all paper ----------------------*/        
        
//print_r($fitness_array);
        
/*************************************************************************/
        
        
        
        
        
        
/*----------------FInding the top 2 fittest papers----------------------*/        
if($fitness_array[0]>$fitness_array[1])
{
    $highest=$fitness_array[0];
    $second=$fitness_array[1];
}
else{
    $highest=$fitness_array[1];
    $second=$fitness_array[0];
    
}
for($i=2;$i<5;$i++)
{
    if($fitness_array[$i]>$highest)
    {
        $highest=$fitness_array[$i];
        
    }
    else if($fitness_array[$i]>$second)
    {
        $second=$fitness_array[$i];
    }
}
        
//echo "<br>highest= ".$highest;
//echo "<br>Second highest= ".$second;
/****************************************************************************/
 
        
        
/*--------------------------Finding the index of fittest paper------------*/        
$fittest_paper_index=array_search($highest,$fitness_array);
$second_fittest_paper_index=array_search($second,$fitness_array);
//echo "<br>".$fittest_paper_index;
//echo "<br>".$second_fittest_paper_index;
/**************************************************************************/    

        
        
/*--------------------------making array of top 2 fittest paper ---------------*/       
for($i=0;$i<5;$i++)
{
    if($fittest_paper_index==$i)
    {
        $fittest_paper_array=$all_papers[$i];
    }
    if($second_fittest_paper_index==$i)
    {
        $second_fittest_paper_array=$all_papers[$i];
    }
}
//echo "<pre>";        
//print_r($fittest_paper_array);
//print_r($second_fittest_paper_array);
/*****************************************************************************/
        
        
        
        
//$total_questions_paper_one=array_map("count",$fittest_paper_array);

$total_questions_paper_one=sizeof($fittest_paper_array[0]);        
$total_questions_paper_two=sizeof($second_fittest_paper_array[0]);

$total_one=array_count_values($fittest_paper_array[1]);

$num_ques_one=$total_one["Q1"];
$num_ques_two=$total_one["Q2"];
$num_ques_three=$total_one["Q3"];
$num_ques_four=$total_one["Q4"];
$num_ques_five=$total_one["Q5"];
$num_ques_six=$total_one["Q6"];

        
//echo "<br>".$num_ques_one;
        
$total_two=array_count_values($second_fittest_paper_array[1]);
//print_r($total_two);       
        
        
/*---------------------------Matching of main Question Type---------------------*/         
foreach($total_main_questions as $i)
{
    if($total_one[$i] == $total_two[$i])
    {
        /*--------Match Found---------*/
//        echo "<br>Match in question:".$i;
        
        
        /*----------Finding index of question match-------------*/
        $index_of_question_fp=array_search($i,$fittest_paper_array[1]);
//        echo "<br> ".$index_of_question_fp;
        $k=$index_of_question_fp;
        
        $index_of_question_sp=array_search($i,$second_fittest_paper_array[1]);
//        echo "<br> ".$index_of_question_sp;
        $l=$index_of_question_sp;
        
    /*------------Pushing that main question in another arrays -------------*/    
        for($j=0;$j<$total_one[$i];$j++)
        {   
            array_push($temp1_chp,$fittest_paper_array[5][$k]);
            
            array_push($temp2_chp,$second_fittest_paper_array[5][$l]);
            
            array_push($temp1_rating,$fittest_paper_array[6][$k]);
            
            array_push($temp2_rating,$second_fittest_paper_array[6][$l]);
            
            $l=$l+1;
            $k=$k+1;
        
        
        }
//        echo "<br>";
//        echo "<br>";
//        echo "<br>";
//        print_r($temp1_chp);
//        print_r($temp2_chp);
//        print_r($temp1_rating);
//        print_r($temp2_rating);
        
        /*-----Getting starting index as key------*/
        $key = $value = NULL;
        foreach ($temp1_chp as $key => $value) {
            break;
        }

            for($x=$key;$x<sizeof($temp1_chp);$x++)
            {
                /*-------------Finding questions of same chapter in that main question which was matched-----------*/
                $dummy=array_search($temp1_chp[$x],$temp2_chp);
                    if(is_int($dummy))
                    {
                        /*-----Question of same chapter found------*/
//                        echo "<br> found $dummy";
                        
                        /*-----------If the rating of question of same chpter is greater push it in the array------*/
                        
                            if($temp1_rating[$x] < $temp2_rating[$x])
                            {
                                for($y=0;$y<6;$y++)
                                {
                                    /*------Rating of question from mother paper is greater -----------------*/
//                                    echo "Greater Rating";
                                    $fittest_paper_array[$y][$index_of_question_fp+$x]=$second_fittest_paper_array[$y][$index_of_question_sp+$dummy];
                                }
                                
//                                                        unset($temp2_rating[$x]);

                            }
                        
                        /*-------Unsetting it so that if main question contains two questions of same chapter than it will create problem-----------*/
                        unset($temp2_chp[$x]);
                        unset($temp1_chp[$x]);
                            
                    }
                /*-------Not found */
                    else
                    {
//                    echo "<br> Not found";
                    }
                /*unssting the index of found question for repeating the procedure again*/
                
                
                unset($dummy);

            }
        
//        exit;
            
//            if($temp1==$temp2)
//            {
//                echo "<br><strong>Match in Chapter $temp1</strong>";
//                $rating_temp=$fittest_paper_array[5][$k];
//            }
        
               
//        if($fittest_paper_array[5][])
        
/*--------------Unseting full arrays if match is found in two main questions problem will be there if indexes---- */        
        foreach ($temp1_chp as $i => $value) {
    unset($temp1_chp[$i]);
}
        
        foreach ($temp2_chp as $i => $value) {
    unset($temp2_chp[$i]);
}
        
        foreach ($temp1_rating as $i => $value) {
    unset($temp1_rating[$i]);
}
        
        foreach ($temp2_rating as $i => $value) {
    unset($temp2_rating[$i]);
}
        
    }
}
    
        
        
        
        
        
//print_r($fittest_paper_array);

        
/*--------------------------Calling function print the final paper---------------*/        
        
        
print_paper($fittest_paper_array);      
        
        
/****************************************************************************/        
        
        
        
        
        
        
        
/*--------------------------Question 1 & 6-------------------------------------------------*/
function question_1_6($total_main_questions){
    global $ques_no_1_6;
    
    /*---selecting random value from array---*/
    $question_1_type = array(1,2);
    $question_1_random = $question_1_type[array_rand($question_1_type,1)];
    /************/
    
    
    
//    echo "<br>"."*****************Question $ques_no_1_6************************"."<br>";
//    $ques_no_1_6=$ques_no_1_6+5;
//    echo "type of question 1 : ".$question_1_random;
//    echo "<br>";
    
    
    $question_1_count=0;

    $counts=0;
    
    /*------if value one call type 1 else 2 */
    if($question_1_random == 1)
    {
        question_1_type_1($total_main_questions);
    }
    
    
    else if($question_1_random == 2)
    {
        question_1_type_2($total_main_questions);
    }
}
/****************************************************************************************/
        

        
/*--------------------------Question 2,3,4,5-------------------------------------------------*/        
function question_2_5($total_main_questions){
    global $ques_no_2_5;
    
    
    /*---selecting random value from array---*/
    $question_2_type = array(1,2,3,4);
    $question_2_random = $question_2_type[array_rand($question_2_type,1)];
    
    
    
    
    //echo "<br>"."*******************************Question $ques_no_2_5**************************"."<br>";
    //$ques_no_2_5=$ques_no_2_5+1;
    //echo "type of question 2 : ".$question_2_random;
    $question_2_count=0;
    $counts=0;
    
    
    
    if($question_2_random == 1)
    {
        question_2_type_1($total_main_questions);
    }
    else if($question_2_random == 2)
    {
        question_2_type_2($total_main_questions);
    }
    else if($question_2_random == 3)
    {
        question_2_type_3($total_main_questions);
    }
    else if($question_2_random == 4)
    {
        question_2_type_4($total_main_questions);
    }
}
/************************************************************/ 
        
        
        
        
function print_paper($fittest_paper_array)
{
        global $save_question_ids;
        global $save_question_numbers;
        global $save_question_subs;
        global $save_question_markss;
        global $save_question_statements;

     
//     print_r($fittest_paper_array);
     $num=sizeof($fittest_paper_array);
     
     $save_question_ids=$fittest_paper_array[0];
                $save_question_numbers =$fittest_paper_array[1];
                $save_question_subs=$fittest_paper_array[2];
    $save_question_markss=$fittest_paper_array[3];
    $save_question_statements=$fittest_paper_array[4];

//  print_r($save_question_ids);
//  print_r($save_question_numbers);


     $count=sizeof($save_question_ids);
    
/*---------------Getting start of array----------*/    
     $key = $value = NULL;
foreach ($save_question_ids as $key => $value) {
    break;
}
     $temp=$save_question_ids;
//     print_r($temp);
//     echo "<br>";
//     echo $key;
    
/*------------Passing it to save page in session -----------*/    
     $_SESSION['offset']=$key;
    
    
    
/*------------------Printing*-----------------------------*/    
     for($j=$key;$j<$count+$key;$j++)
     {
         echo "<tr>";
         echo "<td><strong>";
         echo $save_question_numbers[$j];
         echo "</td></strong>";
         echo "<td>$save_question_subs[$j]</td>";
         echo "<td>$save_question_statements[$j]</td>";
         echo "<td>$save_question_markss[$j]</td>";
         echo "</tr>";
     }
     
    
    
}
 
/**********************End of print function *************************************/  
        
        
        
?>

</table>
</div>
<div>

<?php

    $_SESSION['question_id']=$save_question_ids;
    $_SESSION['question_number']=$save_question_numbers;
    $_SESSION['question_sub']=$save_question_subs;
    $_SESSION['question_statement']=$save_question_markss;
    $_SESSION['question_marks']=$save_question_statements;
    $_SESSION['subject']=$subject_id;

    
?>
    
</div>
</body>
</html>
    