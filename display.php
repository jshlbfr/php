<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Information Display</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: whitesmoke;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: black;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-family: 'Times New Roman', Times, serif;
            color: #333;
            text-align: center;
            margin-top: 0; /* Add this to remove default margin */
        }

        h2 {
            margin-bottom: 20px;
            color: white;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }

        p {
            margin-bottom: 10px;
            color: #555;
        }

        label {
            font-weight: bold;
            color: #333;
        }

        .info {
            background-color: whitesmoke;
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
        }

        .info p {
            margin-bottom: 8px;
        }
    </style>
</head>

<body>
    <h1>STUDENT REGISTRATION FORM</h1>
    <div class="container">
        <h2>Personal Information</h2>
        <div class="info">
            <p><label>First Name: </label><?php echo $_SESSION["firstName"]; ?></p>
            <p><label>Last Name: </label><?php echo $_SESSION["lastName"]; ?></p>
            <p><label>Gender: </label><?php echo $_SESSION["gender"]; ?></p>
            <p><label>Place of Birth: </label><?php echo $_SESSION["placeOfBirth"]; ?></p>
            <p><label>Birthday: </label><?php echo $_SESSION["birthday"]; ?></p>
        </div>
        <h2>Previous School</h2>
        <div class="info">
            <p><label>Previous School: </label><?php echo $_SESSION["previousSchool"]; ?></p>
            <p><label>Year Level at Previous School: </label><?php echo $_SESSION["levelAtPreviousSchool"]; ?></p>
            <p><label>Language of Instruction: </label><?php echo $_SESSION["language"]; ?></p>
        </div>
        <h2>Medical Record</h2>
        <div class="info">
            <p><label>Medical Records: </label><?php echo $_SESSION["medical"]; ?></p>
        </div>
    </div>
</body>

</html>
