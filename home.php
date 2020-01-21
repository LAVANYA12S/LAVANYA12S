<?php
     session_start();

?>

<!DOCTYPE html>
<html>
<head>
  
    <title>Register, login and logout user php mysql</title>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
 <body align ="center", background="MPictures/download.jpg">
   <h1><font color="#fff">Logout</font></h1>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
<?php 
        if (isset($_SESSION['message'])){
            echo "<div id='error_msg'>".$_SESSION['message']."</div>";
            unset($_SESSION['message']);
     }

     ?>


<h2>Home</h222>

<p><font color="#000000">  
You have successful loged out
</font>
</p> 
<div><a href="logout.php">Logout</a></div>
 </body>   
 </html>