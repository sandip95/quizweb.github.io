
<?php

 
 
 /*$query="SELECT * FROM userresult where username=$Username";
 $data= mysqli_query($con, $query);
 $total= mysqli_num_rows($data);
 echo $total;
 
 while($result= mysqli_fetch_assoc($data))
{         
        echo '<font color=green size=30px>'.'Congratulation '.
          $result['Id'].', you have got '
          .$result['percentage'].'%';
} 
*/
 
?> 




<html>
<head>
 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link href="showresult.css" rel="stylesheet" type="text/css"/>
</head>
<body> 

 <div class="container">
      <?php
      session_start();
      include './quizconnection.php';
      error_reporting(0);


      $Username=$_SESSION['user_name'];
      //echo $Username;

      $query = "select * from userresult where username='$Username'";
      $data = mysqli_query($con, $query);//put id here then we will try for next level
      $total = mysqli_num_rows($data);
      //echo $total;
      while ($result = mysqli_fetch_assoc($data)) {
       ?>
        
     <a id="logout" href="logout.php" style="text-align: right"><div>Logout</div></a> 
           <div style="color: green; font-size: 20px; text-align: center">
                   <?php echo 'Congratulation '.
                   $result['username'].', you have got '
                  .$result['percentage'].'% !!!!'; ?>
           </div>
           <br>
           
           <div id="div1">RESULT</div>
          
             <table class="table table-bordered col-sm-6">
                 <tr>
                        <td>Total Questions</td>
                        <td><?php echo $result['totalques']?></td>
                  </tr>
                  <tr>
                        <td>Attempted Questions</td>
                        <td><?php echo $result['attemptques']?></td>
                   </tr>
                   <tr>
                        <td>Unattempted Questions</td>
                        <td><?php echo $result['unansques']?></td>
                   </tr>
                   <tr>
                        <td>Correct Questions</td>
                        <td><?php echo $result['anscorrect']?></td>
                   </tr>
                   <tr>
                        <td>Incorrect Questions</td>
                        <td><?php echo $result['incqus']?></td>
                   </tr>
                   <tr>
                        <td>Total Marks</td>
                        <td><?php echo $result['totmarks']?></td>
                   </tr>
                   <tr>
                        <td>Percentage</td>
                        <td><?php echo $result['percentage']?></td>
                   </tr>
                   
                </table>
            
           
         
       
            <?php 
            
            }
           
            ?>
       
 
</div>  
          
 </body>
</html>         

   

 










        
  