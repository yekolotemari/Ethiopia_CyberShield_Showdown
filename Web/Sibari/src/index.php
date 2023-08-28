<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amazing Blog Website</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        nav {
            background-color: #444;
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

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .blog-post {
            margin-bottom: 30px;
        }

        .blog-title {
            font-size: 24px;
            font-weight: bold;
        }

        .blog-content {
            margin-top: 10px;
        }

        .login-form, .register-form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .login-form h2, .register-form h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group input[type="submit"] {
            background-color: #333;
            color: #fff;
            cursor: pointer;
        }

        footer {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Sibari Blog Website</h1>
    </header>
    <nav>
        <a href="#">Home</a>
        <a href="#">About</a>
        <a href="#">Contact</a>
        <a href="/login.php" >Login</a>
        <a href="/register.php" >Register</a>
    </nav>
    <div class="container">
        <!-- Blog Posts -->
        <div class="blog-post">
            <div class="blog-title">Blog Post 1</div>
            <div class="blog-content">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla facilisi. Morbi at sapien eget libero fermentum aliquam. Nullam id dolor nec lectus gravida pharetra. Vestibulum sed risus ut enim venenatis tincidunt vel eu velit. Sed vitae ipsum et sem feugiat luctus. In luctus pharetra bibendum. Sed consequat velit mi, ac euismod eros eleifend vel.
            </div>
        </div>
        <div class="blog-post">
            <div class="blog-title">Blog Post 2</div>
            <div class="blog-content">
                Duis porttitor mi in mauris scelerisque scelerisque. Cras pulvinar gravida neque, quis auctor ex rhoncus eget. Vivamus suscipit velit ac interdum congue. Sed interdum massa eu metus varius dignissim. Ut tristique ipsum id enim fringilla facilisis.
            </div>
        </div>
    </div>


    <footer>
        &copy; <?php echo date('Y'); ?> Amazing Blog Website. All rights reserved.
    </footer>

</body>
</html>
