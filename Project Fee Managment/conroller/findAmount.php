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
 $stateId=intval($_GET['state']);
$con = mysql_connect('localhost', 'root', ''); 
if (!$con) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db('fees');
$query="SELECT id,amount FROM amount WHERE course_id='$stateId'";
$result=mysql_query($query);

?>
<input type="text" name="amount" class="form-control" value="<?php while($row=mysql_fetch_array($result)) { ?>
<?php echo $row['amount']?>"
<?php } ?>>
