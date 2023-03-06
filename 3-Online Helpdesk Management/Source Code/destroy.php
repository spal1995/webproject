<?php
include('DBcon.php');
session_destroy();
setcookie('PHPSESSID','',time()-3600);
setcookie('uname','',time()-3600);
setcookie('pwd','',time()-3600);
header('Location:home.php');
