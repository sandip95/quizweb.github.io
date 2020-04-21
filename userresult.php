<?php
session_start();
include './quizconnection.php';
error_reporting(0);

$Username = $_SESSION['user_name'];       

if(isset($_POST["submit"]))
{
    if(!empty($_POST['quizcheck'])){
        
        $count=count($_POST['quizcheck']);
        //echo 'you have answered '.$count.' questions'; 
        //echo '<br>';
        
        $totques=5;
      
        $unans=$totques-$count;
       // echo 'Unanswered questions '.$unans;
       // echo '<br>';
       
        $result=0;
        $i=1;
        $selected=$_POST['quizcheck'];
        //print_r($selected); 
        
        $unselected=$_POST['quizcheck'];
       // echo $unselected; 
        //echo '<br>';
      
        
        $query="select * from question";
        $data= mysqli_query($con, $query);
        
        while ($row = mysqli_fetch_array($data)) {
            
           // print_r($row['ans_id']); 
            
            $score=0;
            $checked=$row['ans_id']==$selected[$i];
            if ( $checked) {
                $result++;
                  
            }
          $i++;
        }
        // echo '<br>';
       // echo 'your score is '.$result;
        //echo '<br>';
        
        $totalmarks=$result;
        //echo '<br>';
       
        $percentage=$result*(100/$totques);
        //echo 'congratulations '.$Username. ', you have got '.$percentage.'%';
        
        $incqus=$count-$result;
       // echo '<br>';
       // echo $incqus;
    } 
    else
     {
        header("location:showquiz.php");
        
    }
    
   
}

 $query="insert into userresult(username,totalques,attemptques,unansques,anscorrect,incqus,totmarks,percentage) values('$Username','$totques','$count','$unans','$result','$incqus','$totalmarks','$percentage')";
 $uresult=mysqli_query($con, $query);
  
  
?> 

<html>
   <head>
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
       <style type="text/css">
           a{
               align-items: center;
               margin-left: 450px;
               margin-top: 200px;
               font-size: 20px;
           }
     </style>
    </head>
    <body>
        <a href="showresult.php" class="btn btn-success">Get your result</a>
    </body> 
    
</html>