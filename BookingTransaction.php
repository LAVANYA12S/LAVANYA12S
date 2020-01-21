<?php
     session_start();

     //connect to database
     $db = mysqli_connect("127.0.0.1","root", "","authentication1");

     if (isset($_POST['BookingTransaction_btn'])) {

         $_SESSION['message'] = "Button clicked";
     	   $bookId = mysql_real_escape_string($_POST['BookId']);
         $ticket = mysql_real_escape_string($_POST['TicketNo']);
         $MovieName = mysql_real_escape_string($_POST['MovieName']);
         $MovieTime = mysql_real_escape_string($_POST['MovieTime']);
         $m_date = mysql_real_escape_string($_POST['MovieDate']);
         $s_no = mysql_real_escape_string($_POST['ScreenNo']);
         $TypeOfSeats = mysql_real_escape_string($_POST['TypeOfSeats']);

         /*$bookId = ($_POST['BookId']);
         $ticket = ($_POST['TicketNo']);
         $MovieName = ($_POST['MovieName']);
         $MovieTime = ($_POST['MovieTime']);
         $m_date = ($_POST['MovieDate']);
         $s_no = ($_POST['ScreenNo']);
         $TypeOfSeats = ($_POST['TypeOfSeats']);*/

         $_SESSION['message'] = "Value took";
         $BookId = (int)$bookId;
         $TicketNo = (int)$ticket;
         $MovieDate = date($m_date);
         $ScreenNo = (int)$s_no;
 $_SESSION['message'] = "Value formatted";

         	$sql = "INSERT INTO booking_transaction(book_id,ticket_number,movie_name,showtime,movie_date,screen_no,type_of_seat) VALUES('$BookId', '$TicketNo','$MovieName','$MovieTime', '$MovieDate', '$ScreenNo', '$TypeOfSeats')";

            mysqli_query($db,$sql);
            $_SESSION['message'] = "Movie Booked sucessful";
            echo "<meta http-equiv='Refresh' content='2; URL=movie.php'>";
            //header("location: payment.php"); //redirecting to home page
            //$_SESSION['message'] = "Movie Booked sucessful";
            //echo "Movie Booked sucessful!";
            
    }
?>



<!DOCTYPE HTML>
<html>
<head>
    <title> Insert Movie</title>
     <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body align="center" background="MPictures/v9.jpg">
    <h1><font color="#fff" size="20">BOOKING TRANSACTION</font></h1>
    <?php 
        if (isset($_SESSION['message'])){
            echo "<div id='error_msg'>".$_SESSION['message']."</div>";
            unset($_SESSION['message']);
     }

     ?>
    <form method="post" action="BookingTransaction.php">
        <table align="center">
            <tr>
                <td><font color="#fff" size="5">BookId :</font></td>
                <td><input type="Number" name="BookId" required></td>
            </tr>
            <tr>
                <td><font color="#fff" size="5">Number Of Ticket :</font></td>
                <td><input type="Number" name="TicketNo" required></td>
            </tr>
            <tr>
                <td><font color="#fff" size="5">MovieDate :</font></td>
                <td><input type="Date" name="MovieDate" required></td>
            </tr>
            </tr>
            <tr>
                <td><font color="#fff" size="5">MovieTime :</font></td>
                <td><input type="Time" name="MovieTime" required></td>
            </tr>
            <tr>
                <td><font color="#fff" size="5">MovieName :</font></td>
                <td><input type="text" name="MovieName" required></td>
            </tr>
            <tr>
                <td><font color="#fff" size="5">ScreenNo :</font></td>
                <td><input type="Number" name="ScreenNo" required></td>
            </tr>
            <tr>
                <td><font color="#fff" size="5">TypeOfSeats :</font></td>
                <td><input type="text" name="TypeOfSeats" required/></td>
            </tr>
            <tr>
                <td></td>
            </tr>
             <tr>
           <td></td>
           <td><input type="submit" name="BookingTransaction_btn" value="Book Tickets"></td>
           </tr> 
           </table>
    </form>
</body>
</html>