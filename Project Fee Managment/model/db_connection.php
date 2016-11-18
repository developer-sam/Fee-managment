<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>db connection</title>
</head>
<body>
<?php
class dbconnect
{
private $db_host="localhost";
private $db_user="root";
private $db_pass="";
private $db="fees";
public function __construct()
{
	$this->connection=mysql_connect($this->db_host,$this->db_user,$this->db_pass);
	mysql_select_db($this->db);
}
}
?>

</body>
</html>