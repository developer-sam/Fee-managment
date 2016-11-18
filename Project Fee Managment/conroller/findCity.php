
<?php
// $countryId=intval($_GET['country']);
$stateId=intval($_GET['state']);
require_once('../model/service.php');
$obj=new service();
$fields="state_id";
$values=$stateId;
 $res=$obj->viewonlysomewhere('cities',$fields,$values);
//echo $query="SELECT id,name FROM cities WHERE state_id='$stateId'";



?>
<select name="city">
<option>Select City</option>
<?php while($row=mysql_fetch_array($res)) { ?>
<option value=<?php echo $row['id']?>><?php echo $row['name']?></option>
<?php } ?>
</select>
