
<?php
       session_start();
       include ("./quizconnection.php"); 
       error_reporting(0);
?>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <link href="login.css" rel="stylesheet" type="text/css"/>
    </head>
    
    <body>
        <div id="div1">
            Welcome To Quiz.com
        </div>
         <div id="div2">
            Login Here
        </div>
        <div class="container">
            <div class="col-sm-4 m-auto d-block">
                
                <div class="card-body">
                    <div class="form-group">
                        <form action="" method="get">
                            <input type="text"  name="username" placeholder="Username" autocomplete="off" value="" class="form-control"/><br>
                            <input type="password"  name="password" id="pass" placeholder="Password" value="" autocomplete="off" class="form-control"/><br>
                            <input type="submit" name="submit" value="login" class="btn btn-success"><br>
                            <center><a href="register.php">
                                   <small>New user register here<small></a></center>
                        </form>
                    </div>
                 </div>
            </div>
        </div>
        
        
       
        
    </body>
        <?php
         if(isset($_GET['submit']))
         {   
             $user=$_GET['username'];
             $pwd=$_GET['password'];
             $query="SELECT * FROM REGISTER WHERE username='$user' && password='$pwd'";
             $result= mysqli_query($con, $query);
             $total = mysqli_num_rows($result);
             //echo $total;
         
             if($total==1)
             {
                 //echo 'you are login successfully!!!';
                 
                 header('location:showquiz.php');
                 $_SESSION['user_name']=$user;
                 $_SESSION['pass_word']=$pwd;
                 
             }
             else 
              {
                 $message="Username and Password incorrect.\\nTry again.";
                 echo "<script type='text/javascript'>alert('$message');</script>";
              }
                       
         }
        
            
         
        
        ?>
    </html>    
<!-- <form action="" method="get">
            <label><strong>Username:</strong></label><br>
            <input type="text"  name="username" value=""/><br>
            <label><strong>Password:</strong></label><br>
            <input type="text"  name="password" value=""/><br>
            <input type="submit" name="submit" value="login">
        </form> 
-->