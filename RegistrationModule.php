<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TA3_A1 - Personal Information</title>

    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            color: #fff;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            margin-left: 30px;
        }

        .form-container {
            margin: auto;
            background-color: #363D46;
            width: 500px;
            padding: 20px;
            border-radius: 20px;
        }

        h1 {
            font-size: 30px;
            margin-top: 5px;
            text-align: center;
        }

        h2 {
            margin-left: 5px;
            font-size: 20px;
        }

        h2 {
            font-size: 20px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            margin-left: 7px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            display: inline-block;
            width: 30%;
            margin: 0 auto;
            margin-top: 20px;
            margin-bottom: 20px;
            margin-left: 40%;
            background-color: #ccc;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #8F9DAF;
        }

        .divider {
            width: 100%;
            margin-top: 20px;
            border-top: 1px solid #ccc;
        }

        .success-message {
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h1>My Personal Information</h1>
        <div class="divider"></div>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <h2>First Name </h2><input type="text" name="fname"><br>
            <h2>Middle Name </h2><input type="text" name="mname"><br>
            <h2>Last Name </h2><input type="text" name="lname"><br>
            <h2>Username </h2><input type="text" name="username"><br>
            <h2>Password </h2><input type="text" name="password"><br>
            <h2>Confirm Password </h2><input type="text" name="confirmpass"><br>
            <h2>Birthday </h2><input type="text" name="birthday"><br>
            <h2>Email </h2><input type="text" name="email"><br>
            <h2>Contact Number </h2><input type="text" name="contact"><br>
            <input type="submit" name="action" value="Submit">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST['action']) && $_POST['action'] == 'Submit') {
                    $fname = $_POST['fname'];
                    $mname = $_POST['mname'];
                    $lname = $_POST['lname'];
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $birthday = $_POST['birthday'];
                    $email = $_POST['email'];
                    $contact = $_POST['contact'];
                }
                if ($_POST["password"] === $_POST["confirmpass"]) {
                    echo "
                    <h3>Submitted Information:</h3>
                    <p>Full Name: $fname $mname $lname</p>
                    <p>Username: $username</p>
                    <p>Birthday: $birthday</p>
                    <p>Email: $email</p>
                    <p>Contact Number: $contact</p> ";
                } else {
                    echo "<br>Error : Password and confirm password are not the same.";
                }
            }
            ?>
        </form>

    </div>
</body>

</html>
