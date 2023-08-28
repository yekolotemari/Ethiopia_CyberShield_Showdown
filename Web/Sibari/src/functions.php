<?php
	require 'config.php';

	function sanitize($anything){
		$anything = htmlspecialchars(trim(stripslashes($anything)));
		

		return $anything;

	}

	function connect(){
		$databaseFile = 'all.db';

		$db = new SQLite3($databaseFile);

		if (!$db) {
		    return "Error connecting to the database.";
			$db->close();
		}

	}


	function reg($username, $password){
		$db = new PDO("sqlite:all.db");
		$usern = sanitize($username);
		$passwd = sanitize($password);
		$role = "user";



		// check if a user exists
		$q = "SELECT * FROM users WHERE username = :username";
		$s = $db->prepare($q);
		$s->bindValue(":username", $usern);
		$s->execute();
		$count = $s->fetchColumn();

		if($count > 0){
			return "User Exists";
		}


		$query = "INSERT INTO users (username, password, role) VALUES (:username,:password, :role)";
		$stmt = $db->prepare($query);

		
		$hashedPassword = password_hash($passwd, PASSWORD_BCRYPT);
		// $blogText = 'this is my blog';

		// Bind the parameters to the prepared statement
		$stmt->bindValue(':username', $usern);
		$stmt->bindValue(':password', $hashedPassword);
		$stmt->bindValue(':role', $role);

		// $stmt->bindValue(':blogs', $blogText, PDO:PARAM_STR);

		// Execute the prepared statement
		$result = $stmt->execute();

		if (!$result) {

		    return "Error inserting data: " . $db->lastErrorMsg();
        }else {
          return "Successfully Registered";
        }
	}

	function login($username, $password){
		$db = new PDO("sqlite:all.db");

		$query = "SELECT * FROM users WHERE username =:username";
		$stmt = $db->prepare($query);
		
		// $username = $username;
		// $password = password_hash($password, PASSWORD_BCRYPT);
		echo $password;
		
		$stmt->bindValue(":username", $username);
		$res = $stmt->execute();
		$result = $stmt->fetch();
		// echo $result[2];
		if(!$result){
			return "Invalid Username or Password";
			exit();
		}
		if (password_verify($password, $result["password"]) === FALSE){
			return "Invalid Password";

		}else{

			$_SESSION['username']  = $result['username'];
			$_SESSION['user_id']  = $result['user_id'];
			$_SESSION['role']  = $result['role'];
			if($_SESSION['role'] === 'admins'){
				header("location: dashboard/adashboard.php");

			}
			header("location: dashboard/index.php");
			exit();

		}

		// if($result)

	}

	function fetch_user_blog($userid, $username){
	    $db = new PDO("sqlite:../all.db");
	    $query = "SELECT blogs.blog_id, blogs.blog_text 
	              FROM blogs
	              INNER JOIN users ON blogs.user_id = users.user_id
	              WHERE users.username = :username";

	    $stmt = $db->prepare($query);
	    $stmt->bindValue(':username', $username);
	    $stmt->execute();
	    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

	    // Check if the user has any blogs
	    if (count($result) > 0) {
	    	return $result;
	        // echo "Blogs for user: " . $username . "\n";

	        // foreach ($result as $row) {
	        //     echo "Blog ID: " . $row['blog_id'] . "\n";
	        //     echo "Blog Text: " . $row['blog_text'] . "\n";
	        //     echo "\n";
	        //}
	    } else {
	        return "No blogs found for user: ";// . $username;
	    }
	}


	function add_blog($user_id, $blogText) {
	    $db = new PDO("sqlite:../all.db");
	    $query = "INSERT INTO blogs (user_id, blog_text) VALUES (:user_id, :blog_text)";
	    $stmt = $db->prepare($query);
	    $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
	    $stmt->bindValue(':blog_text', $blogText, PDO::PARAM_STR);
	    $result = $stmt->execute();

	    if ($result) {
	        echo "Blog entry added successfully.";
	    } else {
	        echo "Error adding blog entry: " . $stmt->errorInfo()[2];
	    }

	}

	function user_detail($user_id){

		$db = new PDO("sqlite:../all.db");

	    $query = "select * from users where user_id=:user_id";
	    $stmt = $db->prepare($query);
	    $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
	    $result = $stmt->execute();

	    return $result;
	}

	function reset_pass($username, $password){
		$db = new PDO("sqlite:../all.db");
		$query = "SELECT * FROM users WHERE username =:username";
		$stmt = $db->prepare($query);

		// $username = $username;
		// $password = password_hash($password, PASSWORD_BCRYPT);
		// echo $password;

		$stmt->bindValue(":username", $username);
		$res = $stmt->execute();
		$result = $stmt->fetch();


		if(!$result || $result["role"] === 'admin'){
			header("Location: index.php?reset=error");
			exit();

		}

		$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

		$query = "UPDATE users SET password = :password WHERE username = :username";
		$stmt = $db->prepare($query);
		$stmt->bindValue(":password", $hashedPassword);
		$stmt->bindValue(":username", $username);

		if ($stmt->execute()) {
			header("Location: index.php?reset=success");
			exit();
		// return "Password reset successful.";
		} else {
			header("Location: index.php?reset=error");
			exit();
		// return "Error resetting password: " ;//. print_r($db->errorInfo(), true);
		}

		}



	function check_session(){
		if(!isset($_SESSION['user_id'])){
			return FALSE;

		}else{
			return TRUE;
		}
	}
