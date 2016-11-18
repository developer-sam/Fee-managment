

<?php 
$country=intval($_GET['country']);

require_once('../model/service.php');
$obj=new service();
$fields="country_id";
$values=$country;
$res=$obj->viewonlysomewhere('states',$fields,$values);

?>
<select name="state" onchange="getCity(this.value)">
<option>Select State</option>
<?php while($row=mysql_fetch_array($res)) { ?>
<option value=<?php echo $row['id']?>><?php echo $row['name']?></option>
<?php } ?>
</select>
