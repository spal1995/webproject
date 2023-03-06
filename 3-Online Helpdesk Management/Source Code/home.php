<?php
include('DBcon.php');
?>
<?php
if(!empty($_REQUEST['subBtn'])){
	$firstname = $_POST['fname'];
	$lastname = $_POST['lname'];
	$email = $_POST['mail'];
	$passw = $_POST['pwd'];
	$otp = $firstname.rand(1,100).$email;
	if(empty($firstname) || empty($lastname) || empty($email) || empty($passw))
	{	echo '<script language="javascript">';
		echo 'alert("Important fields are missing")';
		echo '</script>';
	}
	else{
		$sql = "INSERT INTO tmpusers VALUES ('','$firstname','$lastname','$email','$passw','$otp')";
		mysql_query($sql) or die(mysql_error());  
		$sqlotp = "SELECT tmpusers_email FROM tmpusers WHERE tmpusers_otp='$otp'";
		$resultotp = mysql_query($sqlotp) or die(mysql_error());
		$rwsotp = mysql_fetch_array($resultotp);
		$_SESSION['mail'] = $rwsotp[0];
		header('Location:RegOTP.php');
	}
}
?>
<?php
		if(!empty($_REQUEST['subBtnL'])|| (!empty($_COOKIE['uname']) && !empty($_COOKIE['pwd']))){ 
			$username = $_REQUEST['uname'];
			$userpwd = $_REQUEST['pwd'];
			if(!empty($_REQUEST['rem']) && $_REQUEST['rem']==1){
				setcookie('uname',$username,time()+3600);
				setcookie('pwd',$userpwd,time()+3600);
			}
			if(!empty($_COOKIE['uname']) && !empty($_COOKIE['pwd'])){
				$username = $_COOKIE['uname'];
				$userpwd = $_COOKIE['pwd'];
			}
			$sql = "SELECT * FROM user WHERE users_email='$username' AND users_pass='$userpwd' ";
			$result = mysql_query($sql) or die(mysql_error());
			$rws = mysql_fetch_array($result);
			if(empty($username) || empty($userpwd))
			{	echo '<script language="javascript">';
				echo 'alert("Important fields are missing")';
				echo '</script>';
			} else{
				if($rws[3]==$username && $rws[4]==$userpwd)
				{
					$_SESSION['login']=1;
					$_SESSION['useid']=$rws[0];
					$_SESSION['mail_user']=$username;
					header('Location:question.php');
				}
				elseif($username=="admin@helpme.org" && $userpwd=="helpme"){
					$_SESSION['login']=1;
					header('Location:admin_answers.php');
				}
				else
				{
					echo '<script language="javascript">';
					echo 'alert("PASSWORD MISMATCH !! TRY AGAIN")';
					echo '</script>';
				}
			}
		}
	?>


<!DOCTYPE html>
<html>
	<head>
		<title>Home Page</title>
		<link rel="stylesheet" type="text/css" href="LogIn.css"/>
	</head>
	<body>
	<p id="head">Infinity 2.0</p>
	<span id="subhead">the spirit of service and help</span>
	<div id="wrapper">
		<div id="content1" align="center">
			<div class="admin-frm-container">							
				<p class="text">Create Account</p>
				<form method="POST"  action = "">
					<input type="text" name="fname" placeholder="First Name" class="form-control"/>
					<br>
					<input type="text" name="lname" placeholder="Last Name" class="form-control"/>
					<br>
					<input type="email" name="mail" placeholder="Email ID(Username)" class="form-control"/></td>
					<br>
					<input type="password" name="pwd" placeholder="Password" class="form-control"/></td>
					<br>
					<div>
						<input type="submit" name='subBtn' value="Join" class="joinbtn"/></td>
					</div>
				</form>	
			</div>
		</div>
		<div id="content2" align="center">
			<div class="admin-frm-container" align="center">							
				<p class="text">User Login</p>
				<form method="POST" action="">
					<input type="email" name="uname" placeholder="Username" class="form-control">
					<br>
					<input type="password" name="pwd" placeholder="Password" class="form-control">
					<br>
					<div>
						<input type="submit" name="subBtnL" value="Log In" class="logbtn">
					</div><br>
					<p class="rem"><input type="checkbox" name="rem" value="1"> Remember Me<p>
				</form>	
			</div>
		</div>
	</div>
	</body>
</html>
