<?php
session_start();

$conn = new mysqli('localhost', 'root', '', 'dbregistration');

if ($conn->connect_error) {
    die('Connection Failed : ' . $conn->connect_error);
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submitted'])) {
    $username = $conn->real_escape_string($_POST["username"]);
    $password = $conn->real_escape_string($_POST["password"]);

    if (!empty($username) && !empty($password)) {
        $stmt = $conn->prepare("SELECT * FROM dbregistration WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $_SESSION['username'] = $username;
            header("Location: DBuserinfo.php");
            exit;
        } else {
            $message = "Error : Username or password mismatch";
        }
        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TA3_B2 - Login</title>
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
            display: block;
            margin-bottom: 5px;
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

        input[type="submit"] {
            display: block;
            width: 30%;
            margin: 0 auto;
            margin-bottom: 10px;
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

        .divider {
            width: 100%;
            margin-top: 20px;
            margin-bottom: 20px;
            border-top: 1px solid #ccc;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" autocomplete="off">
            <h1>Login Form</h1>
            <div class="divider"></div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>
            <input type="hidden" name="submitted" value="1">
            <input type="submit" value="Submit">
        </form>
        <div class="message">
            <?php if (!empty($message)) echo "<p>$message</p>"; ?>
        </div>
    </div>
</body>

</html>