<?php 
require_once('../model/service.php');
$obj=new service();
session_start();
$res=$obj->viewdata('countries');
$firstname=$_SESSION['firstname'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

   

<link rel="stylesheet" href="../css/validationEngine.jquery.css" type="text/css"/>
        <script src="../js/jquery-1.6.min.js" type="text/javascript"></script>
        <script src="../js/jquery.validationEngine.js" type="text/javascript" ></script>
		<script src="../js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
        

<?php 
$country=intval($_GET['country']);

require_once('../model/service.php');
$obj=new service();
$fields="country_id";
$values=$country;
$res=$obj->selectdata('states',$fields,$values);

?>
<select name="state" onchange="getCity(this.value)" class="form-control" >
<option>Select State</option>
<?php while($row=mysql_fetch_array($res)) { ?>
<option value="<?php echo $row['id']?>"><?php echo $row['name']?></option>
<?php } ?>
</select>
