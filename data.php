<?php
$conn = mysqli_connect("localhost","root", "","authentication1");
if(!$conn){
	die("Connection Failed:" .mysqli_connect_error());
}
if(isset($_POST['search']))
{
	$txtStartDate=$_POST['txtStartDate'];
	$txtEndDate=$_POST['txtEndDate'];
	$query=mysqli_query($conn,"SELECT * FROM movie_info Where show_time Between '$txtStartDate' and '$txtEndDate' order by show_time");
	$count=mysqli_num_rows($query);

}
?>
<!DOCTYPE html>
<html>
<head>
	<h1><font color="#fff" size="20">Search Movies</font></h1>
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
<center>

	
    
</head>
<body align="center" background="MPictures/v4.jpg">

  <table>
       <tr><font color="#fff" size="5">
       	<th><font color="#fff" size="5">Sno</font></th>
        <th><font color="#fff" size="5">MovieName</font></th>
        <th><font color="#fff" size="5">Date</font></th>
        <th><font color="#fff" size="5">Location</font></th>
       </font> 
       </tr>

<form method = "post" action = "data.php">
	<input type = "date" name = "txtStartDate">
	<input type = "date" name = "txtEndDate">
	<p>
		<input type = "submit" name = "search" value="Search movies .. !">
	</p>
	
	<?php
	if($count == 0)
	{   

		echo '<h2>No Movies are found !</h2>';
	}
	else
	{    
		while($row = mysqli_fetch_array($query)) {
			echo "<tr><td>". $row["mov_id"] ."</td><td>". $row["movie_name"] ."</td><td>". $row["show_time"] ."</td><td>". $row["location"]."</tr></td>";
		}

	}
	?>
   
</form>
</center>
<tr>
           <td></td>
       <a href="movie.php">Click Me</a>
       </tr>
   </table>
</body>
</html>