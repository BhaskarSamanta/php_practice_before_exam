<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <style>
        .form {
            margin-top:15vh;
            background: #3887BE;
            width: 30%;
            padding: 10px;
            border-radius: 15px;
        }

        input[type=text],
        [type=password],
        [type=email],
        [type=tel] {
            width: 95%;
            margin-bottom: 20px;
            padding: 10px;
            border: none;
            border-radius: 10px;
        }

        input[type=submit] {
            width: 40%;
            margin-bottom: 20px;
            margin-left: 5px;
            margin-right: 5px;
            padding: 8px;
            border: none;
            border-radius: 10px;
            font-weight: bold;
            font-size: 20px;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        body {
            background: #FFF78A;
            font-family: 'Inter', sans-serif;
        }
    </style>
    <div class="container">
        <div class="form">
            <form action="#" method="POST">
                <feildset>
                    <legend align="center">
                        <font size="6" color="yellow">Record Insert</font>
                    </legend>
                    <label for="userName">
                    <font size="4" color="yellow"><b>Name:</b></font><input type="text" id="userName" name="user" placeholder="please enter your name">
                    </label>
                    <br>
                    <label for="city">
                    <font size="4" color="yellow"><b>City:</b></font><input type="text" id="city" name="city" placeholder="please enter your id">
                    </label>
                    <br>
                    <label for="phno">
                    <font size="4" color="yellow"><b>Phone Number:</b></font> <input type="tel" id="phn" name="phno" placeholder="please enter your phone no">
                    </label>
                    <br>
                    <label for="email">
                    <font size="4" color="yellow"><b>Email:</b></font><input type="email" id="mail" name="email" placeholder="please enter your email id">
                    </label>
                    <br>
                    <label for="pass">
                    <font size="4" color="yellow"><b>Password:</b></font> <input type="password" id="pass" name="pass" placeholder="please enter your password">
                    </label>
                    <br>
                    <center><input type="submit" value="Insert"></center>
                </feildset>
            </form>
        </div>
    </div>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        # code...
        $name = $_POST['user'];
        $city_name = $_POST['city'];
        $phone = $_POST['phno'];
        $mail_id = $_POST['email'];
        $user_pass = $_POST['pass'];

        $serverName = "127.0.0.1:3308";
        $userName = "myadmin";
        $password = "ritwika_123";
        $dbname = "user_record";

        $conn = mysqli_connect($serverName, $userName, $password, $dbname);
        if (!$conn) {
            die("Connection failed:" . mysqli_connect_error());
        } else {
            //1. code for database creation-----> $sql = "CREATE DATABASE user_record";
            //2. code for table creation----->  $sql = "CREATE TABLE pesron(
            //      userName varchar(20),
            //      City varchar(20),
            //      Phone_no int(10),
            //      Email varchar(10),
            //      userPassword varchar(10)
            // )";


            // Validate email and phone number uniqueness
            $check_email = "SELECT Email FROM pesron WHERE Email = '$mail_id'";
            $check_phone = "SELECT Phone_no FROM pesron WHERE Phone_no = '$phone'";
            
            $email_result = mysqli_query($conn, $check_email);
            $phone_result = mysqli_query($conn, $check_phone);

            if (mysqli_num_rows($email_result) > 0) {
                echo '<p>Email already exists</p>';
            } elseif (mysqli_num_rows($phone_result) > 0) {
                echo '<p>Phone number already exists</p>';
            } else {
                // Insert data into the table
                $sql = "INSERT INTO pesron (userName, City, Phone_no, Email, userPassword) VALUES ('$name', '$city_name','$phone','$mail_id','$user_pass') ";

                if (mysqli_query($conn, $sql)) {
                    echo '<p>You are now registered</p>';
                } else {
                    echo '<p>Error to insert values to the table. Please refer to error: ' . mysqli_error($conn) . '</p>';
                }
            }
        }
        mysqli_close($conn);
    }
?>
</body>
</html>