<?php
     session_start();

     //connect to database
     $db = mysqli_connect("localhost","root", "","authentication1");
     
     if (isset($_POST['submit_btn'])) {
        
        $_SESSION['message'] = "Button clicked";
         $ticket = mysql_real_escape_string($_POST['no_ticket']);
         $m_date = mysql_real_escape_string($_POST['movie_date']);
         $a_no = mysql_real_escape_string($_POST['acc_no']);
         $bank_name = mysql_real_escape_string($_POST['bank_name']);
 $_SESSION['message'] = "Value took";
         $no_ticket = (int)$ticket;
         $movie_date = date($m_date);
         $acc_no = (int)$a_no;
          $_SESSION['message'] = "Value formatted";
         
                //create user
            
            $sql = "INSERT INTO payment_transaction(ticket_no,movie_date,acc_no,bank_name) VALUES('$no_ticket', '$movie_date', '$acc_no','$bank_name')";
             //$sql = "INSERT INTO payment_transaction(ticket_no,movie_date,acc_no,bank_name) VALUES(123, 01,01,01),1234,'kotak')";
            mysqli_query($db,$sql);
            $_SESSION['message'] = "Payment succesful";
            // $_SESSION['no_ticket'] = $no_ticket;
            // header("location: home.php"); //redirecting to home page
     }
     if(isset($_POST['EditMovie_btn']))
     {
        header("location: EditMovieInfo.php");
     }
     if(isset($_POST['BookingTransaction_btn']))
     {
        header("location: BookingTransaction.php");
     }
     if(isset($_POST['payment_btn']))
     {
        header("location: Payment.php");
     }
     if(isset($_POST['Movie_btn']))
     {
        echo "<meta http-equiv='Refresh' content='2; URL=proceduer.php'>";
    }
     if(isset($_POST['paymentdetail_btn']))
     {
         echo "<meta http-equiv='Refresh' content='2; URL=paymentdetail.php'>";
     }
     if(isset($_POST['moviedetail_btn']))
     {
         echo "<meta http-equiv='Refresh' content='2; URL=data.php'>";
     }
     if(isset($_POST['logout_btn']))
     {
         echo "<meta http-equiv='Refresh' content='2; URL=home.php'>";
     }

?>


<!DOCTYPE HTML>
<html>
<head>
    <title>Movie</title>
     <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body align="center" background="MPictures/Background6.jpg">
    <h1><font color="#fff" size="20">Movies</font></h1>
    <?php 
        if (isset($_SESSION['message'])){
            echo "<div id='error_msg'>".$_SESSION['message']."</div>";
            unset($_SESSION['message']);
        }
     //        if (isset($_SESSION['CMovie'])){
     //        echo "<div id='error_msg'>".$_SESSION['CMovie']."</div>";
     //        $_SESSION['CMovie'] = "";
     //        unset($_SESSION['CMovie']);
     //    }
     //        if (isset($_SESSION['UMovie'])){
     //        echo "<div id='error_msg'>".$_SESSION['UMovie']."</div>";
     //        $_SESSION['UMovie'] = "";
     //        unset($_SESSION['message']);
     // }

     ?>
    <form method="post" action="movie.php">
        <table align="center">
             <tr>
           <td></td>
           <td><input type="submit" name="Movie_btn" value="Movie Details"></td>
           </tr>
            <tr>
           <td></td>
           <td><input type="submit" name="paymentdetail_btn" value="Payment Details"></td>
           </tr>
           <tr>
           <td></td>
           <td><input type="submit" name="EditMovie_btn" value="Edit Movie data"></td>
           </tr>
           <tr>
           <td></td>
           <td><input type="submit" name="BookingTransaction_btn" value="Book Tickets"></td>
           </tr> 
           <tr>
           <td></td>
           <td><input type="submit" name="payment_btn" value="Payment"></td>
           </tr> 
           <tr>
           <td></td>
           <td><input type="submit" name="moviedetail_btn" value="Search"></td>
           </tr>  
           <tr>
           <td></td>
           <td><input type="submit" name="logout_btn" value="Logout"></td>
           </tr>    
        </table>
    </form>
</body>
</html>