<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TA3_A3 - Home</title>
    <style>
        h1 {
            font-size: 30px;
            margin-top: 0;
            text-align: center;
            color: black;
        }

        input[type="submit"] {
            display: block;
            width: 10%;
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

        a {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <h1>Welcome, <?php echo $username; ?>!</h1>

    <a href="logout.php">
        <input type="submit" value="Logout">
    </a>
</body>

</html>