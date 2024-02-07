<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    
    <?php

        $serverName ="localhost";
        $userName = "root";
        $password ="";
        $dbName  ="Art_Galarry_Syatem";


        $connection = mysqli_connect($serverName,$userName,$password,$dbName);

        if(!$connection){

            die("culd not connect to data base".mysqli_connect_error());
            
        }else{
            // echo"<p style ='color: green; font-size: 20px;'> Connection Established</p>";

            // $sql = "CREATE DATABASE Art_Galarry_Syatem";

            // $sql = "CREATE TABLE Gallery (
            //         gid VARCHAR (50),
            //         gname VARCHAR (50),
            //         capacity INT DEFAULT 500,
            //         city VARCHAR (50)
            // )";

                
            // $sql = "CREATE TABLE Artists (
            //     aid VARCHAR (50),
            //     aname VARCHAR (50),
            //     Age INT,
            //     rank INT
            //     )";

            // $sql = "CREATE TABLE Reserved (
            //     gid VARCHAR (50),
            //     aid VARCHAR (50),
            //     date_reserved date
            //     )";

            
            ";


            $result = mysqli_query($connection,$sql);
            
            if(!$result){
                echo"<p style= 'color: red;'> Failed to create Table  </p>".mysqli_error($connection);

            }
            else{
                echo "<p style= 'color: green;'> table created successfully  </p>";
            }
        }

    
    ?>
</body>
</html>