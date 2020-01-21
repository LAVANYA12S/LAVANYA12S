<?php
session_start();
?>
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
    th {
      background-color: #C0C0C0;
      color:white;
    }
    tr:nth-child(even) {background-color: #000000}
  </style>
</head>
<body align="center" background="MPictures/b10.jpg">
   <h1><font color="#fff"> Payment Details </font></h1>
<body>
  <table>
       <tr>
        <th>NumberOftickets</th>
        <th>Date </th>
        <th>AcountNumber</th>
        <th>BankName</th>
       </tr>
       <?php
       
       $conn = mysqli_connect("localhost", "root", "", "authentication1");
       
       if ($conn-> connect_error) {
        die("Connection failed:". $conn-> connect_error);
       }

       $sql = "SELECT * FROM payment_transaction";
       $result = $conn-> query($sql);

       if($result-> num_rows > 0) {
        while ($row = $result-> fetch_assoc()) {
          echo "<tr><td>". $row["ticket_no"] ."</td><td>". $row["movie_date"] ."</td><td>". $row["acc_no"] ."</td><td>". $row["bank_name"]."</tr></td>";
                }
                echo "</table>";
                
            }
                else {
                  echo "0result";
                  header("location: movie.php");
                }
                
            
       
       ?>
       <tr>
           <td></td>
       <a href="movie.php">Click Me</a>
       </tr>
</table>
</body>
</html>

