<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom, #9c27b0, #ffffff);
            animation: gradientAnimation 5s ease infinite;
        }

        @keyframes gradientAnimation {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        .container {
            width: 400px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background: linear-gradient(to bottom, #ffffff, #f2f2f2);
            margin: auto;
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }

        .container form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .container form label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .container form input[type="text"],
        .container form input[type="password"] {
            width: 100%;
            padding: 8px 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 20px;
            font-size: 14px;
            outline: none;
            background-color: white;
        }

        .container form input[type="text"]:focus,
        .container form input[type="password"]:focus {
            border-color: #4CAF50;
        }

        .container form input[type="submit"] {
            width: auto;
            padding: 10px 20px;
            margin-top: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .container form a {
            margin-top: 10px;
            color: #007bff;
            text-decoration: none;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="gdec.png" alt="Logo">
        </div>
        <h2>Login</h2>
        <?php
        if (isset($_SESSION['message'])) {
            echo "<div>" . $_SESSION['message'] . "</div>";
            unset($_SESSION['message']);
        }
        ?>
        <form method="post" action="login.php">
            <label>Email:</label>
            <input type="text" name="email" required><br>

            <label>Password:</label>
            <input type="password" name="password" required><br>

            <input type="submit" name="login" value="Login">
        </form>
        <a name="" id="" class="btn btn-primary" href="register.php" role="button">Signup</a>
    </div>
</body>
</html
