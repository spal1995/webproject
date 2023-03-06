<?php
include('DBcon.php');
?>
<?php
if(isset($_REQUEST['sbmtOTP'])){
	$check = $_POST['txtOTP'];
	$umail=$_SESSION['mail'];
	$sqlotp = "SELECT tmpusers_otp FROM tmpusers WHERE tmpusers_email='$umail'";
	$result = mysql_query($sqlotp) or die(mysql_error());
    $rws = mysql_fetch_array($result);
    $otpid = $rws[0];
    if ($otpid==$check){
     	$sql = "SELECT * FROM tmpusers WHERE tmpusers_otp='$check'";
     	$result = mysql_query($sql) or die(mysql_error());
     	$rws = mysql_fetch_array($result);
     	$tmpusers_id=$rws[0];
     	$tmpusers_fname=$rws[1];
     	$tmpusers_lname=$rws[2];
     	$tmpusers_email=$rws[3];
     	$tmpusers_pwd=$rws[4];
		
		$sql2 = "DELETE FROM tmpusers WHERE tmpusers_email='$umail' ";
		mysql_query($sql2) or die(mysql_error());
		
     	$sql1 = "INSERT INTO user VALUES (' ','$tmpusers_fname','$tmpusers_lname','$tmpusers_email','$tmpusers_pwd')";
		mysql_query($sql1) or die(mysql_error());
		$sqlotp = "SELECT * FROM user WHERE users_email='$umail'";
	    $resultotp = mysql_query($sqlotp) or die(mysql_error());
        $rwsotp = mysql_fetch_array($resultotp);
		$num_rows_90 = mysql_num_rows($resultotp);
		if(!empty($num_rows_90)){
		    $_SESSION['login']=1;
			$useid=$rwsotp[0];
			$_SESSION['useid']=$useid;
			$_SESSION['mail_user']=$umail;
			header('Location:question.php');
		}
    }
	else{
		 echo "<strong> ERROR: Please enter the Authentication Code Correctly</strong>";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration Confirmation</title>
</head>
<body>
<div style="height:50%;width:50%;margin:100px;border:1px solid #e4e4e4;padding:30px">
	<form method="POST">
		<p>ENTER THE AUTHENTICATION CODE:</p>
		<input type="text" name="txtOTP">
		<input type="submit" name="sbmtOTP">
	</form>
	<?php
	$umail=$_SESSION['mail'];
	$sqlotp = "SELECT tmpusers_otp FROM tmpusers WHERE tmpusers_email='$umail'";
	$result = mysql_query($sqlotp) or die(mysql_error());
	$rws = mysql_fetch_array($result);
	$otpid = $rws[0];
	echo "</br><strong>Your Authentication Code: </strong>";
	echo $otpid;
	?>
</div>
</body>
</html>
