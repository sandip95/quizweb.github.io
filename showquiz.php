<?php
include './quizconnection.php';
session_start();
error_reporting(0);
?> 
<html lang="en">
<head>
 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link href="showquiz.css" rel="stylesheet" type="text/css"/>
</head>
<body>  
    
   
   <div class="container" id="div1">
       <div id="div2">
           <?php
           $Username = $_SESSION['user_name'];
           echo '<h4>Welcome '.$Username.', you can start the quiz</h4>';
           ?>       
       </div>
            <a id="logout" href="logout.php" style="text-align: right"><div>Logout</div></a> 
       <div class="col-sm-6 m-auto d-block">
       
           <form action="userresult.php" method="post">
           <?php 
            for($i=1; $i<6; $i++){ 
            $query ="select * from question where qus_id=$i";
            $data =mysqli_query($con, $query);
            while($r= mysqli_fetch_array($data)){
           ?>
       
       <div class="card-header"><?php echo $r['question']; ?></div>
           <?php 
            $query ="select * from answer where ans_id=$i";
            $data =mysqli_query($con, $query);
            while($result= mysqli_fetch_array($data)){
           ?> 

       <div class="card-body">
                <input type="radio" name="quizcheck[<?php echo $result['ans_id'];?>]" 
                       value="<?php echo $result['Id']; ?>"  >
                 <?php echo $result['answers']; ?>
            </div>
             
             <?php 
            }
             } 
           }
               ?>
       <input type="submit" id="submit" name="submit" value="submit" class="btn btn-primary m-auto d-block"/>
      
       </form>
              
             </div>
       </div>
       
    
       </div>   
       
  </body>
</html>
   
