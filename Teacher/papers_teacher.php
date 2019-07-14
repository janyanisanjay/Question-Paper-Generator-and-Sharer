<html>
    <head>
       <style>
            .paper:hover{
                box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
                margin-top: 50px;
                border: 1px solid;
            }
        </style>
        
    </head>
    <body>
       <?php
        
                require_once("../includes/db.php");
//                session_start();
                $generated_by=$_SESSION['teacher_id'];//later from session
                $query =  "select * from generated_paper_by_teacher where generated_by=$generated_by";
                $result_set=mysqli_query($connection,$query);
                $number=mysqli_num_rows($result_set);
//                echo $number;
                
                $count=0;
        while($count != $number){
            $row=mysqli_fetch_assoc($result_set);
            $paper_name = $row['generated_paper_name'];
//            echo $paper_name;
            $paper_id = $row['generated_paper_id'];    
            echo "<a  href='paper_to_pdf.php?id={$paper_id}'><div class='paper' style='margin-left: 100px;float:left; display:inline_block; margin-top: 40px; height:200px; width:250px; background-image: url(doc.png); border:solid 1px #999; background-size:100% 100%; '>  
            
            
            <div  style='margin-top:150px; width:248px; height:50px;float:left; display:inline_block; box-sizing:border-box; background:#eee; border-bottom:solid 1px #999' ><p style=' color:#333;margin-top:10px; font-size:20px; text-align:center;'>$paper_name</p></div>
            </div></a>";    
            $count=$count+1;
            
        }
        //echo   
        ?>
           
            </body>
</html>




<!--
<div class="small-box bg-yellow">
            <div class="inner">
              <h3>14</h3>

              <p>Number of Groups</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>-->





<!--

<a class='small-box bg-aqua' href='paper_to_pdf.php?id={$paper_id}'><div style='margin-left: 100px;float:left; display:inline_block; margin-top: 40px;height:200px; width:250px; background:aqua; border:solid 1px #777 '>  
            
            
            <div style='margin-top:150px; width:250px; height:50px;float:left; display:inline_block; box-sizing:border-box; background:grey; border:solid 1px #777' ><p style='margin-left:20px; color:yellow' >$paper_name</p></div>
            </div> </a>-->
