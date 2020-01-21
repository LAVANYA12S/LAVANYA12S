<?php
     session_start();

     //connect to database
     $db = mysqli_connect("localhost","root", "","authentication1");
     
     if (isset($_POST['register_btn'])) {
     	
         $username = mysql_real_escape_string($_POST['username']);
         $email = mysql_real_escape_string($_POST['email']);
         $password = mysql_real_escape_string($_POST['password']);
         $password2 = mysql_real_escape_string($_POST['password2']);
         
         $sql_e = "SELECT * FROM users WHERE email='$email'";
        $res_e = mysqli_query($db, $sql_e);

       if(mysqli_num_rows($res_e) > 0){
        $_SESSION['message'] = "Sorry... you have already Registered";
  }else{
         if ($password == $password2){
                //create user
         	$password = md5($password); //hash password before storing for security purposes
         	$sql = "INSERT INTO users(username,email,password) VALUES('$username', '$email', '$password')";
         	mysqli_query($db,$sql);
         	$_SESSION['message'] = "You are loggod in";
         	$_SESSION['username'] = $username;
            header("location: front.php"); //redirecting to home page
         }else{
         	$_SESSION['message'] = "The two password do not match";
         }
     }
   }
     
     if(isset($_POST['Login_btn'])) {
       header("location: front.php");
     }
?>



<!DOCTYPE html>
<html>
<head>
  
    <title>Register, login and logout user php mysql</title>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
 <body align ="center", background="MPictures/Background1.jpg">
   <h1><font color="#fff">Register</font></h1>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
<?php 
        if (isset($_SESSION['message'])){
            echo "<div id='error_msg'>".$_SESSION['message']."</div>";
            unset($_SESSION['message']);
     }

     ?>
 <form method="post" action="register.php">
        <table align="center">
           <tr>
           <td><font color="#fff">Username:</font></td>
           <td><input type="text" name="username" class="textInput"></td>
           </tr>
           <tr>
           <td><font color="#fff">Email:</font></td>
           <td><input type="email" name="email" class="textInput"></td>
           </tr>
           <tr>
           <td><font color="#fff">Password:</font></td>
           <td><input type="password" name="password" class="textInput"></td>
           </tr>
           <tr>
           <td><font color="#fff">Confirm password:</font></td>
           <td><input type="password" name="password2" class="textInput"></td>
           </tr>
           <tr>
            <td></td>
           <td><input type="submit" name="register_btn" value="Register"></td>
           <!-- <td><input type="submit" name="Login_btn" value="Login"></td> -->
           </tr>
         </table>
 </form> 
 
 </body>   
 </html>