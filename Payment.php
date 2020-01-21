<?php
     session_start();

     //connect to database
     $db = mysqli_connect("127.0.0.1","root", "","authentication1");
     
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
            echo "<meta http-equiv='Refresh' content='2; URL=movie.php'>";
            //header("location: register.php"); //redirecting to home page
            //echo '<script type="text/javascript">alert("Payment succesful!");</script>';
            // $_SESSION['no_ticket'] = $no_ticket;
            
     }
?>


<!DOCTYPE HTML>
<html>
<head>
    <title>Payment</title>
     <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body align="center" background="MPictures/Background6.jpg">
    <h1><font color="#fff" size="20">Payment transaction</font></h1>
    <?php 
        if (isset($_SESSION['message'])){
            echo "<div id='error_msg'>".$_SESSION['message']."</div>";
            unset($_SESSION['message']);
     }

     ?>
    <form method="post" action="Payment.php">
        <table align="center">
            <tr>
                <td><font color="#fff" size="5">Number Of Tickets :</font></td>
                <td><input type="Number" name="no_ticket" required></td>
            </tr>
            <tr>
                <td><font color="#fff" size="5">Date :</font></td>
                <td><input type="Date" name="movie_date" required></td>
            </tr>
            <tr>
                <td><font color="#fff" size="5">AcountNumber :</font></td>
                <td><input type="text" name="acc_no" required></td>
            </tr>
            <tr>
                <td><font color="#fff" size="5">BankName :</font></td>
                <td><input type="text" name="bank_name" required></td>
            </tr>
            <tr>
                <td></td>
            </tr>
           <tr>
           <td></td>
           <td><input type="submit" name="submit_btn" value="Pay"></td>
           </tr>       
        </table>
    </form>
</body>
</html>