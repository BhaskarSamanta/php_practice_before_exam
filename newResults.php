<?php

if (isset($_POST['Submit'])) {

    $playerName = $_POST['players'];
    $testRun = $_POST['testRun'];
    $odiRun = $_POST['odiRun'];
    $ttRun = $_POST['ttRun'];

    // Validate the input data before processing
    if (!empty($playerName) && is_numeric($testRun) && is_numeric($odiRun) && is_numeric($ttRun)) {

        $serverName = "127.0.0.1:3308";
        $userName = "myadmin";
        $password = "ritwika_123";
        $dbName = "player_data";

        $conn = mysqli_connect($serverName, $userName, $password, $dbName);

        if (!$conn) {
            die("Sorry we failed to connect please refer to error --->" . mysqli_connect_error());
        } else {
            $sql = "INSERT INTO sports (Players, TestRun, OdiRun, TtRun) VALUES('$playerName','$testRun','$odiRun','$ttRun')";
            $res = mysqli_query($conn, $sql);

            if ($res) {
                echo "<p>Data Updated To The Database! </p>";
            } else {
                echo "<p>Sorry we Failed to Create the Database  </p>" . mysqli_error($conn);
            }
        }
    } else {
        echo "<p>Please provide valid data for all fields.</p>";
    }
} elseif (isset($_POST['results'])) {

    $serverName = "127.0.0.1:3308";
    $userName = "myadmin";
    $password = "ritwika_123";
    $dbName = "player_data";

    $conn = mysqli_connect($serverName, $userName, $password, $dbName);

    if (!$conn) {
        die("Sorry we failed to connect please refer to error --->" . mysqli_connect_error());
    } else {
        $sql_select = "SELECT Players, (CAST(TestRun AS SIGNED) + CAST(OdiRun AS SIGNED) + CAST(TtRun AS SIGNED)) AS TotalRuns FROM sports";
        $result_select = mysqli_query($conn, $sql_select);

        if ($result_select) {
            echo "<div class='container'>";
            echo "<div class='form'>";
            echo "<h2>Player-wise Total Runs:</h2>";
            echo "<ul>";
            while ($row = mysqli_fetch_assoc($result_select)) {
                echo "<li>{$row['Players']} - {$row['TotalRuns']} runs</li>";
            }
            echo "</ul>";
            echo "</div>";
            echo "</div>";
        } else {
            echo "<p>Failed to fetch data from the database: " . mysqli_error($conn) . "</p>";
        }
    }
}
?>
