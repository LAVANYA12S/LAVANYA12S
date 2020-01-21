<?php
$db = new mysqli("localhost","root","","authentication1");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>TOTAL SEATS</title>
</head>
<body>
	<h2>INSERT FORM</h2>
	<?php
       $sql = "SELECT * FROM multiplex_therter";
       $result = $db->query($sql);
    ?>
    <form action="" method="post">
    	<select movie_name="" mov_id="">
    		<option value="">Select one</option>
    		<?php
              while($row = $result-fetch_assoc()){?>
              	<option value="<?php echo $row['total_seat']?>"><?php echo $row['total_seat']?></option>
              <?php }
    		?>
    	</select>
    	<input type="submit" name="submit" value="INSERT">
    </form>
    <?php
    if($SERVER['REQUEST_METHOD']=='post'){
       $total_seat = $_POST['total_seat'];
       $sql = "INSERT FROM multiplex_therter where mov_id = '$mov_id'";
       $db->query($sql);

       if($db->affected_row>0){
       	echo "<h1>Successfully INSERTED</h1>";
       }
    }
    
?>
</body>
</html>