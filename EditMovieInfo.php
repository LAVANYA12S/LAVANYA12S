<?php
     session_start();

     //connect to database
     $db = mysqli_connect("localhost","root", "","authentication1");
     
     if (isset($_POST['AddMovie_btn'])) {
        
         $m_id = mysql_real_escape_string($_POST['MovieID']);
         $movie_name = mysql_real_escape_string($_POST['MovieName']);
         $s_time = mysql_real_escape_string($_POST['MovieDate']);
         $location = mysql_real_escape_string($_POST['Location']);
         $mov_id = (int)$m_id;
         $show_time = date($s_time);

         
                //create user
            
            $sql = "INSERT INTO movie_info(mov_id,movie_name,show_time,location) VALUES('$mov_id', '$movie_name', '$show_time','$location')";
            mysqli_query($db,$sql);
            $_SESSION['message'] = "Movie insert sucessful";
            header("location: movie.php"); //redirecting to home page
     }
      if (isset($_POST['DeleteMovie_btn'])) {
        
         $m_id = mysql_real_escape_string($_POST['MovieID']);
         $movie_name = mysql_real_escape_string($_POST['MovieName']);
         $s_time = mysql_real_escape_string($_POST['MovieDate']);
         $location = mysql_real_escape_string($_POST['Location']);
         $mov_id = (int)$m_id;
         $show_time = date($s_time);
         
                //create user
            
            // $sql = "Delete from movie_info where mov_id = '$mov_id' ,movie_name = '$movie_name', show_time = '$show_time' and location = '$location'";
         $sql = "Delete from movie_info where mov_id = $mov_id";
            mysqli_query($db,$sql);
            $_SESSION['message'] = "Movie deleted sucessful";
            header("location: movie.php"); //redirecting to home page
     }
      if (isset($_POST['UpdateMovie_btn'])) {
        
         $m_id = mysql_real_escape_string($_POST['MovieID']);
         $movie_name = mysql_real_escape_string($_POST['MovieName']);
         $s_time = mysql_real_escape_string($_POST['MovieDate']);
         $location = mysql_real_escape_string($_POST['Location']);
         $mov_id = (int)$m_id;
         $show_time = date($s_time);
         
                //create user
            
            $sql = "UPDATE movie_info set movie_name = '$movie_name',show_time = '$show_time' ,location = '$location' 
            where mov_id = $mov_id";
            mysqli_query($db,$sql);
            $_SESSION['message'] = "Movie Updated sucessful";
            header("location: movie.php"); //redirecting to home page
     }
?>


<!DOCTYPE HTML>
<html>
<head>
    <title> Insert Movie</title>
     <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body align="center" background="MPictures/Background2.jpg">
    <h1><font color="#fff" size="20">Insert / Update / Delete Movie</font></h1>
    <?php 
        if (isset($_SESSION['message'])){
            echo "<div id='error_msg'>".$_SESSION['message']."</div>";
            unset($_SESSION['message']);
     }

     ?>
    <form method="post" action="EditMovieInfo.php">
        <table align="center">
            <tr>
                <td><font color="#fff" size="5">Movie Id</font></td>
                <td><input type="Number" name="MovieID" required></td>
            </tr>
            <tr>
                <td><font color="#fff" size="5">Show date :</font></td>
                <td><input type="Date" name="MovieDate" required></td>
            </tr>
            <tr>
                <td><font color="#fff" size="5">Movie Name :</font></td>
                <td><input type="text" name="MovieName" required></td>
            </tr>
            <tr>
                <td><font color="#fff" size="5">Locaton :</font></td>
                <td><input type="text" name="Location" required></td>
            </tr>
            <tr>
                <td></td>
            </tr>
             <tr>
           <td></td>
           <td><input type="submit" name="AddMovie_btn" value="Add Movie"></td>
           </tr> 
            <tr>
           <td></td>
           <td><input type="submit" name="UpdateMovie_btn" value="Update Movie"></td>
           </tr>    
            <tr>
           <td></td>
           <td><input type="submit" name="DeleteMovie_btn" value="Delete Movie"></td>
           </tr>  
        </table>
    </form>
</body>
</html>