<?php
require_once('../model/service.php');
$obj=new service(); 


session_start();
$num_rec_per_page=3;
if(isset($_GET["page"]))
{
	$page=$_GET["page"];
}
else
{
	$page=1;
}
$start_from = ($page-1) * $num_rec_per_page; 
$condition="paidstatus='1'";
$res=$obj->selectwithwherelimit('register',$condition,$start_from,$num_rec_per_page);
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
        <script>
            
			jQuery(document).ready(function(){
			
			// binds form submission and fields to the validation engine
			jQuery("#myform").validationEngine();
			jQuery('#myform').validationEngine('validate');
		});
        </script>
        <link href="../css/bootstrap.css" rel='stylesheet' type='text/css' />
		<script src="../js/jquery.min.js"></script>
		<link href="../css/animate.css" rel="stylesheet" type="text/css" media="all">
        <script src="../js/bootstrap.min.js" ></script>
		<link href="../css/style.css" rel='stylesheet' type='text/css' />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		</script>
        <script src="../js/lightbox.min.js"></script>
        <link href="../css/lightbox.css" rel="stylesheet" />
        
        <style>
            #cboxOverlay{ background:#DFDFDF; }
        </style>
     <script language="javascript" type="text/javascript">
function paym(paid)
{
	
	
	if(paid=="instalment")
	{	
		document.getElementById("payment").style.display="none";
		document.getElementById("payments").style.display="inline";
	}
	else
	{
		document.getElementById("payments").style.display="none";
		document.getElementById("payment").style.display="inline";
	}
}
function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();//The XMLHttpRequest object is used to exchange data with a server behind the scenes
		}
		catch(e)	{		
			try{	//All modern browsers (IE7+, Firefox, Chrome, Safari, and Opera) have a built-in XMLHttpRequest object.
		
		xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{ //To handle all modern browsers, including IE5 and IE6, check if the browser supports the XMLHttpRequest object. If it does, create an XMLHttpRequest object, if not, create an ActiveXObject:
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
    }
	function getCity(stateId) {		
		var strURL="findAmount.php?state="+stateId;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('citydiv').innerHTML=req.responseText;						
					} else {
						alert("Problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
				
	}
</script>
 <link href="../css/dashboard.css" rel="stylesheet">
 
    <script src="../js/ie-emulation-modes-warning.js"></script>
    

  </head>
 <nav class="navbar navbar-inverse navbar-fixed-top">

      <div class="container-fluid">
        <div class="navbar-header">
          
<?php echo "<a class='navbar-brand' href='#'>Sam Mathew</a>";?>
        </div>
        
      </div>
    </nav>

    

        <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
            <li><a href="#" data-toggle="modal" data-target="#myModal">Search Student</a></li>
            <li><a href="frontreg.php">Add User</a></li>
            <li><a href="listing.php">Full User List</a></li>
            <li><a href="unpaid.php">Unpaid Students</a></li>
            <li><a href="../conroller/logout.php">Logout</a></li>
          </ul>
          
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title" align="center">Please Enter the Search Details</h4>
          
        </div>
        <div class="modal-body" align="center">
          <form action="searchaction.php" method="post" enctype="multipart/form-data"  style="width:100%" >
 <input type="text" name="stud_id" value="" class="form-control" placeholder="Enter Student Id"> 
<input type="text" name="firstname" value="" class="form-control" placeholder="Enter Student Name"> 
 <select name="course" class="form-control">
<option value="">Select course </option>
<option value="1">PHP Three Months </option>
<option value="2">PHP One Month </option>
<option value="3">ASP Three Month </option>
<option value="4">ASP One Month </option>
</select>
<input type='submit' name='search' value='search' class="submit">

</form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
        
<?php

       echo "<center><h2>Full Listing</h2> </center>";

echo "<div class='table-responsive'>";
echo "<center>";
           echo " <table class='table table-striped table-bordered'>";
              echo "<thead></thead>
              <tbody>";
              
             echo" <tr><th>Student Id</th>
              <th>Name</th>
              <th>Email</th>
              <th>Mobile</th>
              <th>Parent Name</th>
              <th>Parent Mobile</th>
              <th>Image</th>
              <th>Course</th>
              <th>Amount Paid</th>
              <th>Edit</th>
              <th>Add Fee</th>
              <th>Status</th>
              <th>Print</th></tr>";
			
			
              while($fet=mysql_fetch_object($res))
		{		
		$exp_date=$fet->exp_date;
			$today=date('Y-m-d');
			$d1=date_create($today);
			$d2=date_create($exp_date);
			$days=date_diff($d1,$d2);
			$values=$days->format('<br>(%a days left)');
            echo"<tr><td>".$fet->stud_id."</td>";
			echo "<td>".$fet->firstname.$values."</td>";
			echo "<td>".$fet->email."</td>";
			echo "<td>".$fet->phone."</td>";
			echo "<td>".$fet->parentname."</td>";
			echo "<td>".$fet->parentmobile."</td>";
			 $amount=$fet->amount;
			 $bamount=$fet->bamount;
			$accountpaid=$amount-$bamount;
			?>
			<td>
	<a href="../conroller/images/<?php echo $pic=$fet->pic;?>" data-lightbox='roadtrip'><img src="../conroller/images/<?php echo $pic=$fet->pic;?>" height='40px' width='50px' class="img-circle"></a></td>
			
	<?php
		 $courseid=$fet->course;
			 $sql="select name from course where id='$courseid'";
			$res11=mysql_query($sql);
			$fet11=mysql_fetch_object($res11);
			
			echo "<td>".$fet11->name."</td>";
			
			echo "<td>".$accountpaid."</td>";?>
			<div><td><a href='../conroller/edit.php?id=<?php echo $fet->stud_id;?>' >
          <span class='glyphicon glyphicon-pencil' ></span> </a></td></div>
          <?php
			
			 $bamount=$fet->bamount;
			 $payin=$fet->payin;
if( $bamount!=0 )
{
	
	?>
   <td><a href='../conroller/addfees.php?ids=<?php echo $fet->stud_id;?>'><button type="button" class="btn btn-danger btn-block">Add Fee</button></a></td>
  
 <?php

}

else
{
	?> <td> <button type="button" class="btn btn-success  btn-block">Amount paid</button></td>
    
    
     <?php
}

?>
            <td><a href="../conroller/status.php?id=<?php echo $fet->stud_id;?>"><button type='button' class="btn btn-warning btn-block"><?php echo $fet->status;?></button></a></td>
            
					<div><td><a href="../conroller/print.php?id=<?php echo $fet->stud_id;?>" >
          <span class='glyphicon glyphicon-print' ></span> </a></td></div>

        <?php
               }
               
                 ?>       	
						</div>
					</div>
                 </table>   
                 <?php 
				 $num_rec_per_page=3;
				 $condition="paidstatus='1'";
				 				 $res1=$obj->selectdatawhere('register',$condition);
 $total_records = mysql_num_rows($res1);  
 $total_pages = ceil($total_records / $num_rec_per_page); 
?>
<ul class='pagination pagination-sm' style="background-color:#10BCF0 !important">

<?php
for ($i=1; $i<=$total_pages; $i++) {
	 
            echo "<li><a href='../view/listing.php?page=".$i."'>".$i."</a></li> "; 
};

?>
        </div>
    </div>

</html>
 
      