<?php 

    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Session.php');
	Session::init();
	//Session::checkUserSession();
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
	spl_autoload_register(function($class){
    include_once "classes/".$class.".php";
     });
	$usr=new User();
	$ques=new Question();
	$db=new Database();
	$fm=new Format();
	$pro=new Process();

	
	

?>







<?php
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header("Cache-Control: pre-check=0, post-check=0, max-age=0"); 
header("Pragma: no-cache"); 
header("Expires: Mon, 6 Dec 1977 00:00:00 GMT"); 
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
?>
<!doctype html>
<html>
<head>
	<title>Online Exam System</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="no-cache">
	<meta http-equiv="Expires" content="-1">
	<meta http-equiv="Cache-Control" content="no-cache">
	<link rel="stylesheet" href="css/main.css">
	<script src="js/jquery.js"></script>
	<script src="js/main.js"></script>
</head>
<body>

<div class="phpcoding">
	<section class="headeroption"></section>

	   <?php 
           if (isset($_GET['action'])&&$_GET['action']=='logout') {
              Session::destroy();
              header("Location:index.php");
              exit();
         
           }


	 ?>
		<section class="maincontent">
		<div class="menu">
		<ul>
	        <?php 
               $login=Session::get('userlogin');
                if($login==true){
	        ?>
            <li><a href="profile.php">Profile</a></li>
			<li><a href="exam.php">Exam</a></li>
            <li><a href="?action=logout">Logout</a></li>
             <?php }  else{ ?>
		
			<li><a href="index.php">Login</a></li>
			
			<li><a href="register.php">Register</a></li>
			<?php } ?>
		</ul>
		</div>
	