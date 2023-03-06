<?php
include('DBcon.php');
?>

<?php
if(empty($_SESSION['login'])){
	header('Location:home.php');
}
$userid = $_SESSION['useid'];
$mail=$_SESSION['mail_user'];
$sql = "SELECT * FROM user WHERE users_id='$userid'";
$result = mysql_query($sql) or die(mysql_error());
$record = mysql_fetch_array($result) or die(mysql_error());
$total_rows = mysql_num_rows($result);
?>

<?php
$sql = "SELECT * FROM question ORDER BY users_quesno DESC";
  $result = mysql_query($sql) or die(mysql_error());
  $rws = mysql_fetch_array($result);
    $qno=$rws[1];
  	$ques_data=$rws[2];
    $ans_data=$rws[3];
	$user_nam=$rws[4];
  ?>
  
<html>
<head>
	<title>Questions</title>
	<link rel="stylesheet" type="text/css" href="style1.css" />
	<style>
	strong{
		margin:3px;
		color:grey;
		font-weight:bold
	}
	textarea{
		margin:0px 0px 10px 20px;
	}
	input[type=submit] {
	margin-left:20px;
	}
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
	}
	.cmnt:hover {
		background-color: #4CAF50; /* Green */
		color: white;
	}
	</style>
</head>
<body>
<div id="wrapper">
	<div class="data"></div>
		<nav>
			<ul class="top_nav">
				<li class="active"><a href="question.php" class="done">Read  </a></li>
				<li><a href="ask.php" class="done">Ask</a></li>
				<li><a href="profile.php" class="done">My Profile</a></li>
				<li><a href="destroy.php" class="done" style="margin-left:40px" class="done">Logout</a></li>
			</ul>
		</nav>
		<div style="height:auto;width:55%;background-color:#B7ECC5;float:right">
		<?php if(!empty($total_rows)){ 
			while(!empty($qno)){ ?>
				<div style="height:auto;width:88%;background-color:white;margin:35px;padding:20px">
				<span style="font-weight:bold;font-size:20px;padding-top:20px"><?php echo $ques_data ?></span></br>
				<span style="font-size:15px">by <?php echo $user_nam ?> </span></br></br>
				<span style="text-decoration:underline;color:grey;font-weight:bold">Answer</span>
				<p><?php echo $ans_data ?></p>
				<div style="height:auto%;width:85%;background-color:#E8F1EC;color:#6B7770;margin:20px;padding-left:15px">
				<?php
				$sql5 = "SELECT * FROM comments WHERE users_quesno='$qno' ORDER BY postdate ASC";
				$result5 = mysql_query($sql5) or die(mysql_error());
				$num_rows = mysql_num_rows($result5);
				if($num_rows>0){
					echo "<strong>User replies:</strong>";
		
		echo"</br>";
		echo"</br>";
		while($rws5 = mysql_fetch_array($result5)){
			echo"by"." ";
			echo $rws5[1]." ";
             echo"dated on"." ";			
			echo $rws5[4];
			echo "</br>";
			echo "</br>";
	        echo $rws5[3];
		    echo "<hr>";
					}
				}
				?>
				</div>
				<form method="POST" action=""> 
				<textarea name="comment" rows="5" cols="70" id="frmt"></textarea></br>
				<input type="submit" name="<?php echo $qno ?>" value="Your Say" class="cmnt">
				<?php
				if(!empty($_POST[$qno])){
					$usercomment = $_POST['comment'];
					$date = date("Y-m-d H:i:s");
					$sqlotp = "SELECT users_quesno FROM question WHERE users_ques='$ques_data'";
					$resultotp = mysql_query($sqlotp) or die(mysql_error());
					$rwsotp = mysql_fetch_array($resultotp);
					if($rwsotp[0]==$qno){
	$sqlquery = "INSERT INTO comments VALUES ('$userid','$mail','$qno','$usercomment','$date')";
						mysql_query($sqlquery) or die(mysql_error()); 
					}
				} 
				?>
				</form>
				</div> 
				<?php 
				$qno--;
				$sql = "SELECT * FROM question WHERE users_quesno=$qno ";
				$result = mysql_query($sql) or die(mysql_error());
				$rws = mysql_fetch_array($result);
				$ques_data=$rws[2];
				$ans_data=$rws[3];
				$user_nam=$rws[4];
			}
		}
		else{
			echo "<strong>Congratulations! You are Our First User.</strong>";
		}
				?>
		</div> 
		<div class="side_nav" style="height:auto;width:17%;background-color:white;float:left">
			<table class="shout" >
			<thead>
<div style="width:auto;height:40px;margin:30px 0px 0px 10px;font-weight:bold">Profile Name: <span style="color:#8AC007"><?php echo $record[1]." ".$record[2]?></span></div>
				<tr>
				<th>Top Stories</th>
				</tr>
			</thead>
			<tbody>
				<tr>
				<td><a href="#" class="ok">Politics</a></td>
				</tr>
				<tr>
				<td ><a href="#" class="ok">Entertainment</a></td>
				</tr>
				<tr>
				<td><a href="#" class="ok">Sports</a></td>
				</tr>
				<tr>
				<td><a href="#" class="ok">Others</a></td>
				</tr>
			</tbody>
			</table>
	
		</div>
</div>
</div>
</body>
</html>
