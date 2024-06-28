<?php
session_start();

$conn = new mysqli('localhost', 'root', '', 'dbregistration');

if ($conn->connect_error) {
    die('Connection Failed : ' . $conn->connect_error);
}

if (!isset($_SESSION['username'])) {
    header("Location: DBlogin.php");
    exit;
}

$username = $_SESSION['username'];

$info = $conn->prepare("SELECT birthday, email, contact, password FROM DBregistration WHERE username = ?");
$info->bind_param("s", $username);
$info->execute();
$result = $info->get_result();
$user = $result->fetch_assoc();

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['updatepassword'])) {
    $currentpassword = $_POST['currentpassword'];
    $newpassword = $_POST['newpassword'];
    $confirm = $_POST['confirm'];

    if ($currentpassword !== $user['password']) {
        $message = "Invalid current password.";
    } elseif ($newpassword !== $confirm) {
        $message = "Error : New password and confirm new password mismatch.";
    } else {
        $updatepassword = $conn->prepare("UPDATE dbregistration SET password = ? WHERE username = ?");
        $updatepassword->bind_param("ss", $newpassword, $username);
        if ($updatepassword->execute()) {
            $message = "Password updated successfully!";
        } else {
            $message = "Password update fail.";
        }
    }
}

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: DBlogin.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TA3_B3 - user info</title>

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
        <h1>User Information Form</h1>
        <div class="divider"></div>
        <h1>Welcome, <?php echo htmlspecialchars($username); ?>!</h1>
        <div class="divider"></div>
        <p>Birthday: <?php echo htmlspecialchars($user['birthday']); ?></p>
        <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
        <p>Contact Number: <?php echo htmlspecialchars($user['contact']); ?></p>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" autocomplete="off">
            <div class="divider"></div>
            <label for="currentpassword">Current Password:</label>
            <input type="password" id="currentpassword" name="currentpassword" required><br><br>
            <label for="newpassword">New Password:</label>
            <input type="password" id="newpassword" name="newpassword" required><br><br>
            <label for="confirm">Confirm New Password:</label>
            <input type="password" id="confirm" name="confirm" required><br><br>
            <input type="submit" name="updatepassword" value="Update Password">
        </form>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <input type="submit" name="logout" value="Log Out">
        </form>
        <div class="message">
            <?php if (!empty($message)) echo "<p>$message</p>"; ?>
        </div>
    </div>
</body>

</html>