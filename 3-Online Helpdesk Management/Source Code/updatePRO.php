<?php
include('DBcon.php');
?>
<?php
$userid = $_SESSION['useid'];
if(isset($_REQUEST['updt']))
{
	$firstname = $_POST['fname'];
	$lastname = $_POST['lname'];
	$sql = "UPDATE user SET users_fname ='$firstname',users_lname='$lastname' WHERE users_id = '$userid'";
	mysql_query($sql) or die(mysql_error());
	echo "<strong>Your Profile is Updated</strong>";
}
$sql1 = "SELECT * FROM user WHERE users_id='$userid'";
$result = mysql_query($sql1) or die(mysql_error());
$record = mysql_fetch_array($result) or die(mysql_error());

/*if(!empty($_REQUEST['uploadFile'])){
	$filePath = "img/".$_FILES['ufile']['name'];
	move_uploaded_file($_FILES['ufile']['tmp_name'], $filePath);
	$sql ="UPDATE users SET user_dp ='$filePath' WHERE users_sl = '$userid'";
	mysql_query($sql) or die(mysql_error());
}*/
?>
<!DOCTYPE html>
<html>
<head>
	<title>UPDATE Data</title>
		<link rel="stylesheet" type="text/css" href="style_admin.css" />
		<style>
		.cmnt{
			color: black;
			background-color: white;
			display: inline-block;
			padding: 6px 12px;
			margin-bottom: 0;
			font-size: 12px;
			font-weight: 400;
			line-height: 1.42857143;
			text-align: center;
			white-space: nowrap;
			vertical-align: middle;
			border: 1px solid ;
			border-color: gray;
			border-radius: 4px;
			cursor: pointer;
			-webkit-transition-duration: 0.4s; /* Safari */
			transition-duration: 0.4s;
		}
		.cmnt:hover {
			background-color: #4CAF50; /* Green */
			color: white;
		}
		a{
			font-size:15px;
			font-weight:bold;
			text-decoration:none;
			display:inline-block;
			color:#2d403e;
			padding:10px 0px 0px 40px;
		}
		a:hover,
		.active{
			color:#8AC007;
		}
		</style>
</head>
<body>
<div class="data"></div>
	<a href="updatePRO.php" class="active">Update</a>
	<a href="profile.php">My Profile</a>
	<a href="destroy.php">Log Out</a>
	<form method = "POST">
		<table id="header">
		<tr>
			<td>User ID is:<?php echo $_SESSION['useid']  ?></td>
  		</tr>
		<tr>
			<td>First Name:
			<input type="text" name="fname" value=<?php echo $record[1];?> class="move" /></td>
  		</tr>
		<tr >
			<td>Last Name:
			<input type="text" name="lname" value=<?php echo $record[2];?> class="move" /></td>
  		</tr>
  		<tr>
  			<td style="padding-left:130px"><input type="submit" name='updt' value="UPDATE" class="cmnt"/></td>
  		</tr>
		</table>
	</form>
</body>
</html>
