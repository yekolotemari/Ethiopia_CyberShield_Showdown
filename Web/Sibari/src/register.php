<?php 
require "functions.php";
if(check_session()){
	header("location: /dashboard/index.php");
}
// reg();

// if (class_exists('SQLite3')) {
//     echo "SQLite3 is enabled.";
// } else {
//     echo "SQLite3 is not enabled.";
// }

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
    <h1>register</h1>
    <form action="" method="POST" accept-charset="utf-8">
	    <input type="text" name="username"  placeholder="Username" id="username" />
	    <input type="password" name="pwd" placeholder="Password" id="password" />
	    <button>Submit</button>
    	
      <?php 
        if($_SERVER["REQUEST_METHOD"] == 'POST'){
            $res = reg($_POST['username'], $_POST['pwd']);
            
            echo $res;
        }

      ?>

    </form>
</div>
<div class="lnk-a">
	<a href="login.php">login Here!</a>
</div>
</body>
</html>
