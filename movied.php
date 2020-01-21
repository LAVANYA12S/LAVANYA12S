<!DOCTYPE html>
<html>
<head>
    <title>Table with database</title>

    <style type="text/css">
        table{
            border-collapse: collapse;
            width: 100%;
            color: #d96459;
            font-family: monospace;
            font-size: 25px;
            text-align: left;
        }
        
    </style>
     <body align="center" background="MPictures/b12.jpg">
</head>
<body align="center">
   <h1><font color="#fff">selected movie</font></h1>

<?php
$result = date('Y-m-d', strtotime($_POST['MovieDate']));
//echo $new_date;
session_start();
       $conn = mysqli_connect("localhost", "root", "", "authentication1");
       
       if ($conn-> connect_error) {
        die("Connection failed:". $conn-> connect_error);
       }

       $sql = "SELECT * FROM movie_info where show_time='$result'";
       $result = $conn-> query($sql);

       if($result-> num_rows > 0) {
        while ($row = $result-> fetch_assoc()) {
          echo "<tr><td>". $row["mov_id"] ."</td><td>". $row["movie_name"] ."</td><td>". $row["show_time"] ."</td><td>". $row["location"]."</tr></td>";
                }
                echo "</table>";
                echo "<meta http-equiv='Refresh' content='10; URL=BookingTransaction.php'>";
            }
                

?> 
 <form method="post" action="movied.php">
        <table align="center">
            
            <tr>
                <td><font color="#fff" size="5">Show date :</font></td>
                <td><input type="Date" name="MovieDate" value="<?php echo date('Y-m-d'); ?>"/   ></td>
            </tr>
            <tr>
           <td></td>
           <td><input type="submit" name="submit_btn" value="submit"></td>
           </tr> 

</body>
</html>