<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
require_once("db_connection.php");
class sql_execution
{
	public function __construct()
	{
		$this->obj=new dbconnect();
	}
	public function executequery($sql)
	{
		$this->res=mysql_query($sql);
	}
	public function getresult()
	{
		return $this->res;
	}
}

?>
</body>
</html>