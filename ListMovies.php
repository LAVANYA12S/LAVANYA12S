<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$query ="SELECT * FROM country";
$results = $db_handle->runQuery($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dropdown list</title>
</head>
<style type="text/css">
    body{width: 800px;
         font-family: calibir;
         padding: 0;
         margin: 0 auto;
         }
    .frm{
        border: 1px solid #7ddaff;
        background-color: #b4c8d0;
        margin: 0px auto;
        padding: 40px;
        border-radius: 4px;
    }
    .InputBox{
        padding: 10px;
        border:#bdbdbd 1px solid;
        border-radius:4px;
        background-color: #FFF;
        width: 50%
    }
    .row{
        padding-bottom: 15px;
        padding-left: 150px;
    }
</style>
<script src="jquery.main.js" type="text/javascript"></script>

<script type="text/javascript">
    
    function getState(val){
        $.ajax({
            type: "Post",
            url: "getState.php"
            date:'country_id='+val,
            success:function(date){
                $("#state-list").html(date);
                getCity();
            }

        });
    }
     function getCity(val){
        $.ajax({
            type: "Post",
            url: "getCity.php"
            date:'state_id='+val,
            success:function(date){
                $("#city-list").html(date);
            
            }

        });
    }
</script>
<body>
    <div class="frm">
        <h2>Dependent Dropdown List - countries ,State and cites</h2>
        <div class="row">
            <select name="country" id="contry-list" class="InputBox" onChange="getState(this.value);">
                <option value disabled selected>Select Country</option>
                <?php
        foreach ($result as $country) {
            ?>
            <option value="<?php echo $city["id"]; ?>"><?php echo $country["country_name"]; ?></option>
            <?php
        }
        ?>
            </select>
        </div>
        <div class="row">
            <label>State :</label><br>
            <select name="state" id="state-list" class="InputBox" onChange="getCity(this.value);">
               <option value="">Select State</option> 
           </select>
            </div>
        <div class="row">
            <label>City :</label><br>
            <select name="city" id="city-list" class="InputBox">
               <option value="">Select Country</option> 
           </select>


</body>
</html>