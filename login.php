<?php
session_start();

$static_username = "admin";
$static_password = "123";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $static_username && $password === $static_password) {
        $_SESSION['username'] = $username;

        header("Location: homepage.php");
        exit;
    } else {
        $login_error = "Error : Invalid username or password.";
    }
}

if (isset($_POST['remember'])) {

    setcookie('username', $username, time() + (86400 * 30), "/");
    setcookie('password', $password, time() + (86400 * 30), "/");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TA3_A3 - Login</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            color: #fff;
        }

        .form-container {
            margin: auto;
            background-color: #363D46;
            width: 400px;
            padding: 20px;
            border-radius: 20px;
            margin-top: 50px;
        }

        h1 {
            font-size: 30px;
            margin-top: 0;
            text-align: center;
            color: #fff;
        }

        label {
            color: #fff;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="checkbox"] {
            margin-top: 5px;
        }

        input[type="submit"] {
            display: block;
            width: 20%;
            margin: 0 auto;
            background-color: #8F9DAF;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #ccc;
        }

        .message {
            text-align: center;
            margin-top: 10px;
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h1>Login</h1>
        <form action="" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username"><br><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password"><br><br>

            <input type="checkbox" id="remember" name="remember">
            <label for="remember">Remember me</label><br><br>

            <input type="submit" value="Login">
        </form>
        <?php
        if (isset($login_error)) {
            echo '<div class="message">' . $login_error . '</div>';
        }
        ?>
    </div>
</body>

</html>