<?php 

	require 'functions.php';
	if(check_session()){
		header("location: /dashboard/index.php");
	}

?>
<!DOCTYPE html>

<html> 
<head>
	<title>Login to the blog</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<style type="text/css">
		.lnk-a a {
			margin-left: 45%;
			text-decoration:none;
		}
	</style>
</head>
	
<body>
<div class="logo"></div>
<div class="login-block">
	<h1>Login to sibari blog</h1>
	<form action="" method="POST" accept-charset="utf-8">
	    <input type="text" name="username"  placeholder="Username" id="username" />
	    <input type="password" name="password" placeholder="Password" id="password" />
	    <button>Submit</button>
	    <div class="err">
	    	<?php
	    		if($_SERVER["REQUEST_METHOD"] == "POST"){
					$usr = $_POST['username'];
					$pwd = $_POST['password'];
					$ans = login($usr, $pwd);
					echo "<code style='color:red; margin-left:50px;'>$ans</code>";
					// echo $ans;
					// echo $ans[3];
				}
			?>
	    </div>
    	
    </form>
    </div>
    <div class="lnk-a">
    	<a href="register.php">Register Here!</a>
	</div>
</body>
</html>