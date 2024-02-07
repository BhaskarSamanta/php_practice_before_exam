<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Cab Table Records</h2>
    <?php
       $serverName = "127.0.0.1:3308";
       $userName = "myadmin";
       $password = "ritwika_123";
       $dbname = "cab_allotment_system";
   
       $conn = mysqli_connect($serverName, $userName, $password, $dbname);
   
       if (!$conn) {
           die("Connection Failed: " . mysqli_connect_error());
       } else {
           // Retrieve records from the cab table
           
          $del_sql = "DELETE FROM cab
                   WHERE colour ='Green' ";
         $sql = "SELECT * FROM cab";
           $result = mysqli_query($conn, $sql);
   
           if ($result && mysqli_num_rows($result) > 0) {
               echo "<table>";
               echo "<tr><th>CAB Number</th><th>CAB Model</th><th>CAB Colour</th><th>Purchase Date</th></tr>";
   
               while ($row = mysqli_fetch_assoc($result)) {
                   echo "<tr>";
                   echo "<td>" . $row['cnu'] . "</td>";
                   echo "<td>" . $row['model'] . "</td>";
                   echo "<td>" . $row['colour'] . "</td>";
                   echo "<td>" . $row['purchase_date'] . "</td>";
                   echo "</tr>";
               }
   
               echo "</table>";
           } else {
               echo "<p>No records found.</p>";
           }
   
           mysqli_close($conn);
       }
       ?>
       <p><a href="cabfront.php">Go Back</a></p>
   </body>
   </html>
</body>
</html>