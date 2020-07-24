<html>
<head>
<title>
	Diary entry
</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

</head>
<nav class="navbar navbar-inverse bg-danger">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand text-dark font-weight-bolder" href="day schedule.html">Diary Entry  <span class="glyphicon glyphicon-book"></span></a>
			</div>
			<button class=" navbar-btn navbar-right btn btn-white disabled" id="myentries" onclick="location.href='myentries.php'" type="button" >
				My Entries <span class="glyphicon glyphicon-th-list"></span>
			</button>
			<button class=" navbar-btn navbar-right btn btn-dark " id="print" onclick="printentry()" type="button" ><span class="glyphicon glyphicon-print"></span>
				Print
			</button>
		</div>
	</nav>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "diaryentry";



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql="select dat,entry from entries";
$result=$conn->query($sql);
$display_string="";
if($result->num_rows>0){
	while($row=$result->fetch_assoc())
	{
        
$display_string.='<div class=" container bg-dark text-white">';
		$display_string.= $row["dat"];
		$display_string.='<div class=" jumbotron bg-dark">';
		$display_string.=$row["entry"];
		$display_string.="</div>";
		$display_string.='</div>';
		
		
	}
}
	else
	{
		$display_string.= "No entries yet!";
	}
	echo $display_string;
	$conn->close();

?></html>