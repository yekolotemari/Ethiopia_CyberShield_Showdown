<?php 

require "../functions.php";
if(!check_session()){
	header("location: /index.php");
}

if(!($_SESSION['role']) || $$_SESSION['role'] !== "admin"){
    header("location: /index.php");

}

$user = $_SESSION["username"];
// echo 'welcome' . $_SESSION["username"];
$blogs = fetch_user_blog($_SESSION['user_id'], $_SESSION['username']);

// reset pass 
if ($_SERVER["REQUEST_METHOD"] === "POST") {
	reset_pass($_SESSION["username"], $_POST['newPass']);
	// echo $res;
}
// 

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $user ?>'s Blog</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
        }

        h1 {
            text-align: center;
        }

        .blog-entry {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
        }

        .blog-id {
            font-weight: bold;
        }

        nav {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
        }

        nav a:hover {
            background-color: #555;
            padding: 5px;
            border-radius: 5px;
        }

        h1 {
            text-align: center;
            margin-top: 50px;
        }

        /* Pop-up overlay styles */
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 9999;
        }

        .popup {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>
<body>
	<nav>
        <a href="index.php">Dashboard</a> |
        <a href="add_blog.php">Add Blog</a> |
        <a href="#" onclick="showPopup()">View Profile</a> |
        <a href="/logout.php">Logout</a>
    </nav>
    <h1><?php echo $user ?>'s Blog</h1>
    <?php
    // Assuming you have the $blogs array containing the user's blog data
    foreach ($blogs as $blog) {
        echo '<div class="blog-entry">';
        echo '<div class="blog-id">Blog ID: ' . $blog['blog_id'] . '</div>';
        echo '<div class="blog-text">' . nl2br($blog['blog_text']) . '</div>';
        echo '</div>';
    }
    ?>
    
    <div class="overlay" id="profileOverlay">
        <div class="popup">
            <h2>User Details</h2>
            <!-- Add user details here or fetch from the server using JavaScript -->
            <p>Username: <?php echo $_SESSION['username']; ?></p>
            <p>role: <?php echo $_SESSION['role'] ?? "None"; ?></p>
            <h4>flag{bb7bbbf272fccbbd93c3197e3c81bfd5}</h4>
	        <form action="" method="post">
	            <h3>Reset Password</h3>
	            <label for="newPassword">New Password:</label>
	            <input  name="username" value="<?php echo $_SESSION["username"]; ?>" hidden>
	            <input type="password" id="newPassword" name="newPass" required>
	            <input type="submit" value="Reset Password">
	            <?php if (isset($_GET['reset']) && $_GET['reset'] === 'success') {echo '<p>Password reset successful!</p>';}else if(isset($_GET['reset']) && $_GET['reset'] === 'error'){echo "error reseting password.";} ?>
	        </form>
	            
            <!-- Close button to hide the pop-up overlay -->
            <button onclick="hidePopup()">Close</button>
        </div>
    </div>


    <script>
        // JavaScript functions to show/hide the pop-up overlay
        function showPopup() {
            document.getElementById('profileOverlay').style.display = 'block';
        }

        function hidePopup() {
            document.getElementById('profileOverlay').style.display = 'none';
        }
    </script>
</body>
</html>
