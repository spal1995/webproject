<?php
include('DBcon.php');
?>
<?php
if(empty($_SESSION['login']))
	header('Location:Home.php');
$userid = $_SESSION['useid'];
$sql = "SELECT * FROM user WHERE users_id='$userid'";
$result = mysql_query($sql) or die(mysql_error());
$record = mysql_fetch_array($result) or die(mysql_error());
?>
<!DOCTYPE html>
<html>
<head>
	<title>Hello</title>
	<link rel = "stylesheet" type = "text/css" href = "style2.css" />
</head>
<body>
<div id = "wrapper">
	<div id = "header">
		<h2><center>Welcome</center></h2>
	</div>
	<div id = "headerleft">
	</div>
	<div id = "headerright">
	<ul>
		<li><a href="question.php">Read</a></li>
		<li><a href="ask.php">Ask</a></li>
		<li class="active"><a href="profile.php">My Profile</a></li>
		<li><a href="updatePRO.php">Update</a></li>
		<li><a href="destroy.php">Logout</a></li>
		</ul>
	</div>
	<div id = "center" style="background-color: #e6e6e6e;margin-top:50px">
		<?php
		$sql = "SELECT users_quesno FROM question WHERE users_id=$userid ";
		$res = mysql_query($sql) or die(mysql_error());
		$num_rows_90 = mysql_num_rows($res);
		if(!empty($num_rows_90)){
			echo "Hello"." ".$record[1]." ".$record[2]."<br />";
		?>
		<h4>Questions Asked:</h4>
		<?php
			$sql1 = "SELECT * FROM question WHERE users_id='$userid'";
			$res1 = mysql_query($sql1) ;
			$rec2= mysql_num_rows($res1);
			if($rec2>0){
				while($rec1 = mysql_fetch_array($res1)){
					echo "<strong>Your Question:</strong>"."     ";
					echo $rec1[2];	
					echo "</br>";
					echo "</br>";
					echo "<strong>Admin Answer:</strong>";
					echo "</br>";
					echo $rec1[3];
					echo "<hr>";
				}
			}
		}
        else{
			echo "<strong>You have not asked any question until date!</strong>";
		}			
		?>
	</div>
</div>
</body>
</html>
