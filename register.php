<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
       include './quizconnection.php';
       error_reporting(0);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <link href="register.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div id="div2">
            Register Here
        </div>
        <div class="container">
            <div class="col-sm-4 m-auto d-block">
                
                <div class="card-body">
                    <div class="form-group">
                        <form action="" method="post" enctype="multipart/form-data">
                            <label>Username</label><br>
                            <input type="text"  name="username" autocomplete="off" value="" class="form-control"/><br>
                            <label>Password</label><br>
                            <input type="password"  name="password"  value="" autocomplete="off" class="form-control"/><br>
                            <label>Your Photograph</label><br>
                            <input type="file" name="uploadfile" value="" class="form-control"/><br/>
                            <input type="submit" name="submit" value="Register" class="btn btn-success"><br>
                            <center><a href="login.php">
                                   Login here</a></center>
                        </form>
                    </div>
                 </div>
            </div>
        </div>
        
        <?php
          if(isset($_POST['submit']))
            {
              $username=$_POST['username'];
              $password=$_POST['password'];
              $filename = $_FILES["uploadfile"]["name"];
              $tempname = $_FILES["uploadfile"]["tmp_name"];
              $folder = "phpphoot/".$filename;
              //echo $folder;
              move_uploaded_file($tempname,$folder);
              
              if($username!="" && $password!="" && $folder)
              {
              $query="insert into register values('$username','$password','$folder')";
              $data=mysqli_query($con, $query);
              //echo $data;
              echo '<br>';
              if($data==1)
              {
                 $message="You have successfully registered.";
                 echo "<script type='text/javascript'>alert('$message');</script>";
              } 
              else
              {
                   $message="You are already user.\\nPlease login.";
                 echo "<script type='text/javascript'>alert('$message');</script>";
              } 
             
              
              } 
              else{
                  echo 'all fields are required';
              }
              
            }
        ?>
    </body>
</html>
