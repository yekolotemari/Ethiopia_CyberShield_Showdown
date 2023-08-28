<?php

    // session_start();
    require "../functions.php";
    // Check if the user is logged in
    if (!isset($_SESSION['user_id'])) {
        header("Location: /login.php");
        exit();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validate and sanitize the blog text
        $blogText = filter_input(INPUT_POST, 'blog_text', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        // Check if the blog text is not empty
        if (empty($blogText)) {
            echo "Blog text cannot be empty.";
        } else {
            // Insert the new blog entry into the database
            add_blog($_SESSION['user_id'], $blogText);

            // Redirect to the dashboard or display a success message
            header("Location: /dashboard/index.php");
            exit();
        }
    }


    


?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Add New Blog</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
        }

        h1 {
            text-align: center;
        }

        form {
            width: 50%;
            margin: 0 auto;
            border: 1px solid #ccc;
            padding: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"], textarea {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        textarea {
            height: 100px;
        }

        input[type="submit"] {
            display: block;
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Add New Blog</h1>

    <form action="add_blog.php" method="post">
        <label for="blog_text">Blog Text:</label>
        <textarea id="blog_text" name="blog_text" required></textarea>

        <input type="submit" value="Add Blog">
    </form>
</body>
</html>
