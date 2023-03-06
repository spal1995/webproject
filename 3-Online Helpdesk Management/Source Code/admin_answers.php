<?php
include('DBcon.php');
?>

<?php
if(empty($_SESSION['login']))
	header('Location:home.php');
?>
<html>
<head>
<body>
	<div id="data" style="position:absolute;top:13%;left:85%"><a href ="destroy.php">Logout</a></div>
</body>
</head>
</html>
<?php
$sql100 = "SELECT serial_no FROM temp_questions WHERE temp_admin_answer=' '  ";
$result100 = mysql_query($sql100) or die(mysql_error());
$rws100 = mysql_fetch_array($result100);
$ot=$rws100[0];
if(!empty($ot)){
  $sql = "SELECT * FROM temp_questions WHERE serial_no=$ot  ";
  $result = mysql_query($sql) or die(mysql_error());
  $rws = mysql_fetch_array($result);
  $sl=$rws[0];
  $uid=$rws[1];
  $ques_data=$rws[2];
  $user_name=$rws[3];
?>
 
<?php
if(!empty($_REQUEST['replybtn'])){
	if(!empty($_POST['comment'])){
		$admin_answer = $_POST['comment'];
		$sql2 = "DELETE FROM temp_questions WHERE temp_users_ques='$ques_data' ";
		mysql_query($sql2) or die(mysql_error());
		$sql = "INSERT INTO question VALUES ('$uid','','$ques_data','$admin_answer','$user_name')";
		mysql_query($sql) or die(mysql_error()); 
		$ot++;
		$sql = "SELECT * FROM temp_questions WHERE serial_no=$ot  ";
		$result = mysql_query($sql) or die(mysql_error());
		$rws = mysql_fetch_array($result);
		$num_rows_90 = mysql_num_rows($result);
		$sl=$rws[0];	$uid=$rws[1];
		$ques_data=$rws[2];		$user_name=$rws[3];
    }
}
?>
<html>
<head>
<title>Admin Page</title>
	<link rel="stylesheet" type="text/css" href="style_admin.css" />
	<style>
	#admin_top{
		width: 98%;
		height:auto;
		background-color:#B7ECC5;
		border:1px solid black;
		padding-left:30px;
	}
	a{
		text-decoration:none;
		color:#8AC007;
		font-weight:bold;
		margin-left:40px;
	}
	a:hover{
		border-bottom:2px solid #8AC007;
	}
	</style>
</head>
<body>
<div class="data"><center>Admin Page</center></div></br>
<div id="admin_top">
<form method="POST" action="">
    <strong>Question Number:</strong>
    <span><?php echo $sl ?></span></br></br>
	<strong>Question:</strong>
    <span><?php echo $ques_data ?></span></br></br>
	<span style="font-weight:bold">Admin Says</span></br>
	<textarea name="comment" rows="5" cols="70" id="frmt"></textarea></br>
	<input type="submit" name="replybtn" value="Answer" class="cmnt">
</form>
<p><?php if(empty($ques_data)){
			echo"All questions have been answered";
		} ?></p>
</div>
</body>
</html> 
<?php }
else{
	echo "No new question in the database";
}
?>
