<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: #A9B388;
        }
        .form {
            border: none;
            border-radius: 10px;
            width: 40%;
            margin-top: 15vh;
            background-color: #F6ECA9;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        fieldset {
            border: none;
        }
        button {
            width: 40%;
            border: none;
            border-radius: 10px;
            padding: 10px;
            margin-bottom: 15px;
            margin-left: 23%;
            margin-top: 10px;
            font-size: 20px;
            font-weight: bold;
        }
        input[type=text] {
            width: 95%;
            margin-bottom: 25px;
            padding: 10px;
            border-radius: 10px;
            border: none;
        }
        .head {
            font-size: 25px;
            font-weight: bold;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <?php
    

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        if (isset($_POST['insert'])) {
            // Process insert form
            $number = $_POST['cabno'];
            $name = $_POST['cmodel'];
            $color = $_POST['cabcolor'];
            $date = $_POST['cabdate'];
            // Database connection
    $serverName = "127.0.0.1:3308";
    $userName = "myadmin";
    $password = "ritwika_123";
    $dbname = "cab_allotment_system";

    $conn = mysqli_connect($serverName, $userName, $password, $dbname);

    if (!$conn) {
        die("Connection Failed: " . mysqli_connect_error());
    }else{
        if (empty($number) || empty($name) || empty($color) || empty($date)) {
            echo "<h3>Please fill all fields</h3>";
            exit();
        }
                    $sql = "INSERT INTO cab(cnu, model, colour, purchase_date) VALUES('$number', '$name', '$color', '$date')";
                    $res  = mysqli_query($conn, $sql);
                    if ($res) {
                        echo "<h3>New record has been inserted</h3>";
                    } else {
                        echo "<h3>Failed to insert record</h3>" . mysqli_error($conn);
                    }
                }
            }
        }
    

    ?>

    <div class="container">
        <div class="form">
            <form action="insert.php" method="POST" id="insertForm">
                <fieldset>
                    <legend align="center" class="head">INSERT RECORD FOR CAB TABLE</legend>
                    <b><font size="4">CAB Number :</font></b> <br>
                    <input type="text" name="cabno" id="cabno" placeholder="enter cab number"><br>
                    <b><font size="4">CAB Model Name :</font></b> <br>
                    <input type="text" name="cmodel" id="cmodel" placeholder="enter cab model"><br>
                    <b><font size="4">CAB Colour:</font></b> <br>
                    <input type="text" name="cabcolor" id="cabcolor" placeholder="enter cab color"><br>
                    <b><font size="4">CAB Purchase Date :</font></b> <br>
                    <input type="date" name="cabdate" id="cabdate" placeholder="enter cab purchase date">
                    <button type="submit" name="insert">Register</button><br>
                </fieldset>
            </form>

            <!-- Add another form if needed for the 'Show results' button -->
        </div>
    </div>
</body>
</html>
