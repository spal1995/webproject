<?php
	include('DBcon.php');
?>

<?php
	if(!empty($_REQUEST['qpost'])){
		if(!empty($_POST['text'])){
		$qus = $_POST['text'];
		$usid = $_SESSION['useid'];
		$mail=$_SESSION['mail_user'];
		$quesdate = date("Y-m-d H:i:s");
		$sql = "INSERT INTO temp_questions VALUES ('','$usid','$qus','$mail','','$quesdate')";
		mysql_query($sql) or die(mysql_error());
		echo "<strong>****THANKS!!!!! We got your Enquiry. You will be provided with the best answer soon. We request you to wait until notified.****</strong>";
		echo"</br>";
		}
		else{
			echo"<strong>Error: Please post your enquiry!</strong>";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
<title>Queries</title>
	<link rel="stylesheet" type="text/css" href="style2.css" />
	<style>
		.qpost:hover {
			background-color: #4CAF50; /* Green */
			color: white;
		}
	.qpost{
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
	textarea#frmt {
		width: 600px;
		height: 120px;
		border: 3px solid #cccccc;
		padding: 5px;
		font-family: verdana;
		background-image: url(bg.gif);
		background-position: bottom right;
		background-repeat: no-repeat;
	}
	</style>
</head>
<body>
	<div id = "wrapper">
		<div id="header">
			<h4><center>WELCOME TO THE QUERY PAGE</center></h4></div>
  			<div id="headerright">
			<ul>
    			 <li><a href ="question.php"> Read</a></li>
				 <li class="active"><a href ="ask.php">Ask</a></li>
            	<li><a href ="profile.php"> My Profile</a></li>
				<li> <a href ="destroy.php">Logout</a></li>
			</ul>
		</div>
		<div id = "center">
  			<div id="level">
				<form method="POST" action="">
					<h4>Ask Us anything:</h4>
  			<textarea name="text" rows="5" cols="70" id="frmt"></textarea><br/>
  			<input type = "submit" name = "qpost" value = "Submit Question" class="qpost"/>
				</form>
			</div>
			</br>
  		</div>
  	</div>
</body>
