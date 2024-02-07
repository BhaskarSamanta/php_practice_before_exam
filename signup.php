<?php
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $name = $_POST['user'];
    $pass = $_POST['user_pass'];
    if(empty($name) && empty($pass)){
        echo"<h1>Please enter both username and password</h1>";
        exit();
    }
    if (empty($name)) {
            echo "<h1>Please enter a username</h1>"; 
            exit();
        }
        if (empty($pass)) {
            echo "<h1>Please enter a password</h1>";
            exit();
        }

    $serverName = "127.0.0.1:3308";
    $userName = "myadmin";
    $password = "ritwika_123";
    $dbname = "flight_reservation_schema";

    $conn = mysqli_connect($serverName, $userName, $password, $dbname);
    if (!$conn) {
        die("Connection Failed: " . mysqli_connect_error());
    } else {
        $check = "SELECT * FROM Login WHERE username = '$name' ";
        $res = mysqli_query($conn, $check);
        if(mysqli_num_rows($res)==0){
            echo "<h1>This user is not registered</h1>";
            exit();
        }
        else{
            $sql = "SELECT * FROM Login WHERE username = '$name' AND password = '$pass'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                // $check = "SELECT emp.* 
                //     FROM emp 
                //     JOIN Login ON emp.e_name = login.username 
                //     WHERE login.username='$name'";
                $check = "SELECT * FROM emp 
                         WHERE e_name in ( SELECT username
                                           FROM Login
                                           WHERE username = '$name')";
            $res = mysqli_query($conn, $check);
            if (mysqli_num_rows($res) > 0) {
                echo "<h2>Employee Records for $name</h2>";
                echo "<table border='1'>";
                echo "<tr><th>Employee ID</th><th>Employee Name</th><th>Salary</th></tr>";
                while ($row = mysqli_fetch_assoc($res)) {
                    echo "<tr><td>{$row['e_id']}</td><td>{$row['e_name']}</td><td>{$row['salary']}</td></tr>";
                }
                echo "</table>";
            } 
        }
        else {
            echo "<h1>The password for that user is wrong</h1>";
        }
            exit();
   } 
}
    mysqli_close($conn);
}
?>


