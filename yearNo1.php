<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body bgcolor="orange">
    <style>
    .form{
   background:palevioletred;
   width:40%;
   padding:10px;
  border-radius:15px;
   }
   input[type=text], [type=date]{  
  width:95%;
  margin-bottom:10px;
  padding:10px;
  border-radius:10px;
  border: none;
}
input[type=submit]{
  width:40%;
  margin-bottom:10px;
  margin-left:5px;
  margin-right:5px;
  padding:8px;
  border-radius:10px;
  border: none;
  }
.container{
    display:flex;
  justify-content:center;
  align-items:center;
}

    </style>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['user'];
    $carModel = $_POST['model'];
    $colour = $_POST['colour'];
    $date = $_POST['cabpurchase'];

    $servername = "127.0.0.1:3308";
    $username = "myadmin";
    $password = "ritwika_123";
    $database = "cab_allotment_system";

    $conn = mysqli_connect($servername, $username, $password, $database);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO cab (cnu, model, colour, purchase_date) VALUES ('$name', '$carModel', '$colour', '$date')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo '<p>Your data has been entered into the database</p>';
    } else {
        echo '<p>Error: ' . mysqli_error($conn) . '</p>';
    }

    // Close the connection
    mysqli_close($conn);
}
?>
<div class="container">
<div  class="form">
    <form action="#" method="POST">
    <feildset>
        <legend align="center"><font size="5">Record Insert</font></legend>
    <label for="userName">
        CNU : <input type="text" id="userName" name="user">
    </label>
    <br>
    <label for="modelName">
        Model Name : <input type="text" id="modelName" name="model">
    </label>
    <br>
    <label for="colour">
        Colour Name: <input type="text" id="ColourName" name="colour">
    </label>
    <br>
    <label for="purchase-date">
        Purchase-Date : <input type="date" id="purchase" name="cabpurchase">
    </label>
    <br>
    <center><input type="submit" value="insert"></center>
    </feildset>
</form>
    
</div>
</div>


</body>
</html>