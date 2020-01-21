<?php
require_once ("dbcontroller.php");
$db_handel = new DBController();
if(! empty($_POST["state_id"])) {
	$query = "SELECT * FROM city WHERE stateID = '" .$_POST["state_id"] . "' order by name asc";
	$results = $db_handle->runQuery($query);
	?>
	<option value disabled selected>Select City</option>
	<?php
	    foreach ($result as $city) {
	    	?>
	    	<option value="<?php echo $city["id"]; ?>"><?php echo $city["name"]; ?></option>
	    	<?php
	    }
}
?>
