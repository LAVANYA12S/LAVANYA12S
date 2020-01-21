<?php
     session_start();

     //connect to database
     $db = mysqli_connect("localhost","root", "","authentication1");
     
     if (isset($_POST['login_btn'])) {
     	
         $username = mysql_real_escape_string($_POST['username']);
        $password = mysql_real_escape_string($_POST['password']);
         
         $password = md5($password); //remaber we hashed password before storing last time
         $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
         $result = mysqli_query($db, $sql);

         if (mysqli_num_rows($result) == 1) {
              $_SESSION['message'] = "You are now logged in ";
              $_SESSION['username'] = $username;
              header("location: movie.php"); //redirect to home page
         }else{
             $_SESSION['message'] = "Username/password combination incorrect ";
         }
       }
?>



<!DOCTYPE html>
<html>
<head>
    <title>Register, login and logout user php mysql</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
 <body align="center" background="MPictures/download.jpg">
   <h1><font color="#fff"> Login </font></h1>
<?php 
        if (isset($_SESSION['message'])){
            echo "<div id='error_msg'>".$_SESSION['message']."</div>";
            unset($_SESSION['message']);
     }

     ?>
 <form method="post" action="login.php">
        <table align="center">
           <tr>
           <td><font color="#fff">Username:</font></td>
           <td><input type="text" name="username" class="textInput"></td>
           </tr>
           <tr>
           <td><font color="#fff">Password:</font></td>
           <td><input type="password" name="password" class="textInput"></td>
           </tr>
           <tr>
           <td></td>
           <td><input type="submit" name="login_btn" value="Login"></td>
           </tr>
         </table>
 </form> 
 </body>   
 </html>